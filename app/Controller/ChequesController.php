<?php
App::uses('AppController', 'Controller');
/**
 * Cheques Controller
 *
 * @property Cheque $Cheque
 * @property PaginatorComponent $Paginator
 */
class ChequesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $paginate = array(
                'limit' => 10,
                'order' => array(
                'Cheque.fechacobro' => 'DESC',
                    'Cheque.ChequeEstadocheque.created'=> 'DESC'
                )
              ); 

/**
 * index method
 *
 * @return void
 */
        public function aumentarinteres(){
            /*hago una consulta a todos los cheques que son devueltos*/
            $sql="SELECT * FROM cheques WHERE cobrado=0";
            $chequesdevueltos=  $this->Cheque->query($sql);
            if(!empty($chequesdevueltos)){
                
                #debug($chequesdevueltos);
                #Para cheques devueltos, debo hacer calculo de interes diario, recalcular el interes cada dia
                # Debo hacer update en modificado dentro de chequeinterese donde es devuelto, y modificar la deuda
                # Para SOLO INTERESE debo usar esa fecha modificado (dentro de chequeinterese) tambien para ir insertando y cambiando el monto
                # de interes y de deuda.
                # SOLO INTERESES VA REGISTRANDO DIA TRAS DIA EL INTERES CUANDO ES DEVUELTO, YA QUE SE RECALCULA
                
                
                $total=count($chequesdevueltos);
                for($i=0;$i<$total;$i++){
                    $sql="SELECT * FROM solointereses WHERE cobrado=0 and (cheque_id=".$chequesdevueltos[$i]['cheques']['id'].")";
                    $chequeinterese[$i]=  $this->Cheque->query($sql);
                }
                
                $totales=count($chequeinterese);
                
                
                for($i=0;$i<$totales;$i++){
                    $fecha1=new DateTime($chequeinterese[$i][0]['solointereses']['fecha']);
                    
                    $fecha1=$fecha1->format("Y-m-d");
                    $fecha2=date("Y-m-d");
                    $dif[$i]=  $this->diferencia($fecha1, $fecha2);
                    $monto[$i]=$chequeinterese[$i][0]['solointereses']['monto']+($dif[$i]*$chequeinterese[$i][0]['solointereses']['montointereses']);
                }
                
                for($i=0;$i<$totales;$i++){
                                        
                    $sql="UPDATE cheques SET modified=now(),dias=".$dif[$i]." WHERE id=".$chequeinterese[$i][0]['solointereses']['cheque_id'];
                    $this->Cheque->query($sql);
                }     
                
                //Lo que yo estoy haciendo BET para actualizar los montos, refinanciar interes cuando es devuelto dia tras dia.
                # Para modificar chequeinterese
                
                for($i=0;$i<$total;$i++){
                    $idcheque =$chequesdevueltos[$i]['cheques']['id'];
                $consulta = "SELECT ci.modificado, ci.montocheque, ci.montodescuentointeres, i.montofijo,i.porcentaje  
                    FROM cheques as ch, intereses as i, chequeinterese as ci WHERE ch.id=ci.cheque_id AND ch.interese_id=i.id AND ci.estadocheque=0 
                    AND ch.id=".$idcheque;
                $intereses=$this->Cheque->query($consulta);
                $montodeuda = $intereses[0]['ci']['montocheque'];
                $montointeres = $intereses[0]['ci']['montodescuentointeres'];
                $modificado = $intereses[0]['ci']['modificado'];
                $fijo = $intereses[0]['i']['montofijo'];
                $interes = $intereses[0]['i']['porcentaje'];
                $hoy=date("Y-m-d");
                $dias = $this->diferencia($modificado, $hoy);
                debug($fijo);
                
                
                
                if($fijo!=null){
                  
                    $montodeuda=$montodeuda+$fijo*$dias;
                    $montointeres = $fijo;
                }else{
                    $interes = $interes/100;
                    $auxmontodeuda=$montodeuda;
                    
                    $fechamodi = new DateTime($modificado);
                    $fechamodi = $fechamodi->format('Y-m-d');
                    $fechahoy = new DateTime($hoy);
                    $fechahoy = $fechahoy->format('Y-m-d');
                    debug($fechamodi);
                    debug($fechahoy);
                    debug($dias);
                   
                        $dias--;
                    
                    $modificado = date('Y-m-d');
                    if(strcmp($fechamodi, $fechahoy)!=0){
                        #PARA RECORRER VARIOS DIAS E IR RECALCULANDO DIA TRAS DIA EL INTERES CUANDO ES DEVUELTO
                        # ESTE MISMO CICLO SIRVE PARA INSERTAR EN SOLO INTERESES, LA DIFERENCIA ES QUE EN 
                        #CHEQUEINTERESE SE ACTUALIZA EL REGISTRO DONDE ESTE DEVUELTO, PERO EN SOLOINTERESES
                        #LA ACTUALIZACION SE HACE EN EL CICLO PORQUE SE HACE UNA INSERCION CADA VEZ, PORQUE EL 
                        #DEVUELTO VA VARIANDO.
                        for($i=0;$i<$dias;$i++){
                          
                           
                           $nuevomonto=$montodeuda+$montointeres;
                           $montointeres=$nuevomonto*($interes);
                           $montointeres=$this->redondear_a_10($montointeres);
                           $montodeuda=$nuevomonto;
                         
                        }
                        debug($nuevomonto);
                         debug($montointeres);
                         debug($modificado);
                         #exit(0);
                        $cheques = "UPDATE cheques SET dias=1 WHERE id=".$idcheque;
                        $this->Cheque->query($cheques);
                        $actualiza = "UPDATE chequeinterese SET montocheque=".$nuevomonto.", montodescuentointeres=".$montointeres.", 
                            modificado=NOW() WHERE cheque_id=".$idcheque." AND estadocheque=0";
                        $this->Cheque->query($actualiza);
                    }
                    }
                
                }
            }
            #return $this->redirect(array('action' => 'index'));
            
        }
        public function reporteinteres($id=null){
            if($id==null){
                $id=-1;
            }
            $sqltotal="select count(*) as total from cheques where id=".$id;
            
            $total=  $this->Cheque->query($sqltotal);
            $tot=$total[0][0]['total'];
            if($id!=1&&$tot!=0){
                
                
                
                $sqltotal="select * from cheques where id=".$id;
            
                $total=  $this->Cheque->query($sqltotal);
                $idcheque=$total[0]['cheques']['numerodecheque'];
                #debug("solointereses");
                $sql="SELECT * FROM solointereses WHERE cheque_id=".$id." order by id desc, cheque_id desc";
                $solointereses=  $this->Cheque->query($sql);

                $O=$solointeresestotal=count($solointereses);
                /*debug($solointereses[$O-1]['solointereses']['fecha']);
                debug($solointereses[$O-1]['solointereses']['monto']);*/
                /*debug("solointeresestotal");
                debug($solointeresestotal);*/
                for($i=0;$i<$solointeresestotal; $i++){
                    $sql="select * from intereses where id=".$solointereses[$i]['solointereses']['interese_id'];
                    $idintereses[$i]=  $this->Cheque->query($sql);
                }
                
                /*debug("idintereses");
                debug($idintereses);*/
                $sql="SELECT fechacobro, fecharecibido from cheques where id=".$id;
                $chequera=$this->Cheque->query($sql);
                
                
                $fecharecibido=new DateTime($chequera[0]['cheques']['fecharecibido']);
                $fecharecibido=$fecharecibido->format("Y-m-d");
                $fechacobro=new DateTime($chequera[0]['cheques']['fechacobro']);
                $fechacobro=$fechacobro->format("Y-m-d");
                $debug=new DateTime($solointereses[$O-1]['solointereses']['fecha']);
                $debug=$debug->format("Y-m-d");
                $debug2=new DateTime($solointereses[0]['solointereses']['fecha']);
                $debug2=$debug2->format("Y-m-d");
                /*debug("chequera");
                debug($debug2);*/
                $devueltos=0;
                $acumdev=0;
                for($i=0;$i<$solointeresestotal;$i++){
                    $todosdevueltos[$i]=0;
                    
                    #debug($solointereses[0]['solointereses']['cobrado']);
                    if($solointereses[0]['solointereses']['cobrado']==2){
                        if($solointereses[$i]['solointereses']['cobrado']==1){
                                $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                                $dif[$i][1]=$this->diferencia($fecharecibido, $fechacobro);
                        }else{
                            if($solointereses[$i]['solointereses']['cobrado']==0){
                                $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                                $todosdevueltos[$i]=$dif[$i][1]=  $this->diferencia($debug,$debug2);
                                
                                for($j=0;$j<$dif[$i][1];$j++){
                                    $acumdev=$acumdev+$solointereses[$i]['solointereses']['montointereses']+$solointereses[$i]['solointereses']['monto'];
                                    
                                }
                                $devueltos++;
                            }else{
                                $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                                $dif[$i][1]=$this->diferencia($debug2, $debug2);
                            }
                        }
                        if($solointereses[$O-1]['solointereses']['cobrado']==1){
                            $menor=$solointereses[0]['solointereses']['monto'];
                            $mayor=$solointereses[$O-1]['solointereses']['monto'];
                            $totaldeuda=$mayor-$menor;
                            /*debug("cuando el estado es 1");
                            debug($totaldeuda);*/
                        }
                        if($devueltos!=0){
                            
                            $totale=$acumdev;
                            $menor=$solointereses[0]['solointereses']['monto'];
                            $mayor=$totale;
                            
                            $totaldeuda=$mayor-$menor;
                            
                        }
                    }else{
                        if($solointereses[$i]['solointereses']['cobrado']==0){
                            $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                            $dif[$i][1]=  $this->diferencia($fechacobro, date('Y-m-d'));
                        }else{
                            if($solointereses[$i]['solointereses']['cobrado']==1){
                                $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                                $dif[$i][1]=$this->diferencia($fecharecibido, $fechacobro);
                            }
                        }
                    }
                }
                
            
                
                $this->set(compact('solointereses','solointeresestotal','idintereses','dif','id','idcheque','totaldeuda'));
            }else{
                $id=null;
                $this->set(compact('id'));
            }
        }
        
        public function index() {
		$this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT cobrado, 
                                            SUM( monto ) as sumato 
                                            FROM cheques
                                            WHERE cobrado =1
                                            OR cobrado =0
                                            GROUP BY cobrado
                                            ORDER BY COBRADO"); 
                
                
                $this->aumentarinteres();
                /*Cuando deuda=0 debo, cuando es 1 no debo, cuando pasa a cobrado y la deuda es 0 */
              
                $sql="SELECT * FROM solointereses";
                $solointeresess=  $this->Cheque->query($sql);
                if($this->data){  
                    
                    if($this->data['Cheque']['selector']=="1"){
                        $valor = $this->data['search_text1'];
                       $yabusco=1;
                       $this->request->data['search_text1']='';
                         $this->set('cheques',  

                        $this->paginate('Cheque', array('or' => 
                            array('Cheque.numerodecheque LIKE' => '%'.$valor.'%',
                            'Cheque.numerodecuenta LIKE' => '%'.$valor.'%',
                            'Cheque1.numerodecheque LIKE' => '%'.$valor.'%',
                            'Cliente.cedula LIKE'=> '%'.$valor.'%',
                            'Banco.codigo LIKE'=>'%'.$valor.'%',
                           'Cliente.nombre LIKE'=>'%'.$valor.'%',
                            'Cliente.apellido LIKE'=>'%'.$valor.'%',
                           'Cliente.apodo LIKE'=>'%'.$valor.'%'
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0'),
                                 array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    )))));
                         $this->set(compact('yabusco'));
                    }
                else{
                    
                    $yabusco=0;
                    if(!$this->data['Cheque']['search_text']==''){
                        
                        $fecha = new DateTime($this->data['Cheque']['search_text']);
                        $fecha = $fecha->format('Y-m-d');
                        $this->request->data['Cheque']['search_text']='';
                        $this->set('cheques',$this->paginate('Cheque', array('or' => 
                            array('DATE_FORMAT(Cheque.fechacobro,"%Y-%m-%d") LIKE' => '%'.$fecha.'%'
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0'),
                                array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    )))));
                        $this->set(compact('yabusco'));
                    }
                    else{
                        
                         $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0'),
                                     array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    ))));
                     $this->set(compact('sumas','yabusco','solointereses'));
                    }
                }
                 
                  }else{
                      $yabusco=2;
                    $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array
                                    (array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0'),
                                        array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    ))));
                     $this->set(compact('sumas','yabusco'));
                  }
                  $this->set(compact('solointeresess'));
               
	}
        public function index2() {
               
                $this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT estadocheque, SUM( montocheque ) as sumato, sum(Montodescuentointeres) as interes
                                            FROM chequeinterese
                                            WHERE estadocheque =2
                                            GROUP BY estadocheque");
                
               # $var= $this->bandera();
                if($this->data){  
                    

                    if($this->data['Cheque']['selector']=="1"){
                        $valor = $this->data['search_text1'];
                       $yabusco=1;
                       $this->request->data['search_text1']='';
                         $this->set('cheques',  

                        $this->paginate('Cheque', array('or' => 
                            array('Cheque.numerodecheque LIKE' => '%'.$valor.'%',
                            'Cheque.numerodecuenta LIKE' => '%'.$valor.'%',
                            'Cheque1.numerodecheque LIKE' => '%'.$valor.'%',
                            'Cliente.cedula LIKE'=> '%'.$valor.'%',
                            'Banco.codigo LIKE'=>'%'.$valor.'%',
                           'Cliente.nombre LIKE'=>'%'.$valor.'%',
                            'Cliente.apellido LIKE'=>'%'.$valor.'%',
                           'Cliente.apodo LIKE'=>'%'.$valor.'%'
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'2')
                                ))))); 
                         $this->set(compact('yabusco'));
                    }
                else{
                    
                    $yabusco=0;
                    if(!$this->data['Cheque']['search_text']==''){
                        
                        $fecha = new DateTime($this->data['Cheque']['search_text']);
                        $fecha = $fecha->format('Y-m-d');
                        $this->request->data['Cheque']['search_text']='';
                        $this->set('cheques',$this->paginate('Cheque', array('or' => 
                            array('DATE_FORMAT(Cheque.fechacobro,"%Y-%m-%d") LIKE' => '%'.$fecha.'%'
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'2')))))); 
                        $this->set(compact('yabusco'));
                    }
                    else{
                         $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'2')))));
                     $this->set(compact('sumas','yabusco'));
                    }
                }
                 
                  }else{
                      $yabusco=2;
                    $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'2')))));
                     $this->set(compact('sumas','yabusco'));
                  }
                  $this->set(compact('var'));
        }
        public function devueltos() {
                $this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT cobrado, SUM( monto ) as sumato
                                            FROM cheques
                                            WHERE cobrado =0
                                            GROUP BY cobrado");
                
                if($this->data){  
                    if ($this->data['Cheque']['search_text']) { 
                        $this->set('cheques',  
                        $this->paginate('Cheque', array('or' => array('Cheque.numerodecheque LIKE' => '%' .  
                        $this->data['Cheque']['search_text'] . '%')))); 
                    } 
                    else { 
                        $this->set('cheques', $this->paginate());
                    } 
                  }else{
                      
                     $this->set('cheques', $this->paginate()); 
                  }
		$this->set('cheques', $this->paginate());
                $this->set(compact('sumas'));
        }
        public function postdatados() {
                $this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT cobrado, SUM( monto ) as sumato
                                            FROM cheques
                                            WHERE cobrado =1
                                            GROUP BY cobrado");
                
                if($this->data){  
                    if ($this->data['Cheque']['search_text']) { 
                        $this->set('cheques',  
                        $this->paginate('Cheque', array('or' => array('Cheque.numerodecheque LIKE' => '%' .  
                        $this->data['Cheque']['search_text'] . '%')))); 
                    } 
                    else { 
                        $this->set('cheques', $this->paginate());
                    } 
                  }else{
                      
                     $this->set('cheques', $this->paginate()); 
                  }
		$this->set('cheques', $this->paginate());
                $this->set(compact('sumas'));
        }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $this->Cheque->recursive = 3;
		if (!$this->Cheque->exists($id)) {
			throw new NotFoundException(__('Invalid cheque'));
		}
		$options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                $cheque=$this->Cheque->find('first', $options);
                $opciones2= array('conditions' => array('Cheque.cheque_id' => $id));
                $relacionados = $this->Cheque->find('all',$opciones2);
                $sql="SELECT * FROM chequeinterese WHERE cheque_id=".$id." and (estadocheque=2 or estadocheque=0 )";
                $chequeintereses=  $this->Cheque->query($sql);
                $total=count($chequeintereses);
                if($total>1){
                    $montos=$chequeintereses[$total-1]['chequeinterese']['montocheque'];
                }else{
                    if($total==1)
                        $montos=$chequeintereses[$total-1]['chequeinterese']['montocheque'];
                    else
                        $montos=0;
                }
                //debug($montos);
                if(!empty($chequeintereses)){
                    $x=$chequeintereses[$total-1]['chequeinterese']['montodescuentointeres'];
                }
                #debug($cheque);
		$this->set(compact('cheque','relacionados','montos','x'));
	}

/**
 * add method
 *
 * @return void
 */     
        private function chequeinteresesinsert(){
            $cheque_ids=  $this->Cheque->getLastInsertID();
            $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
            $this->request->data['Solointerese']['cheque_id'] =$this->request->data['Chequeinterese']['cheque_id'] = $cheque_ids;
            $this->request->data['Solointerese']['monto'] = $this->request->data['Cheque']['monto'];    
            $this->request->data['Chequeinterese']['montocheque']=0;
            $this->request->data['Solointerese']['cobrado']=$this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado'];
            
            $sql="select dias, cobrado, interese_id from cheques where id=".$cheque_ids;            
            $y=  $this->Cheque->query($sql);
            
            $dato=$this->request->data['Solointerese']['interes']=$y[0]['cheques']['interese_id'];
            
            $sql="SELECT  porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$cheque_ids."";
            $x=$this->Cheque->query($sql);
            
            $this->request->data['Chequeinterese']['modificado']= date('Y-m-d h:i:s');
            
            
            if($x[0]['I']['porcentaje']==null){
                
                $this->request->data['Solointerese']['montointereses']=$x[0]['I']['montofijo'];
                $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['montofijo']*$y[0]['cheques']['dias'];
                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($x[0]['I']['montofijo']*$y[0]['cheques']['dias']);
            }
            else{
                
                $p=(round(($x[0]['I']['porcentaje']/100)*$this->request->data['Cheque']['monto']));    
                if($p%2!=0)
                  $p++;
                $this->request->data['Solointerese']['montointereses']=$p;
                $this->request->data['Chequeinterese']['montodescuentointeres'] = $p*$y[0]['cheques']['dias'];;
                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($p*$y[0]['cheques']['dias']);
            }
            
            $this->Cheque->Chequeinterese->save($this->request->data);
            
            
            $insert="INSERT INTO 
                     solointereses (monto,
                                    montointereses,
                                    cheque_id,
                                    interese_id,
                                    cobrado,
                                    fecha)
                     VALUES(".$this->request->data['Solointerese']['monto'].",
                            ".$this->request->data['Solointerese']['montointereses'].",
                            ".$this->request->data['Solointerese']['cheque_id'].",
                            ".$y[0]['cheques']['interese_id'].",
                            ".$this->request->data['Solointerese']['cobrado'].",
                            NOW())";
            
            $d=$this->Cheque->query($insert);
            $sql="select id from solointereses where cheque_id=".$cheque_ids." order by cheque_id desc";
            $res=$this->Cheque->query($sql);
            return $res[0]['solointereses']['id'];
            #debug($this->request->data['Chequeinterese']['montodescuentointeres']);
            
        }
        public function add2($id=null) {
		if ($this->request->is('post')) {
			$this->Cheque->create();
                        
                        $dias=$this->diferencia($this->request->data['Cheque']['fecharecibido'],$this->request->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['dias']=$dias;
                        $fecha1= new DateTime($this->data['Cheque']['fecharecibido']);
                        $fecha2 = new DateTime($this->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['fecharecibido']=$fecha1->format('Y-m-d');
                        $this->request->data['Cheque']['fechacobro']=$fecha2->format('Y-m-d');
                        $id1= $this->request->data['Cheque']['cheques_id'];
                     	if ($this->Cheque->save($this->request->data)) {                                
                                $res=$this->chequeinteresesinsert();
                                $cheque_ids=  $this->Cheque->getLastInsertID();
                                $this->Session->setFlash(__('El cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'chequeEstadocheques','action' => 'add2/'.$cheque_ids."/".$res,$id1));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido guardado'));
			}
		}
		$bancos = $this->Cheque->Banco->find('list',array('fields'=>'nombre'));
                $muestra=0;		
                    $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','nombres')));      
                $id_cheque = $this->Cheque->find('list',array('fields'=>array('id','numerodecheque'),'conditions'=>array(
                    'Cheque.id'=>$id)));
		$interese = $this->Cheque->Interese->find('list',array('fields'=>array('id','rango')));
		$users = $this->Cheque->User->find('list');
                $cheque = $this->Cheque->find('all',array('conditions'=>array('Cheque.id'=>$id)));
                $x=$this->Cheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('bancos', 'clientes', 'interese', 'users','id_cheque','id','cheque'));
	}
        public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Cheque->create();
                        
                        $dias=$this->diferencia($this->request->data['Cheque']['fecharecibido'],$this->request->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['dias']=$dias;
                        debug($dias);
                       
                        $fecha1= new DateTime($this->data['Cheque']['fecharecibido']);
                        $fecha2 = new DateTime($this->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['fecharecibido']=$fecha1->format('Y-m-d');
                        $this->request->data['Cheque']['fechacobro']=$fecha2->format('Y-m-d');
                      	if ($this->Cheque->save($this->request->data)) {
                                
                                $res=$this->chequeinteresesinsert();
                                $cheque_ids=  $this->Cheque->getLastInsertID();
                                $this->Session->setFlash(__('El cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'chequeestadocheques','action' => 'add/'.$cheque_ids,$res));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido guardado'));
			}
		}
		$bancos = $this->Cheque->Banco->find('list');
                $muestra=0;
		if($id==null){
                    $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','nombres')));
                    
                }
                else
                {
                    $muestra=1;
                    $conditions=array('Cliente.id'=>$id);
         	    $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','nombres'),
                                                                                   'conditions'=>$conditions));
                   
                }
		$interese = $this->Cheque->Interese->find('list',array('fields'=>array('id','rango')));
		$users = $this->Cheque->User->find('list');
                $x=$this->Cheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('bancos', 'clientes', 'interese', 'users'));
	}
        
        private function diferencia($fecha1,$fecha2){
                $format="Y-m-d";
                $datetime1 = new DateTime($fecha1);
                $datetime1=$datetime1->format($format);
                $datetime2 = new DateTime($fecha2);
                $datetime2=$datetime2->format($format);
                $datetime1 = date_create($datetime1);
                $datetime2 = date_create($datetime2);
                $interval = date_diff($datetime1, $datetime2);
                $dias=$interval->format("%R%a");
                $dias=$dias+1;
                
                return $dias;
         }
        public function redondear_a_10($valor) { 

    // Convertimos $valor a entero 
        $valor = intval($valor); 
    
    // El truco que aplicamos consiste en dividir el entero entre 10 
    // de manera que obtendremos un número con un decimal. 
    // Eso sí puede ser redondeado hacia arriba con ceil(). 
    // Finalmente multiplicamos por 10 para restaurar el formato 
    // original del número 
        return ceil($valor/10)*10; 
        } 
         public function editadevuelto($id=null){
            //COSAS A HACER EN SOLO INTERESES:
             // INSERTAR EL VALOR DE LOS DEVUELTOS, Y CADA DIA CUANDO CAMBIE EL VALOR
             $id=  $this->params['pass'][0];
            $tipo=  $this->params['pass'][1];
            
            
            
            
            if($tipo==0){
                
                
                
                $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                $this->request->data = $this->Cheque->find('first', $options);
                
                $x=$this->Cheque->query("SELECT *
                                      FROM chequeinterese
                                      WHERE cheque_id=".$id." Order by id");
                 $cobrado=$this->request->data['Cheque']['cobrado'] = $tipo;
                 
                
                 
                 $estavez=$monto=$this->request->data['Cheque']['monto'];
                 
                    
                $montooriginal=$this->request->data['Solointerese']['monto']=$monto;
                
                $nuevomonto=$this->request->data['Solointerese']['monto']+$x[0]['chequeinterese']['montodescuentointeres'];
                #debug($nuevomonto);
                #exit(0);
                 $this->request->data['Cheque']['modified']=date('Y-m-d H:i:s');
                 /*acá hago un cambio en cheque debido al paso donde dice options despues del if $tipo=0*/ 
                 $que=$this->Cheque->save($this->request->data);
                  if(!$que){
                      $this->Cheque->query("UPDATE cheques SET cobrado=".$cobrado.", dias=".$dias.", 
                           modified=NOW() WHERE id = ".$id);
                  }
                 $sql2="select dias, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $dias2=$y[0]['cheques']['dias'];
                 
                 $this->request->data['Solointerese']['interese_id']=$y[0]['cheques']['interese_id'];
                 
                 $sql="select * from chequeinterese where cheque_id=".$id."";
                 $xx=  $this->Cheque->query($sql);
                 //debug($xx);
                 #exit(0);
                 
                 //copiamos el codigo
                 $monto=$xx;
                 //modificar el estado actual
                 $cheque = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
                
                $modificado = date('Y-m-d H:i:s');
                $cobro = $cheque['Cheque']['fechacobro'];
                $dias = $this->diferencia($cobro, $modificado);
                if($dias>1){
                    $dias--;
                };
                $dias=$this->request->data['Cheque']['dias']=$dias;
                debug($dias);
                $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                $this->request->data['Solointerese']['cheque_id']=$this->request->data['Chequeinterese']['cheque_id'] = $id;
                $this->request->data['Chequeinterese']['montocheque'] = $nuevomonto;    
                $this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado']; 
                
                 
                $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                
                if($x[0]['I']['porcentaje']==null){
                    $tototo=$this->request->data['Solointerese']['montointereses']=$x[0]['I']['montofijo'];
                    $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['montofijo']*$dias;
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                }
                else{
                    $porcentaje = $x[0]['I']['porcentaje'];
                    if($dias>0){
                        $interes=($porcentaje/100)*$montooriginal;
                        $auxmontooriginal=$montooriginal;
                        
                        for($i=0;$i<$dias;$i++){
                          $tototo=$this->request->data['Solointerese']['montointereses']=$this->redondear_a_10($interes);
                           $this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($interes);
                           $nuevomonto=$montooriginal+$interes;
                           $interes=$nuevomonto*($porcentaje/100);
                           $interes=$this->redondear_a_10($interes);
                           $montooriginal=$nuevomonto;
                         
                        }
                      
                    }else{
                        $p=(round(($porcentaje/100)*$montooriginal));
                        $p = $this->redondear_a_10($p);
                        $tototo=$this->request->data['Solointerese']['montointereses']=$p;
                        $this->request->data['Chequeinterese']['montodescuentointeres'] = $p;       
                        $nuevomonto=$p+montooriginal;
                   }
                     $this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($this->request->data['Chequeinterese']['montodescuentointeres']);
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                }
              
                
                $this->request->data['Chequeinterese']['montocheque']=$this->redondear_a_10($nuevomonto);
              /*  debug($this->request->data['Chequeinterese']['montodescuentointeres']);
                debug($this->request->data['Chequeinterese']['montocheque']);*/
                $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                $z=  $this->Cheque->query($sql);
            #    exit(0);
                $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$this->request->data['Chequeinterese']['montoentregado'].",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].", NOW(),NOW())";
                
                $c=  $this->Cheque->query($sql3);

                
                
                
                

                $insert="INSERT INTO 
                         solointereses (monto,
                                        montointereses,
                                        cheque_id,
                                        interese_id,
                                        estado,  
                                        cobrado,
                                        fecha)
                         VALUES(".$nuevomonto.",
                                ".$tototo.",
                                ".$this->request->data['Solointerese']['cheque_id'].",
                                ".$this->request->data['Solointerese']['interese_id'].",
                                '".$z[0]['e']['nomenclatura']."',
                                ".$tipo.",
                                NOW())";
                $this->Cheque->query($insert);
                
                
                
                
                
                /*
                $this->request->data['Cheque']['cobrado'] = $tipo;
                $this->Cheque->save($this->request->data);
                $this->Session->setFlash(__('The estado de uno de los cheques ha pasado al estado "Devuelto".'));
            }else
                $this->Session->setFlash(__('The estado de uno de los cheques ha pasado al estado "Cobrado". '));*/
                
                return $this->redirect(array('action' => 'index'));
            }
            
            
            // TERMINA DEVUELTO EMPIEZA COBRADO---------------------------------------------
            
            
            
            else{
                    $sql="SELECT * from chequeinterese where cheque_id=".$id." and estadocheque=0";
                    $chequeinterese=  $this->Cheque->query($sql);
                    $sql="SELECT * FROM solointereses where cheque_id=".$id." and cobrado=0";
                    $solointereses=  $this->Cheque->query($sql);
                    
                    $sql="SELECT * from chequeinterese where cheque_id=".$id." and estadocheque=1";
                    $chequeintereses=  $this->Cheque->query($sql);
                    $sql="SELECT * FROM cheques where id=".$id;
                    $cheque=  $this->Cheque->query($sql);
                    
                    $sql="SELECT * FROM intereses where id=".$cheque[0]['cheques']['interese_id']."";
                    $intereses=  $this->Cheque->query($sql);
                    if($solointereses!=NULL){
                    $sql="SELECT * FROM intereses where id=".$solointereses[0]['solointereses']['interese_id']."";
                    $interesesd=  $this->Cheque->query($sql);
                    $montoiniciald=$solointereses[0]['solointereses']['monto'];
                    }
                    $montoinicial=$cheque[0]['cheques']['monto'];
                    
                    //debug($montoinicial);
                    /*MONTO ANTES DE SER COBRADO*/
                    if($intereses[0]['intereses']['porcentaje']==null){
                        $MSAC=$intereses[0]['intereses']['montofijo'];
                    }else{
                        $MSAC=round($montoinicial*($intereses[0]['intereses']['porcentaje']/100));
                        if($MSAC%2!=0)
                            $MSAC++;
                    }
                    if($solointereses==NULL){
                       if($intereses[0]['intereses']['porcentaje']==null){
                            $MSDC=$intereses[0]['intereses']['montofijo'];
                        }else{
                            $MSDC=round($montoinicial*($intereses[0]['intereses']['porcentaje']/100));
                            if($MSDC%2!=0)
                                $MSDC++;
                        }$fecha1=new DateTime($cheque[0]['cheques']['fecharecibido']);
                        $fecha1=$fecha1->format("Y-m-d");
                        $fecha2=new DateTime($cheque[0]['cheques']['fechacobro']);
                        $fecha2=$fecha2->format("Y-m-d");
                        $dif=$this->diferencia($fecha1, $fecha2);
                        $MSAC=$MSAC*$dif;
                        $dif=$this->diferencia($fecha1, $fecha2);
                        $MSDC=$MSDC*$dif;
                        debug($MSAC);
                        debug($MSDC);
                        
                        if($MSAC==$MSDC){
                            $Monto=0;
                        }
                        
                        /*debug($Monto);*/
                        
                        $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id) 
                                    VALUES(".$Monto.",
                                           0,
                                           0,
                                           ".$tipo.",
                                           ".$cheque[0]['cheques']['id'].",
                                           ".$this->Auth->user('id').")";
                
                        $c=  $this->Cheque->query($sql3);
                        
                        $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                        $z=  $this->Cheque->query($sql);
                        
                        $insert="INSERT INTO 
                         solointereses (monto,
                                        montointereses,
                                        cheque_id,
                                        interese_id,
                                        estado,  
                                        cobrado,
                                        fecha)
                         VALUES(".$Monto.",
                                ".$Monto.",
                                ".$cheque[0]['cheques']['id'].",
                                ".$intereses[0]['intereses']['id'].",
                                '".$z[0]['e']['nomenclatura']."',
                                ".$tipo.",
                                NOW())";
                        $this->Cheque->query($insert);
                        $sql="update cheques set cobrado=".$tipo.", deuda=1, modified=now() where id=".$id;
                        

                        $this->Cheque->query($sql);
                        return $this->redirect(array('action' => 'index'));
                        
                    }else{
                        if($interesesd[0]['intereses']['porcentaje']==null){
                            $MSDD=$montoiniciald*$interesesd[0]['intereses']['montofijo'];
                        }else{
                            $MSDD=round($montoiniciald*($interesesd[0]['intereses']['porcentaje']/100));
                            if($MSDD%2!=0)
                                $MSDD++;
                        }
                        $fecha1=new DateTime($cheque[0]['cheques']['fecharecibido']);
                        $fecha1=$fecha1->format("Y-m-d");
                        $fecha2=new DateTime($cheque[0]['cheques']['fechacobro']);
                        $fecha2=$fecha2->format("Y-m-d");
                        $dif=$this->diferencia($fecha1, $fecha2);
                        $MSAC=$MSAC*$dif;
                        $fecha1=new DateTime($solointereses[0]['solointereses']['fecha']);
                        $fecha1=$fecha1->format("Y-m-d");
                        $fecha2=date("Y-m-d");
                        $dif=$this->diferencia($fecha1, $fecha2);
                        $MSDD=$MSDD*$dif;
                        debug($MSAC);
                        debug($MSDD);
                        $Monto=$montoinicial-($MSAC+$MSDD);
                        debug($Monto);
                        #exit(0);
                        
                    }
                    $montototal=$chequeintereses[0]['chequeinterese']['montoentregado']-$Monto;
                    debug($montototal);
                    
                    if($montototal>0){
                        $sql="select * from intereses";
                        $inter=  $this->Cheque->query($sql);
                        $totalinter=count($inter);
                        $ban=0;
                        for($i=0;$i<$totalinter&&$ban==0;$i++){
                            if($inter[$i]['intereses']['porcentaje']==NULL){
                                if($montototal>$inter[$i]['intereses']['minimo']&&$montototal<$inter[$i]['intereses']['maximo']){
                                    $ban=1;
                                    $interes=$inter[$i]['intereses']['montofijo'];
                                }
                            }
                        }
                        if($ban==0){
                            
                            if($intereses[0]['intereses']['porcentaje']!=null)
                                $interes=round($montototal*($intereses[0]['intereses']['porcentaje']/100));
                                if($interes%2!=0)
                                    $interes++;
                        }
                        $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id) 
                                    VALUES(".($montototal+$interes).",
                                           ".$interes.",
                                           0,
                                           ".$tipo.",
                                           ".$cheque[0]['cheques']['id'].",
                                           ".$this->Auth->user('id').")";
                
                        $c=  $this->Cheque->query($sql3);
                        
                        $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                        $z=  $this->Cheque->query($sql);
                        $insert="INSERT INTO 
                         solointereses (monto,
                                        montointereses,
                                        cheque_id,
                                        interese_id,
                                        estado,  
                                        cobrado,
                                        fecha)
                         VALUES(".$montototal.",
                                ".$interes.",
                                ".$cheque[0]['cheques']['id'].",
                                ".$intereses[0]['intereses']['id'].",
                                '".$z[0]['e']['nomenclatura']."',
                                ".$tipo.",
                                NOW())";
                        $this->Cheque->query($insert);
                        $sql="update cheques set cobrado=".$tipo.", modified=now() where id=".$id;
                        $this->Cheque->query($sql);

                    }
                    
                    
                 return $this->redirect(array('action' => 'index'));
            }
            
        }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string 
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cheque->exists($id)) {
			throw new NotFoundException(__('Invalid cheque'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    
                    
                    
                    $dias=$this->diferencia($this->request->data['Cheque']['fecharecibido'],$this->request->data['Cheque']['fechacobro']);
                    $this->request->data['Cheque']['dias']=$dias;
                    $fecha1= new DateTime($this->data['Cheque']['fecharecibido']);
                        $fecha2 = new DateTime($this->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['fecharecibido']=$fecha1->format('Y-m-d');
                        $this->request->data['Cheque']['fechacobro']=$fecha2->format('Y-m-d');
                        debug($this->request->data);
                        if ($this->Cheque->save($this->request->data)) {
                            $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                            $this->request->data['Solointerese']['cheque_id'] =$this->request->data['Chequeinterese']['cheque_id'] = $id;
                            $this->request->data['Solointerese']['monto']=$this->request->data['Chequeinterese']['montocheque'] = $this->request->data['Cheque']['monto'];    
                            $this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado'];
                            $sql="select dias, cobrado, interese_id from cheques where id=".$id;
                            $y=  $this->Cheque->query($sql);
                            $this->request->data['Solointerese']['interese_id']=$y[0]['cheques']['interese_id'];
                            //debug($y);
                            $sql="SELECT porcentaje, montofijo
                                    FROM intereses I, cheques C
                                    WHERE interese_id = I.id
                                    AND C.id=".$id."";
                            $x=$this->Cheque->query($sql);
                            if($x[0]['I']['porcentaje']==null){
                                $this->request->data['Solointerese']['montointereses']=$x[0]['I']['montofijo'];
                                $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['montofijo']*$y[0]['cheques']['dias'];

                                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($x[0]['I']['MONTOFIJO']*$y[0]['cheques']['dias']);
                            }
                            else{

                                $p=(round(($x[0]['I']['porcentaje']/100)*$this->request->data['Cheque']['monto']));    
                                if($p%2!=0)
                                  $p++;
                                $this->request->data['Solointerese']['montointereses']=$p;
                                $this->request->data['Chequeinterese']['montodescuentointeres'] = $p*$y[0]['cheques']['dias'];
                                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-$p*$y[0]['cheques']['dias'];
                            }

                            $sql="delete from chequeinterese where cheque_id=".$id;
                            $this->Cheque->query($sql);

                            $sql="delete from solointereses where cheque_id=".$id;
                            $this->Cheque->query($sql);
                            $this->request->data['Chequeinterese']['montocheque']=0;

                            $this->Cheque->Chequeinterese->save($this->request->data);

                            $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                            $z=  $this->Cheque->query($sql);
                            $this->request->data['Solointerese']['estado']=$z[0]['e']['nomenclatura'];

                            $insert="INSERT INTO 
                                     solointereses (monto,
                                                    montointereses,
                                                    cheque_id,
                                                    interese_id,
                                                    estado,
                                                    cobrado,
                                                    fecha)
                                     VALUES(".$this->request->data['Solointerese']['monto'].",
                                            ".$this->request->data['Solointerese']['montointereses'].",
                                            ".$this->request->data['Solointerese']['cheque_id'].",
                                            ".$y[0]['cheques']['interese_id'].",
                                            '".$this->request->data['Solointerese']['estado']."',
                                            ".$y[0]['cheques']['cobrado'].",
                                            NOW())";
                            $this->Cheque->query($insert);
                            
                            $this->Session->setFlash(__('El cheque ha sido editado.'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido editado, revisa a ver que pasa.'));
			}
		} else {
			$options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
			$this->request->data = $this->Cheque->find('first', $options);
		}
              
                
                
		$bancos = $this->Cheque->Banco->find('list');
		$clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','nombres')));
		$interese = $this->Cheque->Interese->find('list',array('fields'=>array('id','rango')));
		$users = $this->Cheque->User->find('list');
                $x=$this->Cheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('bancos', 'clientes', 'interese', 'users','estadochequess'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cheque->id = $id;
		if (!$this->Cheque->exists()) {
			throw new NotFoundException(__('Invalid cheque'));
		}
		#$this->request->onlyAllow('post', 'delete');
		if ($this->Cheque->delete()) {
			$this->Session->setFlash(__('El Cheque ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('El cheque no ha sido eliminado, verifica otra vez.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        public function delete2($id = null) {
		$this->Cheque->id = $id;
		if (!$this->Cheque->exists()) {
			throw new NotFoundException(__('Invalid cheque'));
		}
		#$this->request->onlyAllow('post', 'delete');
		if ($this->Cheque->delete()) {
			$this->Session->setFlash(__('El Cheque ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('El cheque no ha sido eliminado, verifica otra vez.'));
		}
		return $this->redirect(array('action' => 'index2'));
	}
        }
