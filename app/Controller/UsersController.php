<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
   /*     function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow = array('*');
}*/
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function beforeFilter() {
            parent::beforeFilter();

             $this->Auth->fields = array(
                    'username' => 'username',
                    'password' => 'secretword'
                    );
             $this->Auth->allow('login','logout');
    }
        public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Tu usuario o contraseña es incorrecta.'));
        }
        }
      
        public function logout() {
            $this->redirect($this->Auth->logout());
        }
        public function view($id = null) {
                $this->User->recursive = 2;
                if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if($this->request->data['User']['password']==$this->request->data['User']['clave']){
			$this->User->create();
                        
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El usuario no ha sido Guardado. Intentalo otra vez.'));
			}
                    }else{
                        $this->Session->setFlash(__('Las contraseñas no coinciden.'));
                    }
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->User->query("UPDATE users SET 
                                            username='".$this->request->data['User']['username']."', 
                                            nombre='".$this->request->data['User']['nombre']."', 
                                            apellido='".$this->request->data['User']['apellido']."', 
                                            role_id=".$this->request->data['User']['role_id']." WHERE id=".$id."");
				$this->Session->setFlash(__('El Usuario ha sido Guardado.'));
                                	return $this->redirect(array('action' => 'index'));
			
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles','id'));
	}
        
        public function editpass($id = null) {
		if(!$this->User->exists($id)) 
                {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
               if($this->request->data['User']['password']==$this->request->data['User']['clave']){
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('La clave ha sido Guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La clave no ha sido guardada.'));
			}
		
                }else{
                    $this->Session->setFlash(__('Las contraseñas no coinciden.'));
                }
             } else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
	
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
