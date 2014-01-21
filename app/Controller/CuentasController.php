<?php
App::uses('AppController', 'Controller');
/**
 * Cuentas Controller
 *
 * @property Cuenta $Cuenta
 * @property PaginatorComponent $Paginator
 */
class CuentasController extends AppController {

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
		$this->Cuenta->recursive = 0;
		$this->set('cuentas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $_SESSION['varia']=1;
		if (!$this->Cuenta->exists($id)) {
			throw new NotFoundException(__('Invalid cuenta'));
		}
		$options = array('conditions' => array('Cuenta.' . $this->Cuenta->primaryKey => $id));
		$this->set('cuenta', $this->Cuenta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
            $_SESSION['varia']=1;
		if ($this->request->is('post')) {
			$this->Cuenta->create();
			if ($this->Cuenta->save($this->request->data)) {
				$cliente_ids=  $this->request->data['Cuenta']['cliente_id'];
                                $this->Session->setFlash(__('La cuenta ha sido guardado'));
				return $this->redirect(array('controller'=>'clientes','action' => 'view',$cliente_ids));
                                #return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cuenta no ha sido guardado'));
			}
		}
                $conditions=array('Cliente.id'=>$id);
		$clientes = $this->Cuenta->Cliente->find('list',array('fields'=>array('id','nombres'),
                                                                                    'conditions'=>$conditions));
		$bancos = $this->Cuenta->Banco->find('list');
		#$clientes = $this->Cuenta->Cliente->find('list');
		$users = $this->Cuenta->User->find('list');
                $x=$this->Cuenta->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('bancos', 'clientes', 'users'));
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
		if (!$this->Cuenta->exists($id)) {
			throw new NotFoundException(__('Cuenta invalida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cuenta->save($this->request->data)) {
				$this->Session->setFlash(__('La cuenta ha sido Editada'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La cuenta no ha sido editada, Prueba otra vez y revisa'));
			}
		} else {
			$options = array('conditions' => array('Cuenta.' . $this->Cuenta->primaryKey => $id));
			$this->request->data = $this->Cuenta->find('first', $options);
		}
		$bancos = $this->Cuenta->Banco->find('list');
		$clientes = $this->Cuenta->Cliente->find('list');
		$users = $this->Cuenta->User->find('list');
                $x=$this->Cuenta->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('bancos', 'clientes', 'users'));
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
		$this->Cuenta->id = $id;
		if (!$this->Cuenta->exists()) {
			throw new NotFoundException(__('Cuenta invalida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cuenta->delete()) {
			$this->Session->setFlash(__('La cuenta ha sido eliminada.'));
		} else {
			$this->Session->setFlash(__('La cuenta no ha sido eliminada. Prueba de nuevo y revisa'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
