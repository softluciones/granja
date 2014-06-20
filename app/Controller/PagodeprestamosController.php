<?php
App::uses('AppController', 'Controller');
/**
 * Pagodeprestamos Controller
 *
 * @property Pagodeprestamo $Pagodeprestamo
 * @property PaginatorComponent $Paginator
 */
class PagodeprestamosController extends AppController {

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
		$this->Pagodeprestamo->recursive = 0;
		$this->set('pagodeprestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagodeprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		$options = array('conditions' => array('Pagodeprestamo.' . $this->Pagodeprestamo->primaryKey => $id));
		$this->set('pagodeprestamo', $this->Pagodeprestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 * 
 */

        public function diferenciaFechas($fecha1,$fecha2){
                $format="Y-m-d";
                $datetime1 = new DateTime($fecha1);
                $datetime1=$datetime1->format($format);
                $datetime2 = new DateTime($fecha2);
                $datetime2=$datetime2->format($format);
                $datetime1 = date_create($datetime1);
                $datetime2 = date_create($datetime2);
                $interval = date_diff($datetime1, $datetime2);
                $dias=$interval->format("%R%a");
                $dias++;
                $dias--;
                return $dias;
        }
        public function formatofecha($fecha){
            
            $fecha=new DateTime($fecha);
            $fecha=$fecha->format('Y-m-d');
            return $fecha;
            
        }
        public function montodeudas($montopagado,$id,$pago_id,$dias){
            /*busco la deuda actual en la tabla prestamo*/
            $sql="select * from prestamo where id=".$id;
            $prestamo=$this->Pagodeprestamo->query($sql);
            $prestamo=$prestamo[0];
            /*resto la deuda actual, con el monto de cuotas pagados*/
            $montototal=$prestamo['prestamo']['montodeuda']-$montopagado;
            
            /*modifico la tabla prestamo con el nuevo monto que debe*/
            $sql="update prestamo set montodeuda=".$montototal.",diaspagados=".$dias." where id=".$id;
            $this->Pagodeprestamo->query($sql);
            /*hago insercion en el monto nuevo*/
            $sql="insert into transaccionprestamointeres(prestamo_id, montointeres,fecha,montodeuda,pagodeprestamo_id) values(".$id.",".$montopagado.",now(),".$montototal.",".$pago_id.")";
            $this->Pagodeprestamo->query($sql);
            
            /*ahora guardo un nuevo pago en la tabla transaccionprestamointeres con la nueva deuda*/
            
        }
        

        public function add($id=null) {
		if ($this->request->is('post')) {
			$this->Pagodeprestamo->create();
                        /*formato de la fecha*/
                        $fecha=$this->request->data['Pagodeprestamo']['fecha'];
                        $fecha=$this->formatofecha($fecha);
                        $this->request->data['Pagodeprestamo']['fecha']=$fecha;
                        /*lo que queda debiendo*/
                        $montopagado=$this->request->data['Pagodeprestamo']['montopagado'];
                        $dias=$this->request->data['Pagodeprestamo']['diaspagados'];
                        
			if ($this->Pagodeprestamo->save($this->request->data)) {
                                $pagodeprestamos_id=  $this->Pagodeprestamo->getLastInsertID();
                                $this->montodeudas($montopagado, $id, $pagodeprestamos_id,$dias);
				$this->Session->setFlash(__('The pagodeprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagodeprestamo could not be saved. Please, try again.'));
			}
		}
                
                $conditions=array('Prestamo.id'=>$id);
         	$prestamos = $this->Pagodeprestamo->Prestamo->find('list',array('conditions'=>$conditions,'order'=>array('id DESC')));
		$tipopagos = $this->Pagodeprestamo->Tipopago->find('list');
                
		$users = $this->Pagodeprestamo->User->find('list');
                $sql="select fechaini,montocuota  from cuotas where prestamo_id=".$id;
                $cuotas= $this->Pagodeprestamo->query($sql);
                $fecha=date("Y-m-d");
                $valor=$this->diferenciaFechas($cuotas[0]['cuotas']['fechaini'],$fecha);
                $cuotas=$cuotas[0]['cuotas']['montocuota'];
                $cuotas=$cuotas*$valor;
                $x=$this->Pagodeprestamo->query("select id, username from users where id=".$this->Auth->user('id')."");
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		#$prestamos = $this->Pagodeprestamo->Prestamo->find('list');
		$this->set(compact('tipopagos', 'users', 'prestamos','cuotas','fecha','valor'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pagodeprestamo->exists($id)) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagodeprestamo->save($this->request->data)) {
				$this->Session->setFlash(__('The pagodeprestamo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagodeprestamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pagodeprestamo.' . $this->Pagodeprestamo->primaryKey => $id));
			$this->request->data = $this->Pagodeprestamo->find('first', $options);
		}
		$tipopagos = $this->Pagodeprestamo->Tipopago->find('list');
		$users = $this->Pagodeprestamo->User->find('list');
		$prestamos = $this->Pagodeprestamo->Prestamo->find('list');
		$this->set(compact('tipopagos', 'users', 'prestamos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pagodeprestamo->id = $id;
		if (!$this->Pagodeprestamo->exists()) {
			throw new NotFoundException(__('Invalid pagodeprestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagodeprestamo->delete()) {
			$this->Session->setFlash(__('The pagodeprestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pagodeprestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
