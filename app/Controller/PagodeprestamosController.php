<?php
App::uses('AppController', 'Controller');
/**
 * Pagodeprestamos Controller
 *
 * @property Pagodeprestamo $Pagodeprestamo
 * @property PaginatorComponent $Paginator
 */
class PagodeprestamosController extends AppController {

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
		$this->Pagodeprestamo->recursive = 0;
		$this->set('pagodeprestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagodeprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		$options = array('conditions' => array('Pagodeprestamo.' . $this->Pagodeprestamo->primaryKey => $id));
		$this->set('pagodeprestamo', $this->Pagodeprestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pagodeprestamo->create();
			if ($this->Pagodeprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The pagodeprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagodeprestamo could not be saved. Please, try again.'));
			}
		}
		$cuotas = $this->Pagodeprestamo->Cuota->find('list');
		$tipopagos = $this->Pagodeprestamo->Tipopago->find('list');
		$users = $this->Pagodeprestamo->User->find('list');
		$this->set(compact('cuotas', 'tipopagos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pagodeprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagodeprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The pagodeprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagodeprestamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pagodeprestamo.' . $this->Pagodeprestamo->primaryKey => $id));
			$this->request->data = $this->Pagodeprestamo->find('first', $options);
		}
		$cuotas = $this->Pagodeprestamo->Cuota->find('list');
		$tipopagos = $this->Pagodeprestamo->Tipopago->find('list');
		$users = $this->Pagodeprestamo->User->find('list');
		$this->set(compact('cuotas', 'tipopagos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pagodeprestamo->id = $id;
		if (!$this->Pagodeprestamo->exists()) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagodeprestamo->delete()) {
			$this->Session->setFlash(__('The pagodeprestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pagodeprestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
