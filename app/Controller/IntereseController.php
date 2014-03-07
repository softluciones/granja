<?php
App::uses('AppController', 'Controller');
/**
 * Interese Controller
 *
 * @property Interese $Interese
 * @property PaginatorComponent $Paginator
 */

class IntereseController extends AppController {

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
		$this->Interese->recursive = 0;
		$this->set('interese', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
           
		if (!$this->Interese->exists($id)) {
			throw new NotFoundException(__('Invalid interese'));
		}
		$options = array('conditions' => array('Interese.' . $this->Interese->primaryKey => $id));
		$this->set('interese', $this->Interese->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
           
		if ($this->request->is('post')) {
			$this->Interese->create();
			if ($this->Interese->save($this->request->data)) {
				$this->Session->setFlash(__('El interes ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El interes no habia sido guardado.'));
			}
		}
		$users = $this->Interese->User->find('list');
                $x=$this->Interese->query("select id, username from users where id=".$this->Auth->user('id')."");
                
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
        
		if (!$this->Interese->exists($id)) {
			throw new NotFoundException(__('Invalid interese'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Interese->save($this->request->data)) {
				$this->Session->setFlash(__('The interese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interese could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Interese.' . $this->Interese->primaryKey => $id));
			$this->request->data = $this->Interese->find('first', $options);
		}
		$users = $this->Interese->User->find('list');
                $x=$this->Interese->query("select id, username from users where id=".$this->Auth->user('id')."");
                
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
      
		$this->Interese->id = $id;
		if (!$this->Interese->exists()) {
			throw new NotFoundException(__('Invalid interese'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Interese->delete()) {
			$this->Session->setFlash(__('The interese has been deleted.'));
		} else {
			$this->Session->setFlash(__('The interese could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
