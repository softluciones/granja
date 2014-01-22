<?php
App::uses('AppController', 'Controller');
/**
 * Solointerese Controller
 *
 * @property Solointerese $Solointerese
 * @property PaginatorComponent $Paginator
 */
class SolointereseController extends AppController {

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
		$this->Solointerese->recursive = 0;
		$this->set('solointerese', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Solointerese->exists($id)) {
			throw new NotFoundException(__('Invalid solointerese'));
		}
		$options = array('conditions' => array('Solointerese.' . $this->Solointerese->primaryKey => $id));
		$this->set('solointerese', $this->Solointerese->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Solointerese->create();
			if ($this->Solointerese->save($this->request->data)) {
				$this->Session->setFlash(__('The solointerese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solointerese could not be saved. Please, try again.'));
			}
		}
		$cheques = $this->Solointerese->Cheque->find('list');
		$this->set(compact('cheques'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Solointerese->exists($id)) {
			throw new NotFoundException(__('Invalid solointerese'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Solointerese->save($this->request->data)) {
				$this->Session->setFlash(__('The solointerese has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solointerese could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Solointerese.' . $this->Solointerese->primaryKey => $id));
			$this->request->data = $this->Solointerese->find('first', $options);
		}
		$cheques = $this->Solointerese->Cheque->find('list');
		$this->set(compact('cheques'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Solointerese->id = $id;
		if (!$this->Solointerese->exists()) {
			throw new NotFoundException(__('Invalid solointerese'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solointerese->delete()) {
			$this->Session->setFlash(__('The solointerese has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solointerese could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
