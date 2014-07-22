<?php
App::uses('AppController', 'Controller');

class ChequesController extends AppController {

    var $uses=array('Cheque','ChequeEstadocheque','Interese','Banco');
	var $paginate = array(
                'limit' => 10,
                'order' => array(
                'Cheque.fechacobro' => 'DESC',
                    'Cheque.ChequeEstadocheque.created'=> 'DESC'
                )
        ); 
        public function getcodigo() {
            $this->layout='ajax';
                
                      $idbanco = $this->params['pass'][0];
                      
                      $codigo = $this->Cheque->Banco->find('first',array(
                       'fields' => array('Banco.codigo'), 
                       'conditions'=>array('Banco.id'=>$idbanco)));
                      #debug($codigo); exit(0);
                    $this->set(compact('codigo')); 
                 
        }
        public function buscar(){
            $this->layout='ajax';
            if($this->params['pass'][0]!="xxxxxxx")
                $minimo = $this->params['pass'][0];
            else
               $minimo=''; 
            if($this->params['pass'][1]!="xxxxxxx")
                $maximo = $this->params['pass'][1];
            else
               $maximo=''; 
            if($this->params['pass'][2]!="xxxxxxx")
                $fijo = $this->params['pass'][2];
            else
               $fijo=''; 
            if($this->params['pass'][3]!="xxxxxxx")
                $porcentaje = $this->params['pass'][3];
            else
               $porcentaje=''; 
           
            if($porcentaje=='' || $porcentaje==NULL){
            $this->Cheque->query("INSERT INTO intereses (created, vigencia, minimo, maximo, montofijo, user_id) 
                                        VALUES (NOW(), 1,'".$minimo."','".$maximo."','".$fijo."',".$this->Auth->user('id').")");
            }
            if($fijo=='' || $fijo==NULL){
            $this->Cheque->query("INSERT INTO intereses (created, vigencia, porcentaje, user_id) 
                                        VALUES (NOW(), 1,'".$porcentaje."',".$this->Auth->user('id').")");
            }

           $interese = $this->Cheque->Interese->find('list',array('fields'=>array('id','rango'),'order'=>array('id DESC')));

           $this->set(compact('interese'));
        }
        public function busca(){
            $this->layout='ajax';
            $cedula=$this->params['pass'][0];
            $nombre = $this->params['pass'][1];
            $apellido = $this->params['pass'][2];
            if($this->params['pass'][3]!="xxxxxx")
                $apodo = $this->params['pass'][3];
            else
               $apodo=''; 
            if($this->params['pass'][4]!="xxxxxx")
            $negocio = $this->params['pass'][4];
            else
                $negocio='';
            if($this->params['pass'][5]!="xxxxxx")
            $email = $this->params['pass'][5];
            else
                $email='';
            if($this->params['pass'][6]!="xxxxxx")
            $direccion = $this->params['pass'][6];
            else
                $direccion='';
            if($this->params['pass'][7]!="xxxxxx")
            $telefonofijo = $this->params['pass'][7];
            else
               $telefonofijo='';
            
            if($this->params['pass'][8]!="xxxxxx")
            $celular = $this->params['pass'][8];
            else
                $celular='';
            $this->Cheque->query("INSERT INTO clientes (created, cedula, nombre, apellido, apodo, negocio,email,direccion, telefonofijo,telefonocelular,user_id) 
                                        VALUES (NOW(),'".$cedula."','".$nombre."','".$apellido."', '".$apodo."', '".$negocio."'
                                            , '".$email."','".$direccion."','".$telefonofijo."','".$celular."',".$this->Auth->user('id').")");
           $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','apodo'),'order'=>array('id DESC')));
           $this->set(compact('clientes'));
        }
        public function aumentarinteres()
        {
           
            $sql="SELECT * FROM cheques WHERE cobrado=0 AND deuda=0";
            $chequesdevueltos=  $this->Cheque->query($sql);
             $select = "SELECT minimo, maximo, montofijo FROM intereses WHERE porcentaje IS NULL ORDER BY maximo DESC";
                $blabla=$this->Cheque->query($select);
            if(!empty($chequesdevueltos)){
                
                #debug($chequesdevueltos);
                #Para cheques devueltos, debo hacer calculo de interes diario, recalcular el interes cada dia
                # Debo hacer update en modificado dentro de chequeinterese donde es devuelto, y modificar la deuda
                # Para SOLO INTERESE debo usar esa fecha modificado (dentro de chequeinterese) tambien para ir insertando y cambiando el monto
                # de interes y de deuda.
                # SOLO INTERESES VA REGISTRANDO DIA TRAS DIA EL INTERES CUANDO ES DEVUELTO, YA QUE SE RECALCULA
                
                
                $total=count($chequesdevueltos);
               
                
                          
                //Lo que yo estoy haciendo BET para actualizar los montos, refinanciar interes cuando es devuelto dia tras dia.
                # Para modificar chequeinterese
               
                for($i=0;$i<$total;$i++){
                    $idcheque =$chequesdevueltos[$i]['cheques']['id'];
                     $cheque = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$idcheque)));
                     $pos = count($cheque['ChequeEstadocheque']);
                     $estado= $cheque['ChequeEstadocheque'][$pos-1]['estadocheque_id'];
                     
                    $consulta = "SELECT ci.modificado,ci.created, ci.montocheque, ci.montodescuentointeres, i.montofijo,i.porcentaje, ci.estadocheque  
                    FROM cheques as ch, intereses as i, chequeinterese as ci WHERE ch.id=ci.cheque_id AND ch.interese_id=i.id
                    AND ch.id=".$idcheque." ORDER BY ci.id DESC";
                #debug($consulta);
                $entregado = "SELECT montoentregado FROM chequeinterese WHERE estadocheque=1 AND 
                    cheque_id=".$idcheque." ORDER BY id DESC LIMIT 1";
                #debug($entregado);
                $ejecutar = $this->Cheque->query($entregado);
                #debug($ejecutar);
                $montoentregado=$ejecutar[0]['chequeinterese']['montoentregado'];
                $intereses=$this->Cheque->query($consulta);
                $select = "SELECT minimo, maximo, montofijo FROM intereses WHERE porcentaje IS NULL ORDER BY maximo DESC";
                $blabla=$this->Cheque->query($select);
                 $encontrado=0;
                 $nuevomonto = $montodeuda = $intereses[0]['ci']['montocheque'];
                 
                       foreach($blabla as $intereses1){
                           if($nuevomonto<$intereses1['intereses']['maximo'] && $nuevomonto>$intereses1['intereses']['minimo'])
                           {
                               $encontrado=1;
                               $montointeres= $intereses1['intereses']['montofijo'];
                           }
                       }
               # debug($intereses);
                
                if($encontrado==0)
                    $montointeres = $intereses[0]['ci']['montodescuentointeres'];
                
                $modificado = $intereses[0]['ci']['modificado'];
                $fijo = $intereses[0]['i']['montofijo'];
                $interes = $intereses[0]['i']['porcentaje'];
                $hoy=date("Y-m-d");
                $dias = $this->diferencia($modificado, $hoy);
               # debug($fijo);
                
                
                if($estado!=2){
                if($fijo!=null){
                    $dias--;
                    $nuevomonto=$montodeuda+$fijo;
                     if($encontrado==0)
                    $montointeres = $fijo;
                    $fechamodi = new DateTime($modificado);
                    $fechamodi = $fechamodi->format('Y-m-d');
                    $fechahoy = new DateTime($hoy);
                    $fechahoy = $fechahoy->format('Y-m-d');
                  
                  
                    if(strcmp($fechamodi, $fechahoy)!=0){
                        #PARA RECORRER VARIOS DIAS E IR RECALCULANDO DIA TRAS DIA EL INTERES CUANDO ES DEVUELTO
                        # ESTE MISMO CICLO SIRVE PARA INSERTAR EN SOLO INTERESES, LA DIFERENCIA ES QUE EN 
                        #CHEQUEINTERESE SE ACTUALIZA EL REGISTRO DONDE ESTE DEVUELTO, PERO EN SOLOINTERESES
                        #LA ACTUALIZACION SE HACE EN EL CICLO PORQUE SE HACE UNA INSERCION CADA VEZ, PORQUE EL 
                        #DEVUELTO VA VARIANDO.
                        $auxmontointeres=$montointeres;
                      $fecha=$intereses[0]['ci']['modificado'];
                     
                        for($i=0;$i<$dias;$i++){ 
                           
                            
                            
                            $nuevafecha = strtotime ('+1 day' , strtotime ( $fecha )) ;
                            $fecha = date ( 'Y-m-d' , $nuevafecha );
                           $nuevomonto=$montodeuda+$montointeres;
                        
                         
                           
                           $montodeuda=$nuevomonto;
                          
                          
                           
                        }
                          $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$nuevomonto.",
                                           ".$montointeres.",
                                           ".$montoentregado.",
                                           0,
                                           ".$idcheque.",
                                           ".$this->Auth->user('id').", '".$fecha."',NOW())";
               
                 $this->Cheque->query($sql3);
                        $cheques = "UPDATE cheques SET dias=1, modified=NOW() WHERE id=".$idcheque;
                        $this->Cheque->query($cheques);
                      $modificado = date('Y-m-d');
                        
                    }
                }else{
                    $interes = $interes/100;
                    $fechamodi = new DateTime($modificado);
                    $fechamodi = $fechamodi->format('Y-m-d');
                    $fechahoy = new DateTime($hoy);
                    $fechahoy = $fechahoy->format('Y-m-d');
                  
                        $dias--;
                    
                    
                    if(strcmp($fechamodi, $fechahoy)!=0){

                        $auxmontointeres=$montointeres;
                      $fecha=$intereses[0]['ci']['modificado'];
                     
                        for($i=0;$i<$dias;$i++){ 
                            $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                            $fecha = date ( 'Y-m-d' , $nuevafecha );
                           $nuevomonto=$montodeuda+$montointeres;
                            if($encontrado==0)
                           $montointeres=$nuevomonto*($interes);
                            
                           $montointeres=$this->redondear_a_10($montointeres);
                           
                           $montodeuda=$nuevomonto;
                            $auxmontointeres=$montointeres;
                            $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$nuevomonto.",
                                           ".$montointeres.",
                                           ".$montoentregado.",
                                           0,
                                           ".$idcheque.",
                                           ".$this->Auth->user('id').", '".$fecha."',NOW())";
               
                 $this->Cheque->query($sql3);
                           
                        }
                        $cheques = "UPDATE cheques SET dias=1, modified=NOW() WHERE id=".$idcheque;
                        $this->Cheque->query($cheques);
                      $modificado = date('Y-m-d');
                        
                    }
                    }
                    
                    
                        /*if(strcmp($fechamodi, $fechahoy)!=0){
                        $actualiza = "UPDATE chequeinterese SET montocheque=".$nuevomonto.", montodescuentointeres=".$montointeres.", 
                            modificado=NOW() WHERE cheque_id=".$idcheque." AND estadocheque=0";
                          $this->Cheque->query($actualiza);
                        }*/
                      
                
                }
                }
            }
            #return $this->redirect(array('action' => 'index'));
            
        }
        
        
        public function index() {
		$this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT cobrado, 
                                            SUM( monto ) as sumato, deuda
                                            FROM cheques
                                            WHERE (cobrado =1
                                            OR cobrado =0) AND deuda=0
                                            GROUP BY cobrado
                                            ORDER BY COBRADO"); 
                
                
                $this->aumentarinteres();
                /*Cuando deuda=0 debo, cuando es 1 no debo, cuando pasa a cobrado y la deuda es 0 */
              
               
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
                                    array(array('and'=>array(array('Cheque.cobrado'=>'0'),
                                            array('Cheque.deuda'=>0)))),
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
                               array(array('and'=>array(array('Cheque.cobrado'=>'0'),
                                            array('Cheque.deuda'=>0)))),
                                array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    )))));
                        $this->set(compact('yabusco'));
                    }
                    else{
                        
                         $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'1'),
                                    array(array('and'=>array(array('Cheque.cobrado'=>'0'),
                                            array('Cheque.deuda'=>0)))),
                                     array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    ))));
                     $this->set(compact('sumas','yabusco'));
                    }
                }
                 
                  }else{
                      $yabusco=2;
                    $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array
                                    (array('Cheque.cobrado'=>'1'),
                                    array(array('and'=>array(array('Cheque.cobrado'=>'0'),
                                            array('Cheque.deuda'=>0)))),
                                        array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    ))));
                     $this->set(compact('sumas','yabusco'));
                  }
                  
               
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
        public function devueltos() 
        {
                $this->Cheque->recursive = 2;
                $sumas=  $this->Cheque->query("SELECT estadocheque, SUM( montocheque ) as sumato, sum(Montodescuentointeres) as interes
                                            FROM chequeinterese
                                            WHERE estadocheque =0
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
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'0')
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
                            ),'and'=>array('or'=>array(array('Cheque.cobrado'=>'0')))))); 
                        $this->set(compact('yabusco'));
                    }
                    else{
                         $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'0')))));
                     $this->set(compact('sumas','yabusco'));
                    }
                }
                 
                  }else{
                      $yabusco=2;
                    $this->set('cheques', $this->paginate('Cheque',
                                array('or'=>array(array('Cheque.cobrado'=>'0')))));
                     $this->set(compact('sumas','yabusco'));
                  }
                  $this->set(compact('var'));
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
                $fijo=$this->Cheque->query("SELECT montofijo FROM intereses WHERE montofijo IS NOT NULL ORDER BY montofijo DESC LIMIT 1");
              if(!empty($fijo))
                $fijo = $fijo[0]['intereses']['montofijo'];
               else
                   $fijo=0;
		$this->set(compact('cheque','relacionados','montos','x','fijo'));
	}

/**
 * add method
 *
 * @return void
 */     
        
       private function chequeinteresesinsert($id){
            $chequedoid=  $this->ChequeEstadocheque->getLastInsertID();
            $cheques=$this->ChequeEstadocheque->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
            $estado = $cheques['ChequeEstadocheque'][0]['estadocheque_id'];
            $this->request->data['Chequeinterese']['estadocheque']=1;
             $this->request->data['Chequeinterese']['modificado']= $cheques['Cheque']['fecharecibido'];
            $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
            $this->request->data['Chequeinterese']['cheque_id'] = $id;
       
            $fecharecibido = $cheques['Cheque']['fecharecibido'];
            $fechacobro = $cheques['Cheque']['fechacobro'];
            $dias=$this->diferencia($fecharecibido, $fechacobro);
            $interes = $cheques['Interese']['porcentaje'];
            $fijo = $cheques['Interese']['montofijo'];
            $montocheque = $cheques['Cheque']['monto'];
            if($dias>1){
                if($interes==null){
                     if($estado==1){ 
                    for($i=0;$i<$dias;$i++){
                        $this->request->data['Chequeinterese']['montodescuentointeres']=$fijo;
                        $monto=$montocheque-$fijo;
                        $montocheque=$monto;
                        
                            $this->request->data['Chequeinterese']['montoentregado']=$this->redondear_a_10($monto);
                             $this->request->data['Chequeinterese']['montocheque']=0;
                          
                        
                        
                         $nuevafecha = strtotime ( '+1 day' , strtotime ( $this->request->data['Chequeinterese']['modificado'] ) ) ;
                         $this->request->data['Chequeinterese']['modificado'] = date ( 'Y-m-d' , $nuevafecha );
                    }
                    $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                    }
                    if($estado==2){
                            $this->request->data['Chequeinterese']['montoentregado']=0;
                             $this->request->data['Chequeinterese']['montocheque']=$this->redondear_a_10($monto);
                             $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                             $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                        }
                }else{
                    $montointeres=$this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($montocheque*($interes/100));
                   if($estado==1){
                    for($i=0;$i<$dias;$i++){
                       $monto=$montocheque-$montointeres;
                        $montocheque=$monto;
                        
                            $this->request->data['Chequeinterese']['montoentregado']=$monto;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                        
                       
                         $nuevafecha = strtotime ( '+1 day' , strtotime ( $this->request->data['Chequeinterese']['modificado'] ) ) ;
                         $this->request->data['Chequeinterese']['modificado'] = date ( 'Y-m-d' , $nuevafecha );
                    } 
                     $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                   }
                    
                        if($estado==2){
                            $this->request->data['Chequeinterese']['montoentregado']=0;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                             $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                             $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                        }
                }
            }else{
               if($interes==null){
                   $monto=$montocheque-$fijo;
                   $this->request->data['Chequeinterese']['montodescuentointeres']=$fijo;
               }else{
                   $montointeres = $montocheque*($interes/100);
                   $monto = $montocheque-$montointeres;
                   $this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($montointeres);
               }
               if($estado==1){
                $this->request->data['Chequeinterese']['montoentregado']=$this->redondear_a_10($monto);
                 $this->request->data['Chequeinterese']['montocheque']=0;
              }
                if($estado==2){
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                     $this->request->data['Chequeinterese']['montocheque']=0;
                      $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                }
                $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
            }
            
            
        }
        
        public function buscarte(){
            $this->layout='ajax';
            $idinteres=$this->params['pass'][0];
            $recibido = $this->params['pass'][1];
            $cheque = $this->params['pass'][2];
            $deuda = $this->params['pass'][3];
            $cobro = $this->params['pass'][4];
            $diferencia=$this->diferencia($recibido, $cobro);
    
            
            $coninteres = $this->Cheque->query("SELECT montofijo, porcentaje FROM intereses WHERE id='".$idinteres."'");
           $coninteres['Interese']=$coninteres[0]['intereses'];
          
            $montofijo= $coninteres['Interese']['montofijo'];
            $porcentaje= $coninteres['Interese']['porcentaje'];
            if($montofijo!=NULL){
                $monton = $deuda+$montofijo*$diferencia;
                $monton = $this->redondear_a_10($monton);
            }else{
                if($porcentaje!=NULL)
                {
                    $monton=(100*($deuda+(10)))/(100-($porcentaje*($diferencia)));
                
                    $monton = $this->redondear_a_10($monton);
                }
                    
            }
           $this->set(compact('monton'));
        }
        public function add2($id=null) {
		if ($this->request->is('post')) {
			$this->Cheque->create();
                       /* debug( $this->request->data);
                        exit(0);*/
                        $dias=$this->diferencia($this->request->data['Cheque']['fecharecibido'],$this->request->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['dias']=$dias;
                         $this->request->data['Cheque']['diaspost']=$dias;
                        $fecha1= new DateTime($this->data['Cheque']['fecharecibido']);
                        $fecha2 = new DateTime($this->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['fecharecibido']=$fecha1->format('Y-m-d');
                        $this->request->data['Cheque']['fechacobro']=$fecha2->format('Y-m-d');
                        $id1= $this->request->data['Cheque']['cheques_id'];
                        $monto = $this->request->data['monto'];
                        
                        $deuda = $this->request->data['montodeuda'];
                        $nuevomonto = $deuda - $monto;
                        if($nuevomonto<=0)
                        {
                            $nuevomonto=0;
                            $monto=$deuda;
                             $this->Cheque->query("UPDATE cheques SET deuda=1, modified=NOW() WHERE id=".$id1);
                        }
                         $this->request->data['Cheque']['monto']=$monto;
                         
                        $interes = $this->request->data['Cheque']['interese_id'];
                        $coninteres = $this->Cheque->Interese->find('first', array('conditions'=>array('Interese.id'=>$interes)));
                        $montofijo= $coninteres['Interese']['montofijo'];
                        $porcentaje= $coninteres['Interese']['porcentaje'];
                        if($porcentaje==null){
                            if($nuevomonto>0)
                            $montointeres=$montofijo;
                            else
                                $montointeres=0;
                        }else
                        {    
                            $montointeres = $nuevomonto*($porcentaje/100);
                        }
                        
                           $cheques = $this->Cheque->find('first',array('contidions'=>array('Cheque.id'=>$id1)));
                      
                    $estado = $cheques['ChequeEstadocheque'][0]['estadocheque_id'];
                    $montoentregado=0;
                    $nuevoestado="";
                    $encontrado=0;
                    if($estado==1){
                        $sql = "Select montoentregado FROM chequeinterese WHERE cheque_id=".$id1."  AND estadocheque=1
                            ORDER BY id DESC LIMIT 1";
                    }

                    if($estado==2){
                        $sql = "Select montoentregado FROM chequeinterese WHERE cheque_id=".$id1." 
                            ORDER BY id DESC LIMIT 1";
                    }
                    
                    $entrega = $this->Cheque->query($sql);
                    $montoentregado = $entrega[0]['chequeinterese']['montoentregado'];
                    $edocheques = $cheques['Cheque']['cobrado'];
                       #debug($coninteres); exit(0);
                     	if ($this->Cheque->save($this->request->data)) 
                        {                                
                                
                                $cheque_ids=  $this->Cheque->getLastInsertID();
                                
                                $sql = "INSERT INTO cheque_estadocheques (created,modified, cheque_id,estadocheque_id,user_id) 
                                    VALUES (NOW(),NOW(), ".$cheque_ids.", 1,".$this->Auth->user('id').")";
                                $sql3="INSERT INTO chequeinterese (montocheque,
                                            montodescuentointeres,
                                            montoentregado,
                                            estadocheque,
                                            cheque_id,
                                            user_id,modificado,created) 
                            VALUES(".$nuevomonto.",
                                   ".$montointeres.",
                                   ".$montoentregado.",
                                   ".$edocheques.",
                                   ".$id1.",
                                   ".$this->Auth->user('id').", NOW(),NOW())";

                        $this->Cheque->query($sql3);
                                $this->Cheque->query($sql);
                                 $this->chequeinteresesinsert($cheque_ids);
                                $this->Session->setFlash(__('El cheque ha sido guardado.'));
				return $this->redirect(array('action' => 'view/',$id1));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido guardado'));
			}
		}
		$bancos = $this->Cheque->Banco->find('list',array('fields'=>'nombre'));
                $muestra=0;		
                $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','apodo')));      
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
                        debug($this->request->data); exit(0);
                        $dias=$this->diferencia($this->request->data['Cheque']['fecharecibido'],$this->request->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['dias']=$dias;
                      
                        $this->request->data['Cheque']['montodeuda']=$this->request->data['Cheque']['monto'];
                        $this->request->data['Cheque']['numerodecuenta']=$this->request->data['numerodecuenta'];
                        $fecha1= new DateTime($this->data['Cheque']['fecharecibido']);
                        $fecha2 = new DateTime($this->data['Cheque']['fechacobro']);
                        $this->request->data['Cheque']['fecharecibido']=$fecha1->format('Y-m-d');
                        $this->request->data['Cheque']['fechacobro']=$fecha2->format('Y-m-d');
                      	if ($this->Cheque->save($this->request->data)) {
                                
                               
                                $cheque_ids=  $this->Cheque->getLastInsertID();
                                $this->Session->setFlash(__('El cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'chequeEstadocheques','action' => 'add/'.$cheque_ids));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido guardado'));
			}
		}
		$bancos = $this->Cheque->Banco->find('list',array('fields'=>array('id','nombre')));
                $muestra=0;
		if($id==null){
                    $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','apodo'),'order'=>array('id DESC')));
                    
                }
                else
                {
                    $muestra=1;
                    $conditions=array('Cliente.id'=>$id);
         	    $clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','apodo'),
                                                                                   'conditions'=>$conditions,'order'=>array('id DESC')));
                }
		$interese = $this->Cheque->Interese->find('list',array('fields'=>array('id','rango'),'order'=>array('id DESC')));
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
        return ceil($valor/10)*10; 
        } 
         public function editadevuelto($id=null){
            //COSAS A HACER EN SOLO INTERESES:
             // INSERTAR EL VALOR DE LOS DEVUELTOS, Y CADA DIA CUANDO CAMBIE EL VALOR
             $id=  $this->params['pass'][0];
            $tipo=  $this->params['pass'][1];
            
            
            
            if($tipo==0){ //SI ES DEVUELTO
                $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                $this->request->data = $this->Cheque->find('first', $options);
                $estado = $this->request->data['ChequeEstadocheque'][0]['estadocheque_id'];
            if($estado!=2){
                $x=$this->Cheque->query("SELECT *
                                      FROM chequeinterese
                                      WHERE cheque_id=".$id." Order by id");
                 $cobrado=$this->request->data['Cheque']['cobrado'] = $tipo;
                 
                 $estavez=$monto=$this->request->data['Cheque']['montodeuda'];
            
                 $entregado = "SELECT montoentregado FROM chequeinterese WHERE estadocheque=1 AND 
                    cheque_id=".$id." ORDER BY id DESC LIMIT 1";
                 $ejecutar = $this->Cheque->query($entregado);
                $montoentregado=$ejecutar[0]['chequeinterese']['montoentregado'];
                 $this->request->data['Cheque']['modified']=date('Y-m-d H:i:s');
                 /*acá hago un cambio en cheque debido al paso donde dice options despues del if $tipo=0*/ 
                
                      $this->Cheque->query("UPDATE cheques SET cobrado=".$cobrado.", 
                           modified=NOW() WHERE id = ".$id);
                  
                 $sql2="select dias, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $dias2=$y[0]['cheques']['dias'];
                 $sql="select * from chequeinterese where cheque_id=".$id." ORDER BY modificado DESC";
                 $xx=  $this->Cheque->query($sql);
               
                 $cheque = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
                $montooriginal=$cheque['Cheque']['monto'];
                $modificado = date('Y-m-d H:i:s');
                $modicobro = $cobro = $cheque['Cheque']['fechacobro'];
                $dias = $this->diferencia($cobro, $modificado);
                
                $select = "SELECT minimo, maximo, montofijo FROM intereses WHERE porcentaje IS NULL ORDER BY maximo DESC";
                $blabla=$this->Cheque->query($select);

              /*  if($dias>1){
                    $dias--;
                }*/
                $this->request->data['Cheque']['dias']=$dias;
            
                $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                $this->request->data['Chequeinterese']['cheque_id'] = $id;              
                $this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado']; 
                
                 
                $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                
                if($x[0]['I']['porcentaje']==null){
                    
                    if($estado==1){
                        $interes=$this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['montofijo'];
                        $this->request->data['Chequeinterese']['montoentregado']=0;
                        $nuevomonto=$montooriginal;
                        $modificado=$fecha=$xx[0]['chequeinterese']['modificado'];
                        
                       if($dias>1){
                           
                        for($i=0;$i<$dias-1;$i++){
                             $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                            $fecha = date ( 'Y-m-d' , $nuevafecha );
                       
                           $this->request->data['Chequeinterese']['montocheque']=$nuevomonto =$this->redondear_a_10( $nuevomonto + $interes);  
                          
                        } 
                         $dias = $this->diferencia($modicobro, $fecha);
                         $modificacheque = $this->Cheque->query("UPDATE cheques 
                                                        SET dias=".$dias.", modified=NOW()
                                                            WHERE id=".$this->request->data['Cheque']['id']."
                                                                  ");
                         $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$montoentregado.",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].",NOW(),NOW())";
                           $this->Cheque->query($sql3);
                           
                       }else{
                           $dias = $this->diferencia($modicobro, $fecha);
                           $modificacheque = $this->Cheque->query("UPDATE cheques 
                                                        SET dias=".$dias.", modified=NOW()
                                                            WHERE id=".$this->request->data['Cheque']['id']."
                                                                  ");
                           $this->request->data['Chequeinterese']['montocheque']=$nuevomonto = $this->redondear_a_10($nuevomonto + $interes);                           
                           $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$montoentregado.",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].", NOW(),NOW())";
                           $this->Cheque->query($sql3);
                       }
                    }
                    
                }
                else{
                    $porcentaje = $x[0]['I']['porcentaje'];
                   
                    if($dias>1){
                        $interes=($porcentaje/100)*$montooriginal;
                        $auxmontooriginal=$montooriginal;
                        if($estado==2){
                        $nuevomonto=$interes*$dias2;
                        #debug($nuevomonto);
                        $encontrado=0;
                        $this->request->data['Chequeinterese']['montoentregado']=0;
                       foreach($blabla as $intereses1){
                           
                           if($nuevomonto<$intereses1['intereses']['maximo'] && $nuevomonto>$intereses1['intereses']['minimo'])
                           {
                               $encontrado=1;
                               $interes= $this->request->data['Chequeinterese']['montodescuentointeres']=$intereses1['intereses']['montofijo'];
                           }
                       }
                           
                           
                         $fecha=$xx[0]['chequeinterese']['modificado'];
                         
                         
                        for($i=0;$i<$dias-1;$i++){
                             $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                            $fecha = date ( 'Y-m-d' , $nuevafecha );
                       if($nuevomonto<$estavez){
                           $this->request->data['Chequeinterese']['montocheque']=$nuevomonto = $this->redondear_a_10($nuevomonto + $interes); 
                       }else{
                           $this->request->data['Chequeinterese']['montocheque']=$nuevomonto = $this->redondear_a_10($estavez + $interes); 
                       }
                           }
                           $dias = $this->diferencia($modificado, $fecha);
                          $modificacheque = $this->Cheque->query("UPDATE cheques 
                                                        SET dias=".$dias.", modified=NOW()
                                                            WHERE id=".$this->request->data['Cheque']['id']."
                                                                  ");
                           $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$montoentregado.",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].",NOW(),NOW())";
                           $this->Cheque->query($sql3);
                        }else{
                             $fecha=$xx[0]['chequeinterese']['modificado'];
                           
                        for($i=0;$i<$dias-1;$i++){
                          $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                            $fecha = date ( 'Y-m-d' , $nuevafecha );
                           
                           $nuevomonto=$montooriginal+$interes;
                           
                           $montooriginal=$nuevomonto;
                            $this->request->data['Chequeinterese']['montocheque']=$this->redondear_a_10($nuevomonto);
                      
                         
                        }
                          $this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($interes);
                        $dias = $this->diferencia($modicobro, $fecha);
                        $modificacheque = $this->Cheque->query("UPDATE cheques 
                                                        SET dias=".$dias.", modified=NOW()
                                                            WHERE id=".$this->request->data['Cheque']['id']."
                                                                  ");
                      $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$montoentregado.",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].",NOW(),NOW())";
                          $this->Cheque->query($sql3);
                        }
                    }else{
                    
                        if($estado==1){
                            $this->request->data['Chequeinterese']['montodescuentointeres']=$interes=$this->redondear_a_10(($porcentaje/100)*$montooriginal);
                          #  $dias = $this->diferencia($modificado, $fecha);
                            $modificacheque = $this->Cheque->query("UPDATE cheques 
                                                        SET dias=".$dias.", modified=NOW()
                                                            WHERE id=".$this->request->data['Cheque']['id']."
                                                                  ");
                            $this->request->data['Chequeinterese']['montocheque']=$nuevomonto=  $this->redondear_a_10($montooriginal+$interes);
                             $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$this->request->data['Chequeinterese']['montocheque'].",
                                           ".$this->request->data['Chequeinterese']['montodescuentointeres'].",
                                           ".$montoentregado.",
                                           ".$tipo.",
                                           ".$this->request->data['Chequeinterese']['cheque_id'].",
                                           ".$this->request->data['Chequeinterese']['user_id'].",'".$modificado."',NOW())";
                          $this->Cheque->query($sql3);
                        }
                    }
                   
                    
                     $this->request->data['Chequeinterese']['montodescuentointeres']=$this->redondear_a_10($this->request->data['Chequeinterese']['montodescuentointeres']);
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                }
              
                
                $this->request->data['Chequeinterese']['montocheque']=$this->redondear_a_10($nuevomonto);
              /*  debug($this->request->data['Chequeinterese']['montodescuentointeres']);
                debug($this->request->data['Chequeinterese']['montocheque']);*/
                #exit(0);
                $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                $z=  $this->Cheque->query($sql);
            }else{
                 $sql = "UPDATE cheques SET cobrado=0, modified=NOW() WHERE id=".$id;
                        $this->Cheque->query($sql); 
                $pos =count($this->request->data['ChequeEstadocheque']);
                $estadonuevo = $this->request->data['ChequeEstadocheque'][$pos-1]['estadocheque_id'];
                if($estadonuevo==2){
                
                    $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(0,
                                           0,
                                          0,
                                           0,
                                           ".$this->request->data['Cheque']['id'].",
                                           ".$this->Auth->user('id').",NOW(),NOW())";
                          $this->Cheque->query($sql3);
                }
                if($estadonuevo==3){
                    $entregado = "SELECT montoentregado FROM chequeinterese WHERE 
                    cheque_id=".$id." ORDER BY id DESC LIMIT 1";
                 $ejecutar = $this->Cheque->query($entregado);
                $montoentregado=$ejecutar[0]['chequeinterese']['montoentregado'];
                 $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                
                      if($x[0]['I']['porcentaje']==null){
                              $montocheque = $montoentregado+$x[0]['I']['montofijo'];
                              $montointeres = $x[0]['I']['montofijo'];
                          }else{
                              $fijo = $this->Cheque->query("SELECT montofijo FROM intereses WHERE montofijo IS NOT NULL 
                                  ORDER BY montofijo DESC LIMIT 1");
                              if(!empty($fijo))
                              $fijo = $fijo[0]['intereses']['montofijo'];
                              else
                                  $fijo=0;
                               $montointeres = $this->redondear_a_10($montoentregado*($x[0]['I']['porcentaje']/100));
                               if($montointeres<$fijo){
                              $montocheque = $this->redondear_a_10($montoentregado+($montoentregado*($x[0]['I']['porcentaje']/100)));
                               
                               }else
                               {
                                    $montocheque = $this->redondear_a_10($montoentregado+$fijo);
                                    $montointeres = $this->redondear_a_10($fijo);
                               }
                             
                          }
                         
                    $sql3="INSERT INTO chequeinterese (montocheque,
                                                    montodescuentointeres,
                                                    montoentregado,
                                                    estadocheque,
                                                    cheque_id,
                                                    user_id,modificado,created) 
                                    VALUES(".$montocheque.",
                                           ".$montointeres.",
                                           ".$montoentregado.",
                                           0,
                                           ".$this->request->data['Cheque']['id'].",
                                           ".$this->Auth->user('id').",NOW(),NOW())";
                          $this->Cheque->query($sql3);
                }
            }
            #    exit(0);
                
                /*
                $this->request->data['Cheque']['cobrado'] = $tipo;
                $this->Cheque->save($this->request->data);
                $this->Session->setFlash(__('The estado de uno de los cheques ha pasado al estado "Devuelto".'));
            }else
                $this->Session->setFlash(__('The estado de uno de los cheques ha pasado al estado "Cobrado". '));*/
                
                return $this->redirect(array('action' => 'index'));
            }
            // TERMINA DEVUELTO EMPIEZA COBRADO--------------------------------------------
            else{
                
                $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
                $cheques = $this->Cheque->find('first', $options);
                $t1 = count($cheques['ChequeEstadocheque']);
                $montoorig = $cheques['Cheque']['monto'];
                $estado = $cheques['ChequeEstadocheque'][$t1-1]['estadocheque_id'];
                $t = count($cheques['Chequeinterese']);
                $cobrado = $cheques['Chequeinterese'][$t-1]['estadocheque'];
                //Los por cobrar//
                $entregados = "SELECT montoentregado, montocheque,montodescuentointeres 
                    FROM chequeinterese WHERE estadocheque=1 AND cheque_id=".$id." ORDER BY id DESC LIMIT 1";
                $entregado = $this->Cheque->query($entregados);
                $montoentregado = $entregado[0]['chequeinterese']['montoentregado'];
                $montondeuda = $entregado[0]['chequeinterese']['montocheque'];
                $interes = $entregado[0]['chequeinterese']['montodescuentointeres'];
                //----------------------------------------------------
                //Los devueltos//
                $entregados1 = "SELECT montoentregado, montocheque,montodescuentointeres 
                    FROM chequeinterese WHERE estadocheque=0 AND cheque_id=".$id." ORDER BY id DESC LIMIT 1";
                $entregado1 = $this->Cheque->query($entregados1);
                if(!empty($entregado1)){
                $montoentregado1 = $entregado1[0]['chequeinterese']['montoentregado'];
                $montondeuda1 = $entregado1[0]['chequeinterese']['montocheque'];
                $interes1 = $entregado1[0]['chequeinterese']['montodescuentointeres'];
                }else{
                    $montoentregado1 = 0;
                $montondeuda1 = 0;
                $interes1 = 0;
                }
                //----------------------------------------------------
               
          
                #exit(0);
                if($cobrado==0)   // DEVUELTO PASA A COBRADO
                {
                    
                    if($estado==1 || $estado==4)
                    {
                        $deuda = $montondeuda1 - $montoorig;
                        $sql = "UPDATE cheques SET cobrado=2, modified=NOW() WHERE id=".$id;
                        $this->Cheque->query($sql); 
                        $inserta = "INSERT INTO chequeinterese (montocheque, montodescuentointeres,
                            montoentregado,estadocheque,created,modificado,
                            cheque_id,user_id) 
                            VALUES(".$deuda.",0,".$montoentregado.",
                           2, NOW(),NOW(),".$id.",".$this->Auth->user('id').")";
                        $this->Cheque->query($inserta);
                        
                        
                    }
                    if($estado==3) //-----------------De cliente
                    {
                        $deuda = $montoorig - $montondeuda1;
                        $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                 $sql2="select dias, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $dias2=$y[0]['cheques']['dias'];
                if($x[0]['I']['porcentaje']==null){
                    $deuda= $deuda -($x[0]['I']['montofijo']*$dias2);
                }else{
                    /*  debug($deuda*($x[0]['I']['porcentaje']/100));
                    debug($x[0]['I']['porcentaje']/100);
                    debug($dias2);*/
                    $deuda= $deuda -(($deuda*($x[0]['I']['porcentaje']/100))*$dias2);
                    #debug($deuda);
                  
               
                }
                
                
                        $sql = "UPDATE cheques SET cobrado=2, modified=NOW() WHERE id=".$id;
                        $this->Cheque->query($sql); 
                        $inserta = "INSERT INTO chequeinterese (montocheque, montodescuentointeres,montoentregado,estadocheque,created,modificado,
                            cheque_id,user_id) 
                            VALUES(".$deuda.",0,0,
                           2, NOW(),NOW(),".$id.",".$this->Auth->user('id').")";
                        $this->Cheque->query($inserta);
                    }     
                    if($estado==2) //-----------------De cliente
                    {
                        $deuda = $montoorig - $montondeuda1;
                        $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                 $sql2="select dias, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $dias2=$y[0]['cheques']['dias'];
                if($x[0]['I']['porcentaje']==null){
                    $deuda= $deuda -($x[0]['I']['montofijo']);
                }else{
                    
                    /*debug($x[0]['I']['porcentaje']/100);
                    debug($dias2);*/
                    $deuda= $deuda -(($deuda*($x[0]['I']['porcentaje']/100)));
                    #debug($deuda);
                  
               
                }
                
                
                        $sql = "UPDATE cheques SET cobrado=2, modified=NOW() WHERE id=".$id;
                        $this->Cheque->query($sql); 
                        $inserta = "INSERT INTO chequeinterese (montocheque, montodescuentointeres,montoentregado,estadocheque,created,modificado,
                            cheque_id,user_id) 
                            VALUES(".$deuda.",0,0,
                           2, NOW(),NOW(),".$id.",".$this->Auth->user('id').")";
                        $this->Cheque->query($inserta);
                    }
                }
                if($cobrado==1)  //POR COBRAR Y PASA A COBRADO
                {
                    if($estado==1)
                    {  // Pertenece a Reinaldo
                        // Completamente Cancelado 
                        $sql = "UPDATE cheques SET cobrado=2, deuda=1, modified=NOW() WHERE id=".$id;
                         $this->Cheque->query($sql); 
                        $inserta = "INSERT INTO chequeinterese (montocheque, montodescuentointeres,montoentregado,estadocheque,created,modificado,
                            cheque_id,user_id) 
                            VALUES(0,0,".$montoentregado.",
                           2, NOW(),NOW(),".$id.",".$this->Auth->user('id').")";
                        $this->Cheque->query($inserta);
                                              
                    }
                    if($estado==2 || $estado==3)
                    {
                        $deuda = $montoorig - $montondeuda1;
                        $sql="SELECT porcentaje, montofijo
                    FROM intereses I, cheques C
                    WHERE interese_id = I.id
                    AND C.id=".$id."";
                $x=$this->Cheque->query($sql);
                 $sql2="select dias, interese_id from cheques where id=".$id;
                 $y=  $this->Cheque->query($sql2);
                 $dias2=$y[0]['cheques']['dias'];
                if($x[0]['I']['porcentaje']==null){
                    $deuda= $deuda -($x[0]['I']['montofijo']*$dias2);
                }else{
                    $deuda= $deuda -(($deuda*($x[0]['I']['porcentaje']/100))*$dias2);
                }
                         $sql = "UPDATE cheques SET cobrado=2, modified=NOW() WHERE id=".$id;
                         $this->Cheque->query($sql); 
                        $inserta = "INSERT INTO chequeinterese (montocheque, montodescuentointeres,montoentregado,estadocheque,created,modificado,
                            cheque_id,user_id) 
                            VALUES(".$deuda.",0,".$montoentregado.",
                           2, NOW(),NOW(),".$id.",".$this->Auth->user('id').")";
                        $this->Cheque->query($inserta);
                        
                    }
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
                        #debug($this->request->data);
                        if ($this->Cheque->save($this->request->data)) {
                            $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
                            $this->request->data['Chequeinterese']['cheque_id'] = $id;
                            $this->request->data['Chequeinterese']['estadocheque'] = $this->request->data['Cheque']['cobrado'];
                            $this->request->data['Chequeinterese']['modificado']=$this->request->data['Cheque']['fechacobro'];
                            $sql="select dias, cobrado, interese_id from cheques where id=".$id;
                            $y=  $this->Cheque->query($sql);
                             //debug($y);
                            $sql="SELECT porcentaje, montofijo
                                    FROM intereses I, cheques C
                                    WHERE interese_id = I.id
                                    AND C.id=".$id."";
                            $x=$this->Cheque->query($sql);
                            if($x[0]['I']['porcentaje']==null){
                               $this->request->data['Chequeinterese']['montodescuentointeres'] = $x[0]['I']['montofijo']*$y[0]['cheques']['dias'];

                                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-($x[0]['I']['montofijo']*$y[0]['cheques']['dias']);
                            }
                            else{

                                $p=(round(($x[0]['I']['porcentaje']/100)*$this->request->data['Cheque']['monto']));    
                                if($p%2!=0)
                                  $p++;
                                $this->request->data['Chequeinterese']['montodescuentointeres'] = $p*$y[0]['cheques']['dias'];
                                $this->request->data['Chequeinterese']['montoentregado']=$this->request->data['Cheque']['monto']-$p*$y[0]['cheques']['dias'];
                            }

                            $sql="delete from chequeinterese where cheque_id=".$id;
                            $this->Cheque->query($sql);

                           
                            $this->request->data['Chequeinterese']['montocheque']=0;

                            $this->Cheque->Chequeinterese->save($this->request->data);

                            $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$id." order by c.id desc";
                            $z=  $this->Cheque->query($sql);
                           

                            
                            
                            $this->Session->setFlash(__('El cheque ha sido editado.'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('El cheque no ha sido editado, revisa a ver que pasa.'));
			}
		} else {
			$options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $id));
			 $this->request->data = $find = $this->Cheque->find('first', $options);
                        
                        
		}
              
                
                
		$bancos = $this->Cheque->Banco->find('list');
		$clientes = $this->Cheque->Cliente->find('list',array('fields'=>array('id','apodo')));
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
        
         public function general($id=null){
             App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

 $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->Cheque->recursive =2;	
				 
	
	#$items = $this->Inventario->query("SELECT it.referencia1, ii.cantidad FROM 
               # item as it, inventario_item as ii WHERE ii.inventario_id=".$id." 
                  #  AND it.id = ii.item_id");	
        
       
        $cheques = $this->Cheque->find('all');
       

                $pago = $this->Cheque->Pago->find('all');
               $pagoterceros = $this->Cheque->Pagotercero->find('all');
        
		$this->set(compact('cheques','pago','pagoterceros'));
            $this->response->type('pdf');

            $this->set('fpdf', new FPDF(null,'L','mm','Letter'));
		$this->render('general','pdf');
        }
//*******************************REPORTE CHEQUE***********************************************
        public function reportecheque($id){
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

                $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->Cheque->recursive =2;	
				 
	
	#$items = $this->Inventario->query("SELECT it.referencia1, ii.cantidad FROM 
               # item as it, inventario_item as ii WHERE ii.inventario_id=".$id." 
                  #  AND it.id = ii.item_id");	
        
       
        $cheques = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
        $opciones2= array('conditions' => array('Cheque.cheque_id' => $id));
                $relacionados = $this->Cheque->find('all',$opciones2);
              #debug($cheques);
             
		$this->set(compact('cheques','relacionados'));
               

            $this->response->type('pdf');

            $this->set('fpdf', new FPDF(null,'L','mm','Letter'));
		$this->render('reportecheque','pdf');
        }
         public function relaciondia($id=null){
             App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

                $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->Cheque->recursive =2;	
				 
	
	#$items = $this->Inventario->query("SELECT it.referencia1, ii.cantidad FROM 
               # item as it, inventario_item as ii WHERE ii.inventario_id=".$id." 
                  #  AND it.id = ii.item_id");	
        
        $conditions= array('or'=>array
                                    (array('Cheque.cobrado'=>'1'),
                                    array(array('and'=>array(array('Cheque.cobrado'=>'0'),
                                            array('Cheque.deuda'=>0)))),
                                        array(array('and'=>array(array('Cheque.cobrado'=>'2'),
                                            array('Cheque.deuda'=>0)))),
                                    ));
        $cheques = $this->Cheque->find('all',array('conditions'=>$conditions));
       
		$this->set(compact('cheques'));
               

            $this->response->type('pdf');

            $this->set('fpdf', new FPDF(null,'L','mm','Letter'));
		$this->render('relaciondia','pdf');
        }
        
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
        public function delete3($id = null) {
		$this->Cheque->id = $id;
		if (!$this->Cheque->exists()) {
			throw new NotFoundException(__('Invalid cheque'));
		}
	
		if ($this->Cheque->delete()) {
			$this->Session->setFlash(__('El Cheque ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('El cheque no ha sido eliminado, verifica otra vez.'));
		}
		return $this->redirect(array('action' => 'devueltos'));
	}
        public function deleteall() {
		
		
		$this->Cheque->query("DELETE FROM cheques");
			$this->Session->setFlash(__('Se han eliminado todos los cheques.'));
		
			
		
		return $this->redirect(array('action' => 'index'));
	}
       
}