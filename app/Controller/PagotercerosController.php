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

/**
 * index method
 *
 * @return void
 */ ///josjeosjeosjeosjeosej
	public function index() {
                $_SESSION['varia']=1;
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
            $_SESSION['varia']=1;
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
            $id=  $this->params['pass'][0];
            $chequ=  $this->params['pass'][1];
            
            $_SESSION['varia']=1;
		if ($this->request->is('post')) {
			$this->Pagotercero->create();
                        $this->data;
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
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El pago a terceros no ha sido efectivo. Prueba otra vez y revisa'));
			}
		}
                if($id==null){
                    $clientes = $this->Pagotercero->Cliente->find('list');
                    $cheques = $this->Pagotercero->Cheque->find('list');
                }else{
                    $conditions=array('Cliente.id'=>$chequ);
         	    $clientes = $this->Pagotercero->Cliente->find('list',array('fields'=>array('id','nombres'),
                                                                                   'conditions'=>$conditions));
                    $conditions=array('Cheque.id'=>$id);
         	    $cheques = $this->Pagotercero->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                   'conditions'=>$conditions));
                    
                }
		#$cliente1s = $this->Pagotercero->Cliente->find('list',array('fields' => array('Cliente.nombres')));
                $cliente1s = $this->Pagotercero->Cliente->find('list');
		
		$users = $this->Pagotercero->User->find('list');
                $x=$this->Pagotercero->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('clientes', 'cliente1s', 'cheques', 'users'));
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
