<?php
App::uses('AppController', 'Controller');
/**
 * Pagos Controller
 *
 * @property Pago $Pago
 * @property PaginatorComponent $Paginator
 */
class PagosController extends AppController {

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
		$this->Pago->recursive = 0;
		$this->set('pagos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
		$this->set('pago', $this->Pago->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Pago->create();
			if ($this->Pago->save($this->request->data)) {
				$cheque_ids=  $this->Pago->getLastInsertID();
                                $x=  $this->Pago->query("select cheque_id from pagos where id=".$cheque_ids);
                                $y=  $this->Pago->query("select cobrado from cheques where id=".$x[0]['pagos']['cheque_id']);
                                $ss="INSERT INTO 
                                    capital ( created, 
                                             modified, montocheque, 
                                             montointeres, montoentregado,
                                             estadocheque,
                                             pago, pagotercero, 
                                             total, motivo, provienede, 
                                             codigo, chequecodigo, 
                                             user_id)
                                             
                                             VALUES(now(),
                                                   now(),
                                                   null,
                                                   null,
                                                   null,
                                                   ".$y[0]['cheques']['cobrado'].",
                                                   ".$this->request->data['Pago']['monto'].",
                                                   null,
                                                   null,
                                                   '".$this->request->data['Pago']['conceptode']."',
                                                   'Pago',
                                                   null,
                                                   ".$cheque_ids.",
                                                   ".$this->Auth->user('id').") ";
                                $revision=  $this->Pago->query($ss);
                                if($revision==null)
                                    $this->Session->setFlash(__('No fué guardado en el capital.'));
                                else
                                    $this->Session->setFlash(__('El cheque guardado. en capital'));  
                                $this->Session->setFlash(__('The pago has been saved.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'view',$x[0]['pagos']['cheque_id']));
			} else {
				$this->Session->setFlash(__('The pago could not be saved. Please, try again.'));
			}
		}
		
		$chequeinterese = $this->Pago->Chequeinterese->find('list');
		if($id==null){
                    return $this->redirect(array('controller'=>'cheques','action' => 'index'));
                    $clientes = $this->Pago->Cliente->find('list');
                    $cheques = $this->Pago->Cheque->find('list');
                }else{
                    $cheq=$this->params['pass'][0];
                    $otro=$this->params['pass'][1];
                    $debo=$this->params['pass'][2];
                    $clie=$this->params['pass'][3];
                    #$monto= $this->params['pass'][2];
                    
                    $conditions=array('Cliente.id'=>$clie);
         	    $clientes = $this->Pago->Cliente->find('list',array('fields'=>array('id','nombres'),
                                                                                    'conditions'=>$conditions));
                    $conditions=array('Cheque.id'=>$cheq);
         	    $cheques = $this->Pago->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                    'conditions'=>$conditions));
                   
                }
		$chequeEstadocheques = $this->Pago->ChequeEstadocheque->find('list');
		$tipopagos = $this->Pago->Tipopago->find('list');
		$pagoterceros = $this->Pago->Pagotercero->find('list');
		$users = $this->Pago->User->find('list');
                $x=$this->Pago->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('debo','otro','clientes', 'chequeinterese', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pago->exists($id)) {
			throw new NotFoundException(__('Invalid pago'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pago->save($this->request->data)) {
				$this->Session->setFlash(__('The pago has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pago could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pago.' . $this->Pago->primaryKey => $id));
			$this->request->data = $this->Pago->find('first', $options);
		}
		$clientes = $this->Pago->Cliente->find('list');
		$chequeinterese = $this->Pago->Chequeinterese->find('list');
		$cheques = $this->Pago->Cheque->find('list');
		$chequeEstadocheques = $this->Pago->ChequeEstadocheque->find('list');
		$tipopagos = $this->Pago->Tipopago->find('list');
		$pagoterceros = $this->Pago->Pagotercero->find('list');
		$users = $this->Pago->User->find('list');
                $x=$this->Cliente->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('clientes', 'chequeinterese', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pago->id = $id;
		if (!$this->Pago->exists()) {
			throw new NotFoundException(__('Invalid pago'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pago->delete()) {
			$this->Session->setFlash(__('The pago has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pago could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
