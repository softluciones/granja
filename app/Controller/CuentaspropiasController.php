<?php
App::uses('AppController', 'Controller');
/**
 * Cuentaspropias Controller
 *
 * @property Cuentaspropia $Cuentaspropia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CuentaspropiasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
     
/**
 * index method
 *
 * @return void
 */
        
        public function getcuentas(){
             $this->layout='ajax';
           
                      $idbanco = $this->params['pass'][0];
                      $monto = $this->params['pass'][1];
                      $cuenta = $this->Cuentaspropia->find('list',array(
                       'fields' => array('Cuentaspropia.montos'), 
                       'conditions'=>array('AND'=>
                           array('Cuentaspropia.banco_id'=>$idbanco),
                           array('Cuentaspropia.montoencuenta >='=>$monto))));
                                       
                     
                     
                    $this->set(compact('cuenta')); 
        }
	public function index() {
		$this->Cuentaspropia->recursive = 0;
		$this->set('cuentaspropias', $this->Paginator->paginate());
	}
        
        
       

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cuentaspropia->exists($id)) {
			throw new NotFoundException(__('Invalid cuentaspropia'));
		}
		$options = array('conditions' => array('Cuentaspropia.' . $this->Cuentaspropia->primaryKey => $id));
		$this->set('cuentaspropia', $this->Cuentaspropia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cuentaspropia->create();
                        $this->request->data['Cuentaspropia']['nrocuenta']=$this->request->data['numerodecuenta'];
                       
			if ($this->Cuentaspropia->save($this->request->data)) {
				$this->Session->setFlash(__('Su cuenta ha sido registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuentaspropia could not be saved. Please, try again.'));
			}
		}
		$bancos = $this->Cuentaspropia->Banco->find('list');
		$this->set(compact('bancos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cuentaspropia->exists($id)) {
			throw new NotFoundException(__('Invalid cuentaspropia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cuentaspropia->save($this->request->data)) {
				$this->Session->setFlash(__('The cuentaspropia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuentaspropia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cuentaspropia.' . $this->Cuentaspropia->primaryKey => $id));
			$this->request->data = $this->Cuentaspropia->find('first', $options);
		}
		$bancos = $this->Cuentaspropia->Banco->find('list');
		$this->set(compact('bancos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cuentaspropia->id = $id;
		if (!$this->Cuentaspropia->exists()) {
			throw new NotFoundException(__('Invalid cuentaspropia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cuentaspropia->delete()) {
			$this->Session->setFlash(__('The cuentaspropia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cuentaspropia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
