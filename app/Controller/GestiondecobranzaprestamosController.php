<?php
App::uses('AppController', 'Controller');
/**
 * Gestiondecobranzaprestamos Controller
 *
 * @property Gestiondecobranzaprestamo $Gestiondecobranzaprestamo
 * @property PaginatorComponent $Paginator
 */
class GestiondecobranzaprestamosController extends AppController {

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
		$this->Gestiondecobranzaprestamo->recursive = 0;
		$this->set('gestiondecobranzaprestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Gestiondecobranzaprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid gestiondecobranzaprestamo'));
		}
		$options = array('conditions' => array('Gestiondecobranzaprestamo.' . $this->Gestiondecobranzaprestamo->primaryKey => $id));
		$this->set('gestiondecobranzaprestamo', $this->Gestiondecobranzaprestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gestiondecobranzaprestamo->create();
			if ($this->Gestiondecobranzaprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The gestiondecobranzaprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gestiondecobranzaprestamo could not be saved. Please, try again.'));
			}
		}
		$prestamos = $this->Gestiondecobranzaprestamo->Prestamo->find('list');
		$this->set(compact('prestamos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Gestiondecobranzaprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid gestiondecobranzaprestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gestiondecobranzaprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The gestiondecobranzaprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gestiondecobranzaprestamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gestiondecobranzaprestamo.' . $this->Gestiondecobranzaprestamo->primaryKey => $id));
			$this->request->data = $this->Gestiondecobranzaprestamo->find('first', $options);
		}
		$prestamos = $this->Gestiondecobranzaprestamo->Prestamo->find('list');
		$this->set(compact('prestamos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Gestiondecobranzaprestamo->id = $id;
		if (!$this->Gestiondecobranzaprestamo->exists()) {
			throw new NotFoundException(__('Invalid gestiondecobranzaprestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gestiondecobranzaprestamo->delete()) {
			$this->Session->setFlash(__('The gestiondecobranzaprestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gestiondecobranzaprestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
