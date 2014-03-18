<?php
App::uses('AppController', 'Controller');

class PagosController extends AppController {


	public $components = array('Paginator');
        public $uses = array('Cheque', 'Pago');

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
                    $cheq=$this->params['pass'][0];
                    $montos=$this->params['pass'][4];  // Monto deuda en chequeinteres
                    $debo=$this->params['pass'][2];
                    $cheques = $this->Cheque->find('first',array('contidions'=>array('Cheque.id'=>$cheq)));
                      
                    $estado = $cheques['ChequeEstadocheque'][0]['estadocheque_id'];
                    $montoentregado=0;
                    $nuevoestado="";
                    $encontrado=0;
                    if($estado==1){
                        $sql = "Select montoentregado FROM chequeinterese WHERE cheque_id=".$cheq."  AND estadocheque=1
                            ORDER BY id DESC LIMIT 1";
                    }

                    if($estado==2){
                        $sql = "Select montoentregado FROM chequeinterese WHERE cheque_id=".$cheq." 
                            ORDER BY id DESC LIMIT 1";
                    }

                    $entrega = $this->Cheque->query($sql);
                    $montoentregado = $entrega[0]['chequeinterese']['montoentregado'];
                    $montopagado = $this->data['Pago']['monto'];
                    $interes = $cheques['Interese']['porcentaje'];
                    $edocheques = $cheques['Cheque']['cobrado'];
                 
                    # debug($edocheques); exit(0);
                    $montofijo = $cheques['Interese']['montofijo'];
                    $nuevomonto = $montos-$montopagado;

                    if($nuevomonto<=0){
                        $nuevomonto=0;
                        $this->Pago->query("UPDATE cheques SET deuda=1, modified=NOW() WHERE id=".$cheq);
                    }
                    $select = $this->Cheque->query("SELECT maximo, minimo, montofijo 
                        FROM intereses");


                    $montointeres=0;

                        foreach($select as $inter):
                            if($nuevomonto<$inter['intereses']['maximo'] && $nuevomonto>$inter['intereses']['minimo'])
                               {
                                   $encontrado=1;
                                   $montointeres= $inter['intereses']['montofijo'];
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
                        if($debo==0){  
                           $nuevoestado = 4;                                                                                             
                        }else{
                            $nuevoestado = 3;
                            $montoentregado=$montoentregado+$montopagado;                                
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
                        $this->Session->setFlash(__('Algo está mal en esta transaccion revisa de nuevo'));
                }		
        }
        $chequeinterese = $this->Pago->Chequeinterese->find('list');
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
            $clientes = $this->Pago->Cliente->find('list',array('fields'=>array('id','nombres'),
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
        $this->set(compact('debo','otro','clientes', 'chequeinterese', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users','montos','id'));
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
