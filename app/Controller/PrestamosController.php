<?php
App::uses('AppController', 'Controller');
/**
 * Prestamos Controller
 *
 * @property Prestamo $Prestamo
 * @property PaginatorComponent $Paginator
 */
class PrestamosController extends AppController {

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
		$this->Prestamo->recursive = 0;
		$this->set('prestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prestamo->exists($id)) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		$options = array('conditions' => array('Prestamo.' . $this->Prestamo->primaryKey => $id));
		$this->set('prestamo', $this->Prestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prestamo->create();
			if ($this->Prestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The prestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestamo could not be saved. Please, try again.'));
			}
		}
		$clientes = $this->Prestamo->Cliente->find('list');
		$interesprestamos = $this->Prestamo->Interesprestamo->find('list');
		$prestamos = $this->Prestamo->Prestamo->find('list');
		$users = $this->Prestamo->User->find('list');
		$this->set(compact('clientes', 'interesprestamos', 'prestamos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Prestamo->exists($id)) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The prestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prestamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Prestamo.' . $this->Prestamo->primaryKey => $id));
			$this->request->data = $this->Prestamo->find('first', $options);
		}
		$clientes = $this->Prestamo->Cliente->find('list');
		$interesprestamos = $this->Prestamo->Interesprestamo->find('list');
		$prestamos = $this->Prestamo->Prestamo->find('list');
		$users = $this->Prestamo->User->find('list');
		$this->set(compact('clientes', 'interesprestamos', 'prestamos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prestamo->id = $id;
		if (!$this->Prestamo->exists()) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prestamo->delete()) {
			$this->Session->setFlash(__('The prestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
