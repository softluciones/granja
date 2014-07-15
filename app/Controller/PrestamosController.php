<?php
App::uses('AppController', 'Controller');
/**
 * Prestamos Controller
 *
 * @property Prestamo $Prestamo
 * @property PaginatorComponent $Paginator
 */
class PrestamosController extends AppController {

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
        
        public function sumar($fecha,$numerodecuotas){

            $fecha = date_create($fecha);
            date_add($fecha, date_interval_create_from_date_string($numerodecuotas.' days'));
            $fecha=new DateTime($fecha);
            $fecha=$fecha->format('Y-m-d'); 
            exit(0);
        }
                
        public function refinanciamiento($id){
            /*vamos a calcular las cuotas que debe*, para ello, hacemos una consulta sql a la tabla prestamo*/
            $sql="select *,date_format(now(),'%Y-%m-%d') fecha from prestamo where id=".$id;
            $prestamo=$this->Prestamo->query($sql);
            $prestamo=$prestamo[0];
            #debug($prestamo);
            /*ahora calculamos cuanto nos debe el cliente*/
            $cuotaquedebe=$prestamo['prestamo']['diascalculados']-$prestamo['prestamo']['diaspagados'];
            #debug($cuotaquedebe);
            /*consulto la tabla cuotas para ver cual es su cuota*/
            $sql="select * from cuotas where prestamo_id=".$prestamo['prestamo']['id'];
            $cuotas=  $this->Prestamo->query($sql);
            $cuotas=$cuotas[0];
            $montodeuda=$cuotaquedebe*$cuotas['cuotas']['montocuota'];
            #debug($montodeuda);
            /*ahora calculo los intereses de retrasos*/
            $sql="select * from interesprestamo where id=".$prestamo['prestamo']['interesprestamo_id'];
            $prestamointeres=  $this->Prestamo->query($sql);
            $prestamointeres=$prestamointeres[0];
            $interesderetraso=$montodeuda*($prestamointeres['interesprestamo']['valor']/100);
            /*ahora calculamos la nueva deuda con intereses*/
            $nuevadeuda=$montodeuda+$interesderetraso;
            #debug($nuevadeuda);
            $numerodecuotas=$nuevadeuda/$cuotas['cuotas']['montocuota'];
             #debug($numerodecuotas);
            $fecha=date('Y-m-d');
            #$this->sumar($fecha,$numerodecuotas);
            
            /*nuevo prestamo en insercion*/
            $sql="insert into prestamo (cliente_id, monto, fechainicio, fechafin, montodeuda,interesprestamo_id, diascalculados, diaspagados,user_id) "
                    . "values(".$prestamo['prestamo']['cliente_id'].",".$montodeuda.",'".date('Y-m-d')."',DATE_ADD('".date('Y-m-d')."', INTERVAL ".$numerodecuotas." DAY),$nuevadeuda,".$prestamointeres['interesprestamo']['id'].",".$numerodecuotas.",0,".$this->Auth->user('id').")";
            $this->Prestamo->query($sql);
            
            $sql="select * from prestamo";
            $prestamo=$this->Prestamo->query($sql);
            debug($prestamo);
            $prestamo=$prestamo[$x-1];
            $fechainicio=$prestamo['prestamo']['fechainicio'];
            $fechafin=$prestamo['prestamo']['fechafin'];
            $dias=  $this->diferenciaFechas($fechainicio, $fechafin);
            $this->request->data['Prestamo']['diascalculados']=$dias;
            $this->request->data['Prestamo']['diaspagados']=0;
            
            
            return $this->redirect(array('action' => 'index'));
            
        }
        public function index() {
            #$this->refinanciamiento();
                $this->Prestamo->recursive = 0;
		$this->set('prestamos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($id = null) {
		$this->Prestamo->recursive = 2;
                if (!$this->Prestamo->exists($id)) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		$options = array('conditions' => array('Prestamo.' . $this->Prestamo->primaryKey => $id));
		$this->set('prestamo', $this->Prestamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function busca(){
            $this->layout='ajax';
            $cedula=$this->params['pass'][0];
            $nombre = $this->params['pass'][1];
            $apellido = $this->params['pass'][2];
            if($this->params['pass'][3]!="xxxxxx")
                $apodo = $this->params['pass'][3];
            else
               $apodo=''; 
            if($this->params['pass'][4]!="xxxxxx")
            $negocio = $this->params['pass'][4];
            else
                $negocio='';
            if($this->params['pass'][5]!="xxxxxx")
            $email = $this->params['pass'][5];
            else
                $email='';
            if($this->params['pass'][6]!="xxxxxx")
            $direccion = $this->params['pass'][6];
            else
                $direccion='';
            if($this->params['pass'][7]!="xxxxxx")
            $telefonofijo = $this->params['pass'][7];
            else
               $telefonofijo='';
            
            if($this->params['pass'][8]!="xxxxxx")
            $celular = $this->params['pass'][8];
            else
                $celular='';
            $this->Prestamo->query("INSERT INTO clientes (created, cedula, nombre, apellido, apodo, negocio,email,direccion, telefonofijo,telefonocelular,user_id) 
                                        VALUES (NOW(),'".$cedula."','".$nombre."','".$apellido."', '".$apodo."', '".$negocio."'
                                            , '".$email."','".$direccion."','".$telefonofijo."','".$celular."',".$this->Auth->user('id').")");
           $clientes = $this->Prestamo->Cliente->find('list',array('fields'=>array('id','apodo'),'order'=>array('id DESC')));
           $this->set(compact('clientes'));
        }
         public function buscar(){
            $this->layout='ajax';
            $valor=$this->params['pass'][0];
            $tipoprestamo=$this->params['pass'][1];
            if($this->params['pass'][0]!="xxxxxxx")
                $valor = $this->params['pass'][0];
            else
               $valor=''; 
            if($this->params['pass'][1]!="xxxxxxx")
                $tipoprestamo = $this->params['pass'][1];
            else
               $tipoprestamo=''; 
            
                $this->Prestamo->query("INSERT INTO interesprestamo (valor,tipoprestamo) 
                                        VALUES (".$valor.",".$tipoprestamo.")");

           $interesprestamos = $this->Prestamo->Interesprestamo->find('list',array('fields'=>array('id','valor'),'order'=>array('id DESC')));
                

           $this->set(compact('interesprestamos'));
        }
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
                if($dias==0){
                    $dias++;
                }        
                return $dias;
        }
        public function montodeuda($valor,$porcentaje){
            $montodeuda=($valor*($porcentaje['valor']/100))+$valor;
            return $montodeuda;
        }
        public function interesesprestamo($porcentaje){
            $x="select * from interesprestamo where id=".$porcentaje;
            $veamos=$this->Prestamo->query($x);
            return $veamos[0]['interesprestamo'];
        }
        public function cuotas($prestamo_id,$dias,$monto,$f1,$f2){
            $montocuotas=($monto/$dias);
            $sql="insert into cuotas (fechaini,fechafin,nrocuotas,montocuota,prestamo_id) values('".$f1."','".$f2."',".$dias.",".$montocuotas.",".$prestamo_id.")";
            $this->Prestamo->query($sql);
        }
        public function formatofecha($fecha){
            $fecha=new DateTime($fecha);
            $fecha=$fecha->format('Y-m-d');
            return $fecha;
            
        }
        public function formatofechan($fecha){
            $fecha=new DateTime($fecha);
            $fecha=$fecha->format('d-m-Y');
            return $fecha;
            
        }
        public function transaccion($prestamo_id,$montointeres,$montodeuda){
            $sql="insert into transaccionprestamointeres(prestamo_id,montointeres,fecha,montodeuda) values(".$prestamo_id.",".$montointeres.",now(),".$montodeuda.")";
            $this->Prestamo->query($sql);
        }

        public function add() {
		if ($this->request->is('post')) {
			
                        $this->Prestamo->create();
                        /*modificando forma y formato de insertar la fecha*/
                        $fechainicio=$this->request->data['Prestamo']['fechainicio'];
                        $fechafin=$this->request->data['Prestamo']['fechafin'];
                        $fechainicio=$this->formatofecha($fechainicio);
                        $fechafin=$this->formatofecha($fechafin);
                        
                        $this->request->data['Prestamo']['fechainicio']=$fechainicio;
                        $this->request->data['Prestamo']['fechafin']=$fechafin;
                        /*colocando el monto de la deuda*/
                        $dias=  $this->diferenciaFechas($fechainicio, $fechafin);
                        if($dias>30&&$dias<32){
                            $x[0]=$fechafin[8];
                            $x[1]=$fechafin[9];
                            if($x[1]==0){
                                $x[1]=9;
                                $x[0]=$x[0]-1;
                                $fechafin[8]=$x[0];
                                $fechafin[9]=$x[1];
                            }else{
                                $x[1]=$x[1]-1;
                                $fechafin[9]=$x[1];
                            }
                            $dias=$this->diferenciaFechas($fechainicio, $fechafin);
                        }
                        $this->request->data['Prestamo']['fechafin']=$fechafin;
                        $this->request->data['Prestamo']['diascalculados']=$dias;
                        $this->request->data['Prestamo']['diaspagados']=0;
                        /*porcentaje*/
                        $porcen=$this->interesesprestamo($this->request->data['Prestamo']['interesprestamo_id']);
                        $ver=$this->montodeuda($this->request->data['Prestamo']['monto'],$porcen);
                        $this->request->data['Prestamo']['montodeuda']=$ver;
                        /*agregando campo en la tabla cuotas*/
			if ($this->Prestamo->save($this->request->data)) {
                                $prestamo_id=$this->Prestamo->getLastInsertID();
                                $this->cuotas($prestamo_id, $dias, $ver,$fechainicio,$fechafin);
                                $this->transaccion($prestamo_id, 0, $ver);
				$this->Session->setFlash(__('El prestamo ha sido Guardado con éxito'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El prestamo no ha sido Guardado con éxito. Revisa de nuevo a ver que falta'));
			}
		}
		$clientes = $this->Prestamo->Cliente->find('list');

		$interesprestamos = $this->Prestamo->Interesprestamo->find('list',array('fields'=>array('id','valor'),'order'=>array('id DESC')));
		$users = $this->Prestamo->User->find('list');
                $x=$this->Prestamo->query("select id, username from users where id=".$this->Auth->user('id')."");
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('clientes', 'interesprestamos', 'users'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function cuotasmodificar($prestamo_id,$dias,$monto,$f1,$f2){
            $montocuotas=($monto/$dias);
            /*debug($monto);
            debug($dias);
            debug($montocuotas);
            exit(0);*/
            $sql="update cuotas set fechaini='".$f1."',  fechafin='".$f2."',  nrocuotas=".$dias.",  montocuota=".$montocuotas."  where prestamo_id=".$prestamo_id;
            $this->Prestamo->query($sql);
        }
        public function transaccionmodificar($prestamo_id,$montointeres,$montodeuda,$fecha){
            $sql="update  transaccionprestamointeres set montointeres=".$montointeres.",fecha='".$fecha."',montodeuda=".$montodeuda." where prestamo_id=".$prestamo_id."";
            $this->Prestamo->query($sql);
        }
        public function edit($id = null) {

		if (!$this->Prestamo->exists($id)) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		if ($this->request->is(array('post', 'put'))) {

                        $fechainicio=$this->request->data['Prestamo']['fechainicio'];
                        $fechafin=$this->request->data['Prestamo']['fechafin'];
                        $fechainicio=$this->formatofecha($fechainicio);
                        $fechafin=$this->formatofecha($fechafin);
                        
                        $this->request->data['Prestamo']['fechainicio']=$fechainicio;
                        $this->request->data['Prestamo']['fechafin']=$fechafin;
                        /*colocando el monto de la deuda*/
                        $dias=  $this->diferenciaFechas($fechainicio, $fechafin);
                         $this->request->data['Prestamo']['diascalculados']=$dias;
                         $this->request->data['Prestamo']['diaspagados']=0;
                        
                        $porcen=$this->interesesprestamo($this->request->data['Prestamo']['interesprestamo_id']);
                        $ver=$this->montodeuda($this->request->data['Prestamo']['monto'],$porcen);
                        
                        $this->request->data['Prestamo']['montodeuda']=$ver;
                       # debug($this->request->data); exit(0);
			if ($this->Prestamo->save($this->request->data)) {
				$prestamo_id=$this->request->data['Prestamo']['id'];
                                $this->cuotasmodificar($prestamo_id, $dias, $ver, $fechainicio, $fechafin);
                                debug($ver);
                                $this->transaccionmodificar($prestamo_id, $montointeres=0, $ver,$fechainicio);
                                $this->Session->setFlash(__('El prestamo ha sido modificado.'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El prestamo no ha sido modificado, Intenta de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Prestamo.' . $this->Prestamo->primaryKey => $id));
			$this->request->data = $this->Prestamo->find('first', $options);
		}
		$clientes = $this->Prestamo->Cliente->find('list');

		$interesprestamos = $this->Prestamo->Interesprestamo->find('list',array('fields'=>array('id','valor'),'order'=>array('id asc')));
		$users = $this->Prestamo->User->find('list');
                $sql="select fechainicio,fechafin from prestamo where id=".$id;
                $fechas=  $this->Prestamo->query($sql);
                $fecha2=$fechas[0]['prestamo'];
                $fechainicio=  $this->formatofechan($fecha2['fechainicio']);
                $fechafin = $this->formatofechan($fecha2['fechafin']);
                
                $fecha2="";
                $fecha2=array('fechainicio'=>$fechainicio,'fechafin'=>$fechafin);
                

        $this->set(compact('clientes', 'interesprestamos', 'users','fecha2'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prestamo->id = $id;
		if (!$this->Prestamo->exists()) {
			throw new NotFoundException(__('Invalid prestamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prestamo->delete()) {
			$this->Session->setFlash(__('The prestamo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The prestamo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
