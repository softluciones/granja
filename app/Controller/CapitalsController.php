<?php
App::uses('AppController', 'Controller');
/**
 * Capitals Controller
 *
 * @property Capital $Capital
 * @property PaginatorComponent $Paginator
 */
class CapitalsController extends AppController {

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
		$this->Capital->recursive = 0;
		$this->set('capitals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Capital->exists($id)) {
			throw new NotFoundException(__('Invalid capital'));
		}
		$options = array('conditions' => array('Capital.' . $this->Capital->primaryKey => $id));
		$this->set('capital', $this->Capital->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Capital->create();
			if ($this->Capital->save($this->request->data)) {
				$this->Session->setFlash(__('The capital has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capital could not be saved. Please, try again.'));
			}
		}
		$users = $this->Capital->User->find('list');
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
		if (!$this->Capital->exists($id)) {
			throw new NotFoundException(__('Invalid capital'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Capital->save($this->request->data)) {
				$this->Session->setFlash(__('The capital has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capital could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Capital.' . $this->Capital->primaryKey => $id));
			$this->request->data = $this->Capital->find('first', $options);
		}
		$users = $this->Capital->User->find('list');
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
		$this->Capital->id = $id;
		if (!$this->Capital->exists()) {
			throw new NotFoundException(__('Invalid capital'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Capital->delete()) {
			$this->Session->setFlash(__('The capital has been deleted.'));
		} else {
			$this->Session->setFlash(__('The capital could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
