<?php
App::uses('AppController', 'Controller');
/**
 * Bancos Controller
 *
 * @property Banco $Banco
 * @property PaginatorComponent $Paginator
 */
class BancosController extends AppController {

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
	$_SESSION['varia']=1;	
            $this->Banco->recursive = 0;
		$this->set('bancos', $this->Paginator->paginate());

                //debug($this->Paginator->paginate());

                //mi prima ciela sssh ss jose



	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
             $this->Banco->recursive = 2;
		if (!$this->Banco->exists($id)) {
			throw new NotFoundException(__('Banco Invalido'));
		}
                $_SESSION['varia']=1;
		$options = array('conditions' => array('Banco.' . $this->Banco->primaryKey => $id));
		$this->set('banco', $this->Banco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	
        public function add() {
	$_SESSION['varia']=1;	
            if ($this->request->is('post')) {
			$this->Banco->create();
                        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Banco->save($this->request->data)) {
				$this->Session->setFlash(__('El Banco ha sido Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Banco no ha sido guardado. Revisa y prueba otra vez.'));
			}
		}
		$users = $this->Banco->User->find('list');
                $x=$this->Banco->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
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
                $_SESSION['varia']=1;
		if (!$this->Banco->exists($id)) {
			throw new NotFoundException(__('Banco Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Banco->save($this->request->data)) {
				$this->Session->setFlash(__('El banco ha sido Modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Banco no ha sido Modificado. Revisa y prueba de nuevo'));
			}
		} else {
			$options = array('conditions' => array('Banco.' . $this->Banco->primaryKey => $id));
			$this->request->data = $this->Banco->find('first', $options);
		}
		$users = $this->Banco->User->find('list');
                $x=$this->Banco->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
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
                $_SESSION['varia']=1;
		$this->Banco->id = $id;
		if (!$this->Banco->exists()) {
			throw new NotFoundException(__('Banco Invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Banco->delete()) {
			$this->Session->setFlash(__('El banco ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('EL Banco no ha sido Guardado. Intenta de nuevo'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
