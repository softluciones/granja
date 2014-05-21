<?php
App::uses('AppController', 'Controller');
/**
 * Pagoterceros Controller
 *
 * @property Pagotercero $Pagotercero
 * @property PaginatorComponent $Paginator
 */
class PagotercerosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        var $uses=array('Pagotercero','Cliente','Cheque');
/** 
 * index method
 *
 * @return void
 */ ///josjeosjeosjeosjeosej
	public function index() {
     
		$this->Pagotercero->recursive = 1;
                
		$this->set('pagoterceros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
 
		if (!$this->Pagotercero->exists($id)) {
			throw new NotFoundException(__('Pago tercero invalido'));
		}
		$options = array('conditions' => array('Pagotercero.' . $this->Pagotercero->primaryKey => $id));
		$this->set('pagotercero', $this->Pagotercero->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
            $this->Pagotercero->recursive=2;
            $id=  $this->params['pass'][0];
            $chequ=  $this->params['pass'][1];
            $usuario = $this->params['pass'][2];
		if ($this->request->is('post')) {
			$this->Pagotercero->create();
                        $concheques = $this->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
                        $pos = count($concheques['Chequeinterese']);
                       $montopagado=$this->data['Pagotercero']['monto'];
                       
                       $maximo = $this->params['pass'][1];
                       $montofijo = $concheques['Interese']['montofijo'];
                       $porcentaje = $concheques['Interese']['porcentaje'];
                       
                       if($porcentaje==null){
                           $menosporcentaje = $maximo - $montofijo;
                           $pago = $montofijo;
                       }
                       else{
                           $menosporcentaje = $maximo - ($maximo*($porcentaje/100));
                           $pago = $montopagado*($porcentaje/100);
                       }
                       $montodeuda = $maximo-($montopagado+$pago);
                       if($montopagado>$menosporcentaje){
                           $this->request->data['Pagotercero']['monto']=$montopagado = $maximo-$pago;
                           $montodeuda=0;
                       }
                       $montopago=$this->data['Pagotercero']['monto'];
                       $encontrado=0;
                       $montodescuentointeres=0;
                       $interese=$concheques['Interese'];
                           
                           if($interese['montofijo']!=null){
                               if($interese['maximo']>$montopago && $interese['minimo']<$montopago){
                                   $encontrado=1;
                                   $montodescuentointeres=$interese['montofijo'];                                   
                               }
                           }
                      
                       if($encontrado==0){
                           $montodescuentointeres=$montopago*($porcentaje/100);
                       }
                       if($montodeuda==0){
                           $montodescuentointeres=0;
                           $this->Cheque->query("UPDATE cheques SET deuda=1, modified=NOW() WHERE id=".$id);
                       }
                       $montoentregado = $concheques['Chequeinterese'][$pos-1]['montoentregado'];
                       $inserta = $this->Pagotercero->query("INSERT INTO chequeinterese (montocheque,montodescuentointeres,montoentregado,estadocheque,created,modificado,cheque_id,user_id)
                           VALUES (".$montodeuda.",".$montodescuentointeres.",".$montoentregado.",".$concheques['Cheque']['cobrado'].",NOW(),NOW(),".$id.",".$this->Auth->user('id').")");
                        $sql="INSERT INTO pagoterceros (created,dia,monto,conceptode,cliente_id,cliente_id1,cheque_id,
                            user_id) VALUES (NOW(),'".$this->data['Pagotercero']['dia']."', 
                                ".$this->data['Pagotercero']['monto'].",
                                    '".$this->data['Pagotercero']['conceptode']."',
                                        ".$this->data['Pagotercero']['cliente_id'].",
                                            ".$this->data['Pagotercero']['cliente1s'].",
                                                ".$this->data['Pagotercero']['cheque_id'].",
                                                    ".$this->data['Pagotercero']['user_id'].")";
                        
                        
			if (!$this->Pagotercero->query($sql)) {
                            
				$this->Session->setFlash(__('El pago a tercero ha sido efectivo.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('El pago a terceros no ha sido efectivo. Prueba otra vez y revisa'));
			}
		}
                if($id==null){
                    $clientes = $this->Pagotercero->Cliente->find('list');
                    $cheques = $this->Pagotercero->Cheque->find('list');
                }else{
                    $conditions=array('Cliente.id'=>$chequ);
         	    $clientes = $this->Cliente->find('list',array('fields'=>array('id','apodo'),
                                                                                   'conditions'=>array('Cliente.id'=>$usuario)));
              
                    $conditions=array('Cheque.id'=>$id);
         	    $cheques = $this->Pagotercero->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                   'conditions'=>$conditions));
                    
                }
		#$cliente1s = $this->Pagotercero->Cliente->find('list',array('fields' => array('Cliente.nombres')));
                $cliente1s = $this->Pagotercero->Cliente->find('list',array('fields'=>array('id','apodo')));
		
		$users = $this->Pagotercero->User->find('list');
                $x=$this->Pagotercero->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('clientes', 'cliente1s', 'cheques', 'users','chequ'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {$_SESSION['varia']=1;
		if (!$this->Pagotercero->exists($id)) {
			throw new NotFoundException(__('Pago a Tercero invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$sql="UPDATE pagoterceros SET
                            dia='".$this->data['Pagotercero']['dia']."',
                                monto=".$this->data['Pagotercero']['monto'].",
                                    conceptode='".$this->data['Pagotercero']['conceptode']."',
                                    cliente_id=".$this->data['Pagotercero']['cliente_id'].",
                                        cliente_id1=".$this->data['Pagotercero']['cliente1s'].",
                                            cheque_id=".$this->data['Pagotercero']['cheque_id'].",
                                                user_id=".$this->data['Pagotercero']['user_id']."
                               WHERE id=".$this->data['Pagotercero']['id']."";
                        debug($sql);
                        $x=$this->Pagotercero->query($sql);
                        debug($x);
                        if (!$x) {
				$this->Session->setFlash(__('El pago a tercero ha sido modificado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El pago a tercero no ha sido modificado. Prueba otra vez y revisa'));
			}
		} else {
			$options = array('conditions' => array('Pagotercero.' . $this->Pagotercero->primaryKey => $id));
			$this->request->data = $this->Pagotercero->find('first', $options);
		}
		$clientes = $this->Pagotercero->Cliente->find('list');
		$cliente1s = $this->Pagotercero->Cliente1->find('list');
		$cheques = $this->Pagotercero->Cheque->find('list');
		$users = $this->Pagotercero->User->find('list');
                $cliente2 = $this->Pagotercero->query("SELECT cliente_id1 FROM pagoterceros 
                    WHERE id = ".$id);
                $cliente2 = $cliente2[0]['pagoterceros']['cliente_id1'];
               # debug($cliente2);
		$this->set(compact('cliente2','clientes', 'cliente1s', 'cheques', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {$_SESSION['varia']=1;
		$this->Pagotercero->id = $id;
		if (!$this->Pagotercero->exists()) {
			throw new NotFoundException(__('Pago a tercero Invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagotercero->delete()) {
			$this->Session->setFlash(__('El pago a tercero ha sido eliminado'));
		} else {
			$this->Session->setFlash(__('El pago a tercero no ha sido eliminado. Prueba otra vez y verifica'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
