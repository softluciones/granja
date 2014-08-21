<?php
App::uses('AppController', 'Controller');

class PagosController extends AppController {


	public $components = array('Paginator');
        public $uses = array('Cheque', 'Pago','Banco');

	public function index() {
		$this->Pago->recursive = 0;
		$this->set('pagos', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
		$this->set('pago', $this->Pago->find('first', $options));
	}

        public function redondear_a_10($valor) { 
            $valor = intval($valor);
            return ceil($valor/10)*10; 
        } 
        
	public function add($id=null) {
		if ($this->request->is('post')) 
                {
                    
                    $montos=$this->params['pass'][4];  // Monto deuda en chequeinteres
                    $debo=$this->params['pass'][2];
                    $cheq=$this->params['pass'][0];
                 
                    $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $cheq));
                    $cheques = $this->Pago->Cheque->find('first',$options);
                       
                    $estado = $cheques['ChequeEstadocheque'][0]['estadocheque_id'];
                    $montoentregado=0;
                    $nuevoestado="";
                    $encontrado=0;
                  
                        $sql = "Select montoentregado FROM chequeinterese WHERE cheque_id=".$cheq."  AND estadocheque=1
                            ORDER BY id DESC LIMIT 1";
                    $entrega = $this->Cheque->query($sql);
                    $montoentregado = $entrega[0]['chequeinterese']['montoentregado'];
                    
                    $montopagado = $this->data['Pago']['monto'];
                    $interes = $cheques['Interese']['porcentaje'];
                    $edocheques = $cheques['Cheque']['cobrado'];
                   
                    $montofijo = $cheques['Interese']['montofijo'];
                    $nuevomonto = $montos-$montopagado;
                    if($nuevomonto<0){
                         $this->Session->setFlash(__('El monto pagado, no debe superar el monto de la deuda.'));
                    }else{

                    if($nuevomonto==0 && (($edocheques==2 && $estado==2) || ($edocheques==2 && $estado==1) || ($edocheques==0 && $estado==1))){
                        
                        $this->Pago->query("UPDATE cheques SET deuda=1, modified=NOW() WHERE id=".$cheq);
                    }
                    $select = $this->Cheque->query("SELECT maximo, minimo, montofijo 
                        FROM intereses");


                    $montointeres = 0;

                        foreach($select as $inter):
                            if($nuevomonto<$inter['intereses']['maximo'] && $nuevomonto>$inter['intereses']['minimo'])
                               {
                                   $encontrado=1;
                                   $montointeres = $inter['intereses']['montofijo'];
                               }
                        endforeach;


                            if($encontrado==0 && $edocheques!=2){
                                if($montofijo!=null){
                                    $montointeres=$montofijo;
                                }
                                if($interes!=null){
                                    $montointeres=$nuevomonto*($interes/100);
                                }
                            }
                            if($edocheques==2){
                                $montointeres=0;
                            }
                            if($estado==1){
                             $nuevoestado = 4;
                             
                             
                       
                            }
                            
                             
                            if($estado==2){
                               if($edocheques==1){
                                     $nuevomonto = 0;
                                    $montointeres=0;
                                    $montoentregado=$montopagado+$montoentregado;
                                    
                                } 
                          
                                $nuevoestado=3;
                            }
                            if($estado==3){
                                 if($edocheques==1){
                                    $nuevomonto=$montopagado+$montoentregado;
                                    $montointeres=0;
                                    $montoentregado=$montoentregado+$montopagado;
                                } 
                                if($edocheques==0){
                                    $nuevomonto=$montopagado+$montoentregado;
                                    $montointeres=0;
                                    $montoentregado=$montoentregado+$montopagado;
                                } 
                                 if($edocheques==2){
                                    $nuevomonto=$montos-$montopagado;
                                    $montointeres=0;
                                    $montoentregado=$montoentregado+$montopagado;
                                } 
                            }
                           
                        $cuenta=$this->Pago->query("SELECT count(*) as cuenta FROM cheque_estadocheques 
                            WHERE cheque_id=".$cheq." AND estadocheque_id=".$nuevoestado);
                        $cant = $cuenta[0][0]['cuenta'];
                        if($cant==0){
                            $this->Pago->query("INSERT INTO cheque_estadocheques (created,modified,cheque_id,estadocheque_id,user_id)
                                VALUES (NOW(),NOW(),".$cheq.",".$nuevoestado.",".$this->Auth->user('id').")");
                        }
                    
                    
                 if($this->Pago->save($this->request->data)){


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
                                   ".$cheq.",
                                   ".$this->Auth->user('id').", NOW(),NOW())";

                        $this->Cheque->query($sql3);
                 
                        $this->Session->setFlash(__('El pago ha sido efectuado.'));
                        return $this->redirect(array('controller'=>'cheques','action' => 'view',$cheq));
                } else {
                        $this->Session->setFlash(__('Algo está mal en esta transacción revisa de nuevo'));
                }		
        }
                }
       
        if($id==null){
            return $this->redirect(array('controller'=>'cheques','action' => 'index'));
            $clientes = $this->Pago->Cliente->find('list');
            $cheques = $this->Pago->Cheque->find('list');
        }else{
            $cheq=$this->params['pass'][0]; // id de cheque
            $otro=$this->params['pass'][1]; // Es un pago a terceros si es 1 de lo contrario 0
            $debo=$this->params['pass'][2];  // 0 Si me debe 1 si le debo
            $clie=$this->params['pass'][3];  // id cliente
            $montos=$this->params['pass'][4];  // monto de deuda


            $conditions=array('Cliente.id'=>$clie);
            $clientes = $this->Pago->Cliente->find('list',array('fields'=>array('id','apodo'),
                                                                            'conditions'=>$conditions));
            $conditions=array('Cheque.id'=>$cheq);
            $cheques = $this->Cheque->find('list',array('fields'=>array('numerodecheque'),
                                                                            'conditions'=>$conditions));

        }
                
        $chequeEstadocheques = $this->Pago->ChequeEstadocheque->find('list');
        $tipopagos = $this->Pago->Tipopago->find('list');
        $pagoterceros = $this->Pago->Pagotercero->find('list');
        $users = $this->Pago->User->find('list');
        $x=$this->Pago->query("select id, username from users where id=".$this->Auth->user('id')."");

        $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
        $this->set(compact('debo','otro','clientes', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users','montos','id'));
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
         private function descuenta($cuentapropia, $monto, $observacion){
             $montoencta=$this->Pago->query("SELECT montoencuenta FROM cuentaspropias WHERE id=".$cuentapropia."");
             $montoencta = $montoencta[0]['cuentaspropias']['montoencuenta'];
             $montoactual = $montoencta-$monto;
             $this->Pago->query("INSERT INTO montocuentas (monto, fecha,cuentaspropia_id,observacion) VALUES 
                 (".$montoactual.",NOW(),".$cuentapropia.",'".$observacion."')");
             $this->Pago->query("UPDATE cuentaspropias SET montoencuenta=".$montoactual." WHERE id=".$cuentapropia."");
             
         }
         public function add1($id=null) { //MONTOS ENTREGADOS CUANDO CHEQUE ES R
            $this->Pago->recursive = 2;
            $cheq=$this->params['pass'][0]; // id de cheque
            
            
		if ($this->request->is('post')) 
                {
                    $this->request->data['Pago']['cuentaspropia_id']= $this->request->data['Cuentaspropia']['id'];
                    
                    $datos=$this->request->data; 
                     
                    #debug($montoencta);exit(0);
                  if($this->Pago->save($this->request->data))
                    {
                        $usuario = $datos['Pago']['user_id'];
                        $pagoid=  $this->Pago->getLastInsertID();
                        $montocheque=0;
                        $montoentregado = $datos['Pago']['monto'];
                        $chequeid = $datos['Pago']['cheque_id'];
                        $montooriginal = $this->Pago->query("SELECT c.monto, i.montofijo, i.porcentaje, c.numerodecheque, 
                            CONCAT(cl.nombre,' ',cl.apellido) as nombre
                            FROM cheques as c, intereses as i, clientes as cl WHERE 
                            c.id='".$chequeid."' AND c.interese_id=i.id AND cl.id=c.cliente_id");
            
                        $cliente = $montooriginal[0][0]['nombre'];
                        $nrocheque=$montooriginal[0]['c']['numerodecheque'];
                       $porcentaje = $montooriginal[0]['i']['porcentaje'];
                       $montofijo = $montooriginal[0]['i']['montofijo'];
                        $montooriginal = $montooriginal[0]['c']['monto'];
                        $interes=0;
                        if($montofijo!=null){
                            $interes = $montofijo;
                        }
                        if($porcentaje!=null){
                            $interes=$montooriginal*$porcentaje/100;
                        }
                       
                        $this->Pago->query("INSERT INTO chequeinterese 
                            (montocheque, montodescuentointeres, montoentregado, estadocheque,created, modified,
                            cheque_id, user_id,modificado, pago_id) 
                            VALUES (".$montocheque.",".$interes.", ".$montoentregado.",1,NOW(),NOW(),".$chequeid.",
                                ".$usuario.",NOW(),".$pagoid.")");
                        $observacion = "Se entregó el pago del cheque ".$nrocheque." al cliente ".$cliente." ".$datos['Pago']['conceptode'];
                        $this->descuenta($datos['Pago']['cuentaspropia_id'],$montoentregado, $observacion);
                   $this->Session->setFlash(__('El pago ha sido efectuado.'));
                        return $this->redirect(array('controller'=>'cheques','action' => 'view',$chequeid));
                } else {
                        $this->Session->setFlash(__('Algo está mal en esta transacción revisa de nuevo'));
                }		
                }
                
                
                
                $options = array('conditions' => array('Cheque.' . $this->Cheque->primaryKey => $cheq));
                    $cheque1 = $this->Cheque->find('first',$options);
                 $fijo=$cheque1['Interese']['montofijo'];
                 $porcentaje = $cheque1['Interese']['porcentaje'];
                 $recibido = $cheque1['Cheque']['fecharecibido'];
                 $cobro = $cheque1['Cheque']['fechacobro'];
                 $diferencia=$this->diferencia($recibido, $cobro);
                 $monto = $cheque1['Cheque']['monto'];
                 $hoy=date("Y-m-d");
                 $clie = $cheque1['Cheque']['cliente_id'];
                 if($fijo!=NULL){
                     $interes = $fijo;
                     $totalinteres = $fijo*$diferencia;
                     $entregar = $monto - $totalinteres;
                 }
                 if($porcentaje!=NULL){
                     $interes = $monto * $porcentaje/100;
                     $totalinteres = $interes*$diferencia;
                     $entregar = $monto - $totalinteres;
                     
                 }
                 $entregar = $this->redondear_a_10($entregar);
                 $montos = $entregar;
                 $conditions=array('Cliente.id'=>$clie);
                  $clientes = $this->Pago->Cliente->find('list',array('fields'=>array('id','apodo'),
                                                                            'conditions'=>$conditions));
                  $conditions=array('Cheque.id'=>$cheq);
                 $cheques = $this->Cheque->find('list',array('fields'=>array('numerodecheque'),
                                                                            'conditions'=>$conditions));
                 $tipopagos = $this->Pago->Tipopago->find('list');
                  $x=$this->Pago->query("select id, username from users where id=".$this->Auth->user('id')."");
                  $banco = $this->Banco->find('list');
                    $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
                 $this->set(compact('cheques','tipopagos','clientes','montos','users','banco'));
	}
        
	public function edit($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pago->save($this->request->data)) {
				$this->Session->setFlash(__('The pago has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pago could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
			$this->request->data = $this->Pago->find('first', $options);
		}
		$clientes = $this->Pago->Cliente->find('list');
		$chequeinterese = $this->Pago->Chequeinterese->find('list');
		$cheques = $this->Pago->Cheque->find('list');
		$chequeEstadocheques = $this->Pago->ChequeEstadocheque->find('list');
		$tipopagos = $this->Pago->Tipopago->find('list');
		$pagoterceros = $this->Pago->Pagotercero->find('list');
		$users = $this->Pago->User->find('list');
                $x=$this->Cliente->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('clientes', 'chequeinterese', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users'));
	}
        
        public function delete($id = null) {
		$this->Pago->id = $id;
		if (!$this->Pago->exists()) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pago->delete()) {
			$this->Session->setFlash(__('The pago has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pago could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
