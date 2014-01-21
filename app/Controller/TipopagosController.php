<?php
App::uses('AppController', 'Controller');
/**
 * Tipopagos Controller
 *
 * @property Tipopago $Tipopago
 * @property PaginatorComponent $Paginator
 */
class TipopagosController extends AppController {

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
 */
	public function index() {$_SESSION['varia']=1;
		$this->Tipopago->recursive = 0;
		$this->set('tipopagos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {$_SESSION['varia']=1;
		if (!$this->Tipopago->exists($id)) {
			throw new NotFoundException(__('Tipo pago'));
		}
		$options = array('conditions' => array('Tipopago.' . $this->Tipopago->primaryKey => $id));
		$this->set('tipopago', $this->Tipopago->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {$_SESSION['varia']=1;
		if ($this->request->is('post')) {
			$this->Tipopago->create();
			if ($this->Tipopago->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de pago ha sido Guardado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de pago no ha sido Guardado. Prueba otra vez y revisa'));
			}
		}
		$users = $this->Tipopago->User->find('list');
                $x=$this->Tipopago->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {$_SESSION['varia']=1;
		if (!$this->Tipopago->exists($id)) {
			throw new NotFoundException(__('Tipo pago invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipopago->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de pago ha sido editado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo de pago no ha sido editado. Prueba otra vez y revisa'));
			}
		} else {
			$options = array('conditions' => array('Tipopago.' . $this->Tipopago->primaryKey => $id));
			$this->request->data = $this->Tipopago->find('first', $options);
		}
		$users = $this->Tipopago->User->find('list');
                $x=$this->Tipopago->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {$_SESSION['varia']=1;
		$this->Tipopago->id = $id;
		if (!$this->Tipopago->exists()) {
			throw new NotFoundException(__('Invalid tipopago'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipopago->delete()) {
			$this->Session->setFlash(__('The tipopago has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipopago could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
