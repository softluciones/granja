<?php
App::uses('AppController', 'Controller');
/**
 * Gestiondecobranzas Controller
 *
 * @property Gestiondecobranza $Gestiondecobranza
 * @property PaginatorComponent $Paginator
 */
class GestiondecobranzasController extends AppController {

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
            
		$this->Gestiondecobranza->recursive = 0;
		$this->set('gestiondecobranzas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
      
		if (!$this->Gestiondecobranza->exists($id)) {
			throw new NotFoundException(__('Gestion de cobranza Invalida'));
		}
		$options = array('conditions' => array('Gestiondecobranza.' . $this->Gestiondecobranza->primaryKey => $id));
		$this->set('gestiondecobranza', $this->Gestiondecobranza->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
           
		if ($this->request->is('post')) {
			$this->Gestiondecobranza->create();
			if ($this->Gestiondecobranza->save($this->request->data)) {
				$cheque_ids=  $this->request->data['Gestiondecobranza']['cheque_id'];
                                
                                $this->Session->setFlash(__('La gestión de cobranza ha sido guardado'));
				return $this->redirect(array('controller'=>'cheques','action' => 'view',$cheque_ids));
			} else {
				$this->Session->setFlash(__('La gestión de cobranza ha sido guardado. Prueba otra vez y revisa'));
			}
		}
                
                
                $conditions=array('Cheque.id'=>$id);
		$cheques = $this->Gestiondecobranza->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                    'conditions'=>$conditions));
		#$cheques = $this->Gestiondecobranza->Cheque->find('list');
		$users = $this->Gestiondecobranza->User->find('list');
                $x=$this->Gestiondecobranza->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'users'));
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
		if (!$this->Gestiondecobranza->exists($id)) {
			throw new NotFoundException(__('Gestion de cobranza'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gestiondecobranza->save($this->request->data)) {
				$this->Session->setFlash(__('La gestion de cobranza ha sido Modificada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La gestion de cobranza no ha sido Modificada. Prueba otra vez y revisa'));
			}
		} else {
			$options = array('conditions' => array('Gestiondecobranza.' . $this->Gestiondecobranza->primaryKey => $id));
			$this->request->data = $this->Gestiondecobranza->find('first', $options);
		}
		$cheques = $this->Gestiondecobranza->Cheque->find('list');
		$users = $this->Gestiondecobranza->User->find('list');
                $x=$this->Gestiondecobranza->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'users'));
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
		$this->Gestiondecobranza->id = $id;
		if (!$this->Gestiondecobranza->exists()) {
			throw new NotFoundException(__('Gestion de cobranza invalido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gestiondecobranza->delete()) {
			$this->Session->setFlash(__('La gestion de cobranza ha sido eliminada.'));
		} else {
			$this->Session->setFlash(__('La gestion de cobranza no ha sido eliminada. Prueba otra vez y revisa'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
