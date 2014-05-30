<?php
App::uses('AppController', 'Controller');
/**
 * Tipogarantias Controller
 *
 * @property Tipogarantia $Tipogarantia
 * @property PaginatorComponent $Paginator
 */
class TipogarantiasController extends AppController {

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
		$this->Tipogarantia->recursive = 0;
		$this->set('tipogarantias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipogarantia->exists($id)) {
			throw new NotFoundException(__('Invalid tipogarantia'));
		}
		$options = array('conditions' => array('Tipogarantia.' . $this->Tipogarantia->primaryKey => $id));
		$this->set('tipogarantia', $this->Tipogarantia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipogarantia->create();
			if ($this->Tipogarantia->save($this->request->data)) {
				$this->Session->setFlash(__('The tipogarantia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipogarantia could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipogarantia->exists($id)) {
			throw new NotFoundException(__('Invalid tipogarantia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipogarantia->save($this->request->data)) {
				$this->Session->setFlash(__('The tipogarantia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipogarantia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipogarantia.' . $this->Tipogarantia->primaryKey => $id));
			$this->request->data = $this->Tipogarantia->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipogarantia->id = $id;
		if (!$this->Tipogarantia->exists()) {
			throw new NotFoundException(__('Invalid tipogarantia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipogarantia->delete()) {
			$this->Session->setFlash(__('The tipogarantia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipogarantia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
