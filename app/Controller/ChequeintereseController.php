<?php
App::uses('AppController', 'Controller');
/**
 * Chequeinterese Controller
 *
 * @property Chequeinterese $Chequeinterese
 * @property PaginatorComponent $Paginator
 */
class ChequeintereseController extends AppController {

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
		$this->Chequeinterese->recursive = 0;
		$this->set('chequeinterese', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Chequeinterese->exists($id)) {
			throw new NotFoundException(__('Invalid chequeinterese'));
		}
		$options = array('conditions' => array('Chequeinterese.' . $this->Chequeinterese->primaryKey => $id));
		$this->set('chequeinterese', $this->Chequeinterese->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Chequeinterese->create();
			if ($this->Chequeinterese->save($this->request->data)) {
				$this->Session->setFlash(__('The chequeinterese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chequeinterese could not be saved. Please, try again.'));
			}
		}
		$cheques = $this->Chequeinterese->Cheque->find('list');
		$users = $this->Chequeinterese->User->find('list');
		$this->set(compact('cheques', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Chequeinterese->exists($id)) {
			throw new NotFoundException(__('Invalid chequeinterese'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Chequeinterese->save($this->request->data)) {
				$this->Session->setFlash(__('The chequeinterese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chequeinterese could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Chequeinterese.' . $this->Chequeinterese->primaryKey => $id));
			$this->request->data = $this->Chequeinterese->find('first', $options);
		}
		$cheques = $this->Chequeinterese->Cheque->find('list');
		$users = $this->Chequeinterese->User->find('list');
		$this->set(compact('cheques', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Chequeinterese->id = $id;
		if (!$this->Chequeinterese->exists()) {
			throw new NotFoundException(__('Invalid chequeinterese'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Chequeinterese->delete()) {
			$this->Session->setFlash(__('The chequeinterese has been deleted.'));
		} else {
			$this->Session->setFlash(__('The chequeinterese could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
