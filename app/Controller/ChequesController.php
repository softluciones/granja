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
        public function reporteinteres($id=null){
            $sqltotal="select count(*) as total from cheques where id=".$id;
            
            $total=  $this->Cheque->query($sqltotal);
            $tot=$total[0][0]['total'];
            if($id!=null&&$tot!=0){
                $sql="SELECT * FROM solointereses WHERE cheque_id=".$id." order by id desc, cheque_id desc";
                $solointereses=  $this->Cheque->query($sql);
                /*debug("solointereses");
                debug($solointereses);*/

                $solointeresestotal=count($solointereses);
                
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
                
                /*debug("chequera");
                debug($chequera);   */
                $fecharecibido=new DateTime($chequera[0]['cheques']['fecharecibido']);
                $fecharecibido=$fecharecibido->format("Y-m-d");
                $fechacobro=new DateTime($chequera[0]['cheques']['fechacobro']);
                $fechacobro=$fechacobro->format("Y-m-d");
                
                for($i=0;$i<$solointeresestotal;$i++){
                    if($solointereses[$i]['solointereses']['cobrado']==0){
                        $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                        $dif[$i][1]=  $this->diferencia($fechacobro, date('Y-m-d'));
                    }
                    else{
                        if($solointereses[$i]['solointereses']['cobrado']==1){
                            $dif[$i][0]=$solointereses[$i]['solointereses']['cobrado'];
                            $dif[$i][1]=  $this->diferencia($fecharecibido, $fechacobro);
                        }
                    }
                }
                
                /*debug("dif");
                debug($dif);*/
                
                $this->set(compact('solointereses','solointeresestotal','idintereses','dif','id'));
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
                                            
                //debug($sumas);
               //jose y bet son novios ahora yo jose se
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
                                    array('Cheque.cobrado'=>'0')))))); 
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
                                    array('Cheque.cobrado'=>'0')))))); 
                        $this->set(compact('yabusco'));
                    }
                    else{
                         $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0')))));
                     $this->set(compact('sumas','yabusco'));
                    }
                }
                 
                  }else{
                      $yabusco=2;
                    $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array('Cheque.cobrado'=>'0')))));
                     $this->set(compact('sumas','yabusco'));
                  }
	 	
               
	}
        public function index2() {
                $this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT estadocheque, SUM( montocheque ) as sumato, sum(Montodescuentointeres) as interes
                                            FROM chequeinterese
                                            WHERE estadocheque =2
                                            GROUP BY estadocheque");
                
                if($this->data){  
                    if ($this->data['Cheque']['search_text']) { 
                        $this->set('cheques',  
                        $this->paginate('Cheque', array('or' => array('Cheque.numerodecheque LIKE' => '%' .  
                        $this->data['Cheque']['search_text'] . '%')))); 
                    } 
                    else { 
                        $this->set('cheques', $this->Paginator->paginate());
                    } 
                  }else{
                      
                     $this->set('cheques', $this->Paginator->paginate()); 
                  }
		$this->set('cheques', $this->Paginator->paginate());
                $this->set(compact('sumas'));
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
                        $this->set('cheques', $this->Paginator->paginate());
                    } 
                  }else{
                      
                     $this->set('cheques', $this->Paginator->paginate()); 
                  }
		$this->set('cheques', $this->Paginator->paginate());
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
                        $this->set('cheques', $this->Paginator->paginate());
                    } 
                  }else{
                      
                     $this->set('cheques', $this->Paginator->paginate()); 
                  }
		$this->set('cheques', $this->Paginator->paginate());
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
               #debug($cheque);
		$this->set(compact('cheque','relacionados'));
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
            $this->request->data['Solointerese']['monto']=$this->request->data['Chequeinterese']['montocheque'] = $this->request->data['Cheque']['monto'];    
            $this->request->data['Solointerese']['cobrado']=$this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado'];
            
            $sql="select dias, cobrado, interese_id from cheques where id=".$cheque_ids;
            
            $y=  $this->Cheque->query($sql);
            $dato=$this->request->data['Solointerese']['interes']=$y[0]['cheques']['interese_id'];
            
            $sql="SELECT  PORCENTAJE, MONTOFIJO
                    FROM INTERESES I, CHEQUES C
                    WHERE INTERESE_ID = I.ID
                    AND C.ID=".$cheque_ids."";
            $x=$this->Cheque->query($sql);
            
            
            
            
            if($x[0]['I']['PORCENTAJE']==null){
                
                $this->request->data['Solointerese']['montointereses']=$x[0]['I']['MONTOFIJO'];
                $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['MONTOFIJO']*$y[0]['cheques']['dias'];
                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($x[0]['I']['MONTOFIJO']*$y[0]['cheques']['dias']);
            }
            else{
                
                $p=(round(($x[0]['I']['PORCENTAJE']/100)*$this->request->data['Cheque']['monto']));    
                if($p%2!=0)
                  $p++;
                $this->request->data['Solointerese']['montointereses']=$p;
                $this->request->data['Chequeinterese']['montodescuentointeres'] = $p*$y[0]['cheques']['dias'];;
                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-$p;
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
                                $this->chequeinteresesinsert();
                                $cheque_ids=  $this->Cheque->getLastInsertID();
                                $this->Session->setFlash(__('El cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'chequeestadocheques','action' => 'add2/'.$cheque_ids,$id1));
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
                        
                        #debug($dias);
                        
                        #debug($this->request->data['Cheque']['dias']);
                        
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
                    debug($clientes);
                   
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
         public function editadevuelto($id=null){
            
             $id=  $this->params['pass'][0];
            $tipo=  $this->params['pass'][1];
            
            
            
            
            if($tipo==0){
                
                
                
                $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                $this->request->data = $this->Cheque->find('first', $options);
                
                $x=$this->Cheque->query("SELECT montocheque, montodescuentointeres, montoentregado
                                      FROM chequeinterese
                                      WHERE cheque_id=".$id." Order by id");
                 $cobrado=$this->request->data['Cheque']['cobrado'] = $tipo;
                 
                 $dias=$this->request->data['Cheque']['dias']= 1;
                 $monto=$this->request->data['Cheque']['monto'] = intval($x[0]['chequeinterese']['montocheque'])+intval($x[0]['chequeinterese']['montodescuentointeres']);
                $this->request->data['Solointerese']['monto']=$monto;
                 $this->request->data['Cheque']['modified']=date('Y-m-d H:i:s');
                 $que=$this->Cheque->save($this->request->data);
                  if(!$que){
                      $this->Cheque->query("UPDATE cheques SET cobrado=".$cobrado.", dias=".$dias.", 
                          monto=".$monto.", modified=NOW() WHERE id = ".$id);
                  }
                 $sql2="select dias,monto, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $this->request->data['Solointerese']['interese_id']=$y[0]['cheques']['interese_id'];
                 
                 #debug($y[0]['cheques']['dias']);
                 $sql="select * from chequeinterese where cheque_id=".$id."";
                 $xx=  $this->Cheque->query($sql);
                 //debug($xx);
                 #exit(0);
                 
                 //copiamos el codigo
                 $monto=$xx;
                 //modificar el estado actual
                 
                
                $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                $this->request->data['Solointerese']['cheque_id']=$this->request->data['Chequeinterese']['cheque_id'] = $id;
                $this->request->data['Chequeinterese']['montocheque'] = $this->request->data['Cheque']['monto'];    
                $this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado']; 
                
                 
                $sql="SELECT PORCENTAJE, MONTOFIJO
                    FROM INTERESES I, CHEQUES C
                    WHERE INTERESE_ID = I.ID
                    AND C.ID=".$id."";
                $x=$this->Cheque->query($sql);
                if($x[0]['I']['PORCENTAJE']==null){
                    $this->request->data['Solointerese']['montointereses']=$x[0]['I']['MONTOFIJO'];
                    $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['MONTOFIJO']*$dias=$this->request->data['Cheque']['dias'];
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                }
                else{
                    $p=(round(($x[0]['I']['PORCENTAJE']/100)*$y[0]['cheques']['monto']));    
                    if($p%2!=0)
                      $p++;
                    $this->request->data['Solointerese']['montointereses']=$p;
                    $this->request->data['Chequeinterese']['montodescuentointeres'] = $p*$dias=$this->request->data['Cheque']['dias'];
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                }
                $this->request->data['Chequeinterese']['created']= $monto[0]['chequeinterese']['created'];
                $sql3="UPDATE chequeinterese 
                        SET montocheque=".$this->request->data['Cheque']['monto'].",
                            montodescuentointeres=".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                            montoentregado=".$this->request->data['Chequeinterese']['montoentregado'].",
                            estadocheque=".$this->request->data['Cheque']['cobrado'].",
                            created=now()
                           
                        WHERE id=".$xx[0]['chequeinterese']['id']."";
                
                $c=  $this->Cheque->query($sql3);
                
                $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                $this->request->data['Chequeinterese']['cheque_id'] = $id;
                $this->request->data['Chequeinterese']['montocheque'] = $monto[0]['chequeinterese']['montocheque'];    
                $this->request->data['Chequeinterese']['estadocheque'] = $monto[0]['chequeinterese']['estadocheque'];
                $this->request->data['Chequeinterese']['montodescuentointeres']= $monto[0]['chequeinterese']['montodescuentointeres'];
                $this->request->data['Chequeinterese']['montoentregado']= $monto[0]['chequeinterese']['montoentregado'];
                $this->request->data['Chequeinterese']['created']= $xx[0]['chequeinterese']['created'];
                
                
                
                $this->Cheque->Chequeinterese->save($this->request->data);
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
                         VALUES(".$this->request->data['Solointerese']['monto'].",
                                ".$this->request->data['Solointerese']['montointereses'].",
                                ".$this->request->data['Solointerese']['cheque_id'].",
                                ".$this->request->data['Solointerese']['interese_id'].",
                                '".$z[0]['e']['nomenclatura']."',
                                ".$cobrado.",
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
            else{
                 //cambiar el estado en la tabla cheque
                 $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                 $this->request->data = $this->Cheque->find('first', $options);
                 $monto=  $this->Cheque->query("select * from chequeinterese where cheque_id=".$id." order by id asc");
                 /*debug($selecta);
                 exit(0);*/
                 $this->request->data['Cheque']['cobrado'] = $tipo;
                 $this->Cheque->save($this->request->data);
                 $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                $this->request->data['Chequeinterese']['cheque_id'] = $id;
                $this->request->data['Chequeinterese']['montocheque'] = $monto[0]['chequeinterese']['montocheque'];    
                $this->request->data['Chequeinterese']['estadocheque'] = $tipo;
                $this->request->data['Chequeinterese']['montodescuentointeres']= $monto[0]['chequeinterese']['montodescuentointeres'];
                $this->request->data['Chequeinterese']['montoentregado']= $monto[0]['chequeinterese']['montoentregado'];
                $this->request->data['Chequeinterese']['created']= date("Y-m-d h:i:s");
                 #extraer datos de la informacion de cheque intereses de todos lo cheques en
                 #cobrado=
                $this->Cheque->Chequeinterese->save($this->request->data);
                 
                 return $this->redirect(array('action' => 'index'));
            }
            
        }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
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
                            $sql="SELECT PORCENTAJE, MONTOFIJO
                                    FROM INTERESES I, CHEQUES C
                                    WHERE INTERESE_ID = I.ID
                                    AND C.ID=".$id."";
                            $x=$this->Cheque->query($sql);
                            if($x[0]['I']['PORCENTAJE']==null){
                                $this->request->data['Solointerese']['montointereses']=$x[0]['I']['MONTOFIJO'];
                                $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['MONTOFIJO']*$y[0]['cheques']['dias'];
                                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($x[0]['I']['MONTOFIJO']*$y[0]['cheques']['dias']);
                            }
                            else{

                                $p=(round(($x[0]['I']['PORCENTAJE']/100)*$this->request->data['Cheque']['monto']));    
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
	}}
