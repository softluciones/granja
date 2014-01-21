<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

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
		$this->Cliente->recursive = 0;
                if($this->data){
                    if ($this->data['Cliente']['search_text']) { 
                        $this->set('clientes',
                        $this->paginate('Cliente',array('or'=>array('Cliente.cedula LIKE'=>'%'.
                        $this->data['Cliente']['search_text'].'%','Cliente.apodo Like'=>'%'.
                        $this->data['Cliente']['search_text'].'%','Cliente.nombre like'=>'%'.
                        $this->data['Cliente']['search_text'].'%','Cliente.apellido like'=>'%'.
                        $this->data['Cliente']['search_text'].'%','Cliente.telefonocelular like'=>'%'.
                        $this->data['Cliente']['search_text'].'%'))));
                    }
                }else
		$this->set('clientes', $this->Paginator->paginate());
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Cheque invalido'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$sql="SELECT CONCAT( c.nombre, CONCAT(  ' ', c.apellido ) ) AS  'nombre', CONCAT( s.nombre, CONCAT(  ' ', s.apellido ) ) AS  'nombre2', ch.numerodecheque AS  'cheque', u.username as 'usuario'
                    FROM clientes c, clientes s, pagoterceros p, cheques ch, users u
                    WHERE c.id = p.cliente_id
                    AND s.id = p.cliente_id1
                    AND c.id =".$id."
                    AND ch.id = p.cheque_id
                    AND p.user_id=u.id";
                $i=0;
                $x=$this->Cliente->query($sql);
                $sql2="SELECT b.nombre as 'banco', u.username as 'usuario' 
                      FROM bancos b, users u, cuentas c,clientes ci
                      WHERE b.id=c.banco_id
                      AND u.id=c.user_id
                      AND ci.id=c.cliente_id
                      AND ci.id=1";
                $y=$this->Cliente->query($sql2);
                $sql3="SELECT b.nombre, 
                        CONCAT( c.nombre, CONCAT(  ' ', c.apellido ) ) AS  'nombre', 
                        u.username AS 'usuario'
                        FROM bancos b, clientes c, cheques ch, users u
                        WHERE c.id =".$id."
                        AND c.id = ch.cliente_id
                        AND b.id = ch.banco_id
                        AND u.id = ch.user_id";
                $w=$this->Cliente->query($sql3);
                $this->set('cliente', $this->Cliente->find('first', $options));
                $this->set(compact('x','i','y','w'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $_SESSION['varia']=1;
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
                                $cliente_ids=  $this->Cliente->getLastInsertID();
				$this->Session->setFlash(__('El cliente ha sido guardado.'));
				return $this->redirect(array('controller'=>'cuentas','action' => 'add',$cliente_ids));
                                #return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cliente no ha sido guardado. Prueba e intenta de nuevo'));
			}
		}
		$users = $this->Cliente->User->find('list');
                $x=$this->Cliente->query("select id, username from users where id=".$this->Auth->user('id')."");
                
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Cliente invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('El cliente ha sido editado'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cliente no ha sido editado. Prueba otra vez e intentalo'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
                        #debug($this->request->data);
		}
		$users = $this->Cliente->User->find('list');
                $x=$this->Cliente->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('users','id'));
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Cliente Invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cliente->delete()) {
			#$this->Session->setFlash(__('The cliente has been deleted.'));
                        $this->Session->setFlash(__('El cliente ha sido borrado.'));
		} else {
			#$this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'));
                        $this->Session->setFlash(__('El cliente no ha sido borrado. Prueba otra vez y revisa.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
