<?php
App::uses('AppController', 'Controller');
/**
 * Interesprestamos Controller
 *
 * @property Interesprestamo $Interesprestamo
 * @property PaginatorComponent $Paginator
 */
class InteresprestamosController extends AppController {

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
		$this->Interesprestamo->recursive = 0;
		$this->set('interesprestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Interesprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid interesprestamo'));
		}
		$options = array('conditions' => array('Interesprestamo.' . $this->Interesprestamo->primaryKey => $id));
		$this->set('interesprestamo', $this->Interesprestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Interesprestamo->create();
			if ($this->Interesprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The interesprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interesprestamo could not be saved. Please, try again.'));
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
		if (!$this->Interesprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid interesprestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Interesprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The interesprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interesprestamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Interesprestamo.' . $this->Interesprestamo->primaryKey => $id));
			$this->request->data = $this->Interesprestamo->find('first', $options);
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
		$this->Interesprestamo->id = $id;
		if (!$this->Interesprestamo->exists()) {
			throw new NotFoundException(__('Invalid interesprestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Interesprestamo->delete()) {
			$this->Session->setFlash(__('The interesprestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The interesprestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
