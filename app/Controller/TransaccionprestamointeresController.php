<?php
App::uses('AppController', 'Controller');
/**
 * Transaccionprestamointeres Controller
 *
 * @property Transaccionprestamointere $Transaccionprestamointere
 * @property PaginatorComponent $Paginator
 */
class TransaccionprestamointeresController extends AppController {

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
		$this->Transaccionprestamointere->recursive = 0;
		$this->set('transaccionprestamointeres', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transaccionprestamointere->exists($id)) {
			throw new NotFoundException(__('Invalid transaccionprestamointere'));
		}
		$options = array('conditions' => array('Transaccionprestamointere.' . $this->Transaccionprestamointere->primaryKey => $id));
		$this->set('transaccionprestamointere', $this->Transaccionprestamointere->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transaccionprestamointere->create();
			if ($this->Transaccionprestamointere->save($this->request->data)) {
				$this->Session->setFlash(__('The transaccionprestamointere has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaccionprestamointere could not be saved. Please, try again.'));
			}
		}
		$prestamos = $this->Transaccionprestamointere->Prestamo->find('list');
		$pagodeprestamos = $this->Transaccionprestamointere->Pagodeprestamo->find('list');
		$this->set(compact('prestamos', 'pagodeprestamos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transaccionprestamointere->exists($id)) {
			throw new NotFoundException(__('Invalid transaccionprestamointere'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transaccionprestamointere->save($this->request->data)) {
				$this->Session->setFlash(__('The transaccionprestamointere has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaccionprestamointere could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transaccionprestamointere.' . $this->Transaccionprestamointere->primaryKey => $id));
			$this->request->data = $this->Transaccionprestamointere->find('first', $options);
		}
		$prestamos = $this->Transaccionprestamointere->Prestamo->find('list');
		$pagodeprestamos = $this->Transaccionprestamointere->Pagodeprestamo->find('list');
		$this->set(compact('prestamos', 'pagodeprestamos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transaccionprestamointere->id = $id;
		if (!$this->Transaccionprestamointere->exists()) {
			throw new NotFoundException(__('Invalid transaccionprestamointere'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Transaccionprestamointere->delete()) {
			$this->Session->setFlash(__('The transaccionprestamointere has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaccionprestamointere could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
