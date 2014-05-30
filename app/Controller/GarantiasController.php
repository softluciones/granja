<?php
App::uses('AppController', 'Controller');
/**
 * Garantias Controller
 *
 * @property Garantia $Garantia
 * @property PaginatorComponent $Paginator
 */
class GarantiasController extends AppController {

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
		$this->Garantia->recursive = 0;
		$this->set('garantias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Garantia->exists($id)) {
			throw new NotFoundException(__('Invalid garantia'));
		}
		$options = array('conditions' => array('Garantia.' . $this->Garantia->primaryKey => $id));
		$this->set('garantia', $this->Garantia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Garantia->create();
			if ($this->Garantia->save($this->request->data)) {
				$this->Session->setFlash(__('The garantia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The garantia could not be saved. Please, try again.'));
			}
		}
		$tipogarantias = $this->Garantia->Tipogarantium->find('list');
		$prestamos = $this->Garantia->Prestamo->find('list');
		$this->set(compact('tipogarantias', 'prestamos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Garantia->exists($id)) {
			throw new NotFoundException(__('Invalid garantia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Garantia->save($this->request->data)) {
				$this->Session->setFlash(__('The garantia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The garantia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Garantia.' . $this->Garantia->primaryKey => $id));
			$this->request->data = $this->Garantia->find('first', $options);
		}
		$tipogarantias = $this->Garantia->Tipogarantium->find('list');
		$prestamos = $this->Garantia->Prestamo->find('list');
		$this->set(compact('tipogarantias', 'prestamos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Garantia->id = $id;
		if (!$this->Garantia->exists()) {
			throw new NotFoundException(__('Invalid garantia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Garantia->delete()) {
			$this->Session->setFlash(__('The garantia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The garantia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
