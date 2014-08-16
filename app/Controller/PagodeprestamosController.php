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
        public function montodeudas($pagodeprestamos_id,$id,$montopagado,$dias,$fecha){
            /*vamos a modificar la tabla prestamo*/
            $sql="select * from prestamo where id=".$id;
            $prestamo=  $this->Pagodeprestamo->query($sql);
            $dif=$prestamo[0]['prestamo']['diascalculados']-($prestamo[0]['prestamo']['diaspagados']+$dias);
            if($dif>0){
                $sql="update prestamo set diaspagados=".($prestamo[0]['prestamo']['diaspagados']+$dias).", montodeuda=".($prestamo[0]['prestamo']['montodeuda']-$montopagado)." where id=".$id;
                $this->Pagodeprestamo->query($sql);
            }  else {
                if($dif<0){
                    $this->Session->setFlash(__('no puedes pagar mas intereses de lo que le queda, revisa de nuevo'));
                    return $this->redirect(array('action' => 'index'));
                }else{
                    if($dif==0){
                        $sql="update prestamo set diaspagados=".($prestamo[0]['prestamo']['diaspagados']+$dias).", montodeuda=".($prestamo[0]['prestamo']['montodeuda']-$montopagado)." where id=".$id;
                        $this->Pagodeprestamo->query($sql);
                        
                    }
                }
            }
            /*ahora modificamos las transacciones*/
            $sql="insert into transaccionprestamointeres (prestamo_id, fecha, montodeuda, pagodeprestamo_id) values(".$id.",'".$fecha."',".($prestamo[0]['prestamo']['montodeuda']-$montopagado).",".$pagodeprestamos_id.")";
            $this->Pagodeprestamo->query($sql);
            $this->Session->setFlash(__('El pago de prestamo ha sido Guardado'));
            return $this->redirect(array('action' => 'index'));
        }
        public function pagodiario($pagodeprestamos_id,$id,$montopagado,$dias){
            /*hacemos una consulta en la tabla prestamo*/
            $sql="select * from prestamo where id=".$id;
            $prestamo=  $this->Pagodeprestamo->query($sql);
            
            $sql="select * from cuotas where prestamo_id=".$id;
            $cuota=  $this->Pagodeprestamo->query($sql);
            $totale=count($cuota);
            $cuota=$cuota[$totale-1]['cuotas'];
            $sql="select * from interesprestamo where id=".$prestamo[0]['prestamo']['interesprestamo_id'];
            $porcentaje=  $this->Pagodeprestamo->query($sql);
            
            $sql="select * from transaccionprestamointeres where prestamo_id=".$id;
            $transaccion=  $this->Pagodeprestamo->query($sql);
            $total=count($transaccion);
            $montointeres=$transaccion[$total-1]['transaccionprestamointeres']['montointeres'];
            
            if($montopagado>$montointeres){/*si el montopagado es igual al montoenintereses*/
                //pago y la diferencia que sobra entre lo que pagó el cliente menos los intereses que ha de pagar
                $pagototal=$montopagado-$montointeres;
                echo $pagototal."=".$montopagado."-".$montointeres;
                $montodeuda=$prestamo[0]['prestamo']['montodeuda'];//deuda actual que hay en prestamo
                echo " <br>".$montodeuda;
                $montototal=$montodeuda-$pagototal;//nueva montodeuda
                echo "<br>".$montototal."=".$montodeuda."-".$pagototal;
                $nuevacuota=$montototal*($porcentaje[0]['interesprestamo']['valor']/100);
                echo " <br>".$nuevacuota."=".$montototal."*(".$porcentaje[0]['interesprestamo']['valor']/(100).")";
                
                /*queda por hacer*/
                /*modificar tabla prestamo*/
                $sql="UPDATE prestamo set montodeuda=".$montototal.", diaspagados=".$dias." where id=".$id;
                $this->Pagodeprestamo->query($sql);
                /*nueva insercion en cuotas*/
                $sql="INSERT INTO cuotas (fechaini, fechafin, nrocuotas,montocuota,prestamo_id) VALUES('".date("Y-m-d")."','".$cuota['fechafin']."',".$cuota['nrocuotas'].",".$nuevacuota.",".$id.")";
                $this->Pagodeprestamo->query($sql);
                /*nueva insecion en transacciones*/
                $sql="INSERT INTO transaccionprestamointeres(montointeres, fecha, fechamodificacion,montodeuda,pagodeprestamo_id,prestamo_id) VALUES(0,'".date("Y-m-d")."','".date("Y-m-d")."',".$montototal.",".$pagodeprestamos_id.",".$id.")";
                $this->Pagodeprestamo->query($sql);   
            }
            $this->Session->setFlash(__('El pago de prestamo ha sido Guardado'));
            return $this->redirect(array('action' => 'index'));
        }

        public function add($id=null) {
		$id=$this->params['pass'][0];
                $porcen=$this->params['pass'][1];
                if ($this->request->is('post')) {
			$this->Pagodeprestamo->create();
                        /*formato de la fecha*/
                        if($porcen==1){
                            $fecha=$this->request->data['Pagodeprestamo']['fecha'];
                            $fecha=$this->formatofecha($fecha);
                            $this->request->data['Pagodeprestamo']['fecha']=$fecha;
                            /*lo que queda debiendo*/
                            $montopagado=$this->request->data['Pagodeprestamo']['montopagado'];
                            $dias=$this->request->data['Pagodeprestamo']['diaspagados'];

                            if ($this->Pagodeprestamo->save($this->request->data)) {
                                    $pagodeprestamos_id=  $this->Pagodeprestamo->getLastInsertID();
                                    $this->montodeudas($pagodeprestamos_id,$id,$montopagado,$dias,$fecha);
                            } else {
                                    $this->Session->setFlash(__('El pago del prestamo no ha sido procesado, Revisa de nuevo.'));
                            }
                        }
                        else {
                            $fecha=$this->request->data['Pagodeprestamo']['fecha'];
                            $fecha=$this->formatofecha($fecha);
                            $this->request->data['Pagodeprestamo']['fecha']=$fecha;
                            /*lo que queda debiendo*/
                            $montopagado=$this->request->data['Pagodeprestamo']['montopagado'];
                            $dias=$this->request->data['Pagodeprestamo']['diaspagados'];
                            
                            if ($this->Pagodeprestamo->save($this->request->data)) {
                                    $pagodeprestamos_id=  $this->Pagodeprestamo->getLastInsertID();
                                    $this->pagodiario($pagodeprestamos_id,$id,$montopagado,$dias);
                                    #$this->montodeudas($pagodeprestamos_id,$id,$montopagado,$dias,$fecha);
                            } else {
                                    $this->Session->setFlash(__('El pago del prestamo no ha sido procesado, Revisa de nuevo.'));
                            }
                        }
		}

                
                $conditions=array('Prestamo.id'=>$id);
         	$prestamos = $this->Pagodeprestamo->Prestamo->find('list',array('conditions'=>$conditions,'order'=>array('id DESC')));
		$tipopagos = $this->Pagodeprestamo->Tipopago->find('list');
                
		$users = $this->Pagodeprestamo->User->find('list');
                /*selecciono la fecha de la ultima transacción*/
                $sql="select * from transaccionprestamointeres where prestamo_id=".$id;
                $transacciones=$this->Pagodeprestamo->query($sql);
                $x=count($transacciones);
                if($x!=0)
                $transacciones=$transacciones[$x-1]['transaccionprestamointeres'];
                else{
                    $transacciones=$transacciones[0]['transaccionprestamointeres'];
                }
                $nuevafecha=$transacciones['fecha'];
                $fecha=$hoy=date('Y-m-d');
                /*saco un valor de diferencia de la fecha de transaccion y la fecha de hoy*/
                $valor=  $this->diferenciaFechas($nuevafecha, $hoy);
                /*busco el monto de la cuota diaria que se paga*/
                $sql="select * from cuotas where prestamo_id=".$id;
                $cuotas=  $this->Pagodeprestamo->query($sql);
                $x=count($cuotas);
                if($x!=0)
                $cuotas=$cuotas[$x-1]['cuotas'];
                else{
                    $cuotas=$cuotas[0]['cuotas'];
                }
                
                /*multiplico su monto de cuotas por la diferecia de la fecha de transaccion menos la fecha de hoy*/
                $cuotas=$cuotas['montocuota']*$valor;
                
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
