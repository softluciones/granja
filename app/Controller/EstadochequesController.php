<?php
App::uses('AppController', 'Controller');
/**
 * Estadocheques Controller
 *
 * @property Estadocheque $Estadocheque
 * @property PaginatorComponent $Paginator
 */
class EstadochequesController extends AppController {

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
	public function index() {
            $_SESSION['varia']=1;
		$this->Estadocheque->recursive = 0;
		$this->set('estadocheques', $this->Paginator->paginate());
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
		if (!$this->Estadocheque->exists($id)) {
			throw new NotFoundException(__('Estado cheque invalido'));
		}
		$options = array('conditions' => array('Estadocheque.' . $this->Estadocheque->primaryKey => $id));
		$this->set('estadocheque', $this->Estadocheque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $_SESSION['varia']=1;
		if ($this->request->is('post')) {
			$this->Estadocheque->create();
			if ($this->Estadocheque->save($this->request->data)) {
				$this->Session->setFlash(__('El estado cheque ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado cheque no ha sido guardado. Prueba de nuevo y revisa'));
			}
		}
		$users = $this->Estadocheque->User->find('list');
                $x=$this->Estadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                
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
	public function edit($id = null) {
            $_SESSION['varia']=1;
		if (!$this->Estadocheque->exists($id)) {
			throw new NotFoundException(__('Estado cheque invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Estadocheque->save($this->request->data)) {
				$this->Session->setFlash(__('El estado cheque ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado cheque ha sido modificado. Prueba otra vez y revisa'));
			}
		} else {
			$options = array('conditions' => array('Estadocheque.' . $this->Estadocheque->primaryKey => $id));
			$this->request->data = $this->Estadocheque->find('first', $options);
		}
		$users = $this->Estadocheque->User->find('list');
                $x=$this->Estadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                
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
	public function delete($id = null) {
            $_SESSION['varia']=1;
		$this->Estadocheque->id = $id;
		if (!$this->Estadocheque->exists()) {
			throw new NotFoundException(__('Estado cheque invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estadocheque->delete()) {
			$this->Session->setFlash(__('El estado cheque ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('El estado cheque no ha sido eliminado. Prueba otra vez y revisa'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
