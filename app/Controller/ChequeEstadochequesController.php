<?php
App::uses('AppController', 'Controller');
/**
 * ChequeEstadocheques Controller
 *
 * @property ChequeEstadocheque $ChequeEstadocheque
 * @property PaginatorComponent $Paginator
 */
class ChequeEstadochequesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $paginate = array(
                'limit' => 10,
                'order' => array(
                'ChequeEstadocheque.created' => 'DESC',
                )
              ); 

/**
 * index method
 *
 * @return void
 */
	public function index() {
             
		$this->ChequeEstadocheque->recursive = 0;
		$this->set('chequeEstadocheques', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                
		if (!$this->ChequeEstadocheque->exists($id)) {
			throw new NotFoundException(__('Cheque estado cheque invalido'));
		}
		$options = array('conditions' => array('ChequeEstadocheque.' . $this->ChequeEstadocheque->primaryKey => $id));
		$this->set('chequeEstadocheque', $this->ChequeEstadocheque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
        private function diferencia($fecha1,$fecha2){
                $format="Y-m-d";
                $datetime1 = new DateTime($fecha1);
                $datetime1=$datetime1->format($format);
                $datetime2 = new DateTime($fecha2);
                $datetime2=$datetime2->format($format);
                $datetime1 = date_create($datetime1);
                $datetime2 = date_create($datetime2);
                $interval = date_diff($datetime1, $datetime2);
                $dias=$interval->format("%R%a");
                $dias=$dias+1;
                return $dias;
         }
         private function chequeinteresesinsert($id){
            $chequedoid=  $this->ChequeEstadocheque->getLastInsertID();
            $cheques=$this->ChequeEstadocheque->Cheque->find('first',array('conditions'=>array('Cheque.id'=>$id)));
            $estado = $cheques['ChequeEstadocheque'][0]['estadocheque_id'];
            $this->request->data['Chequeinterese']['estadocheque']=1;
             $this->request->data['Chequeinterese']['modificado']= $cheques['Cheque']['fecharecibido'];
            $this->request->data['Chequeinterese']['user_id'] = $this->Auth->user('id');
            $this->request->data['Chequeinterese']['cheque_id'] = $id;
       
            $fecharecibido = $cheques['Cheque']['fecharecibido'];
            $fechacobro = $cheques['Cheque']['fechacobro'];
            $dias=$this->diferencia($fecharecibido, $fechacobro);
            $interes = $cheques['Interese']['porcentaje'];
            $fijo = $cheques['Interese']['montofijo'];
            $montocheque = $cheques['Cheque']['monto'];
            if($dias>1){
                if($interes==null){
                     if($estado==1){ 
                    for($i=0;$i<$dias;$i++){
                        $this->request->data['Chequeinterese']['montodescuentointeres']=$fijo;
                        $monto=$montocheque-$fijo;
                        $montocheque=$monto;
                        
                            $this->request->data['Chequeinterese']['montoentregado']=$monto;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                          
                        
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                    
                         $nuevafecha = strtotime ( '+1 day' , strtotime ( $this->request->data['Chequeinterese']['modificado'] ) ) ;
                         $this->request->data['Chequeinterese']['modificado'] = date ( 'Y-m-d' , $nuevafecha );
                    }
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                    }
                    if($estado==2){
                        $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                            $this->request->data['Chequeinterese']['montoentregado']=0;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                              $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                        }
                }else{
                    if($estado==1){
                    $montointeres=$this->request->data['Chequeinterese']['montodescuentointeres']=$montocheque*($interes/100);
                   for($i=0;$i<$dias;$i++){
                       $monto=$montocheque-$montointeres;
                        $montocheque=$monto;
                        
                            $this->request->data['Chequeinterese']['montoentregado']=$monto;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                        
                        
                        $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                       
                         $nuevafecha = strtotime ( '+1 day' , strtotime ( $this->request->data['Chequeinterese']['modificado'] ) ) ;
                         $this->request->data['Chequeinterese']['modificado'] = date ( 'Y-m-d' , $nuevafecha );
                    } 
                     $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                     }
                     if($estado==2){
                            $this->request->data['Chequeinterese']['montoentregado']=0;
                             $this->request->data['Chequeinterese']['montocheque']=0;
                             $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                             $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                            $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
                        }
                }
            }else{
               if($interes==null){
                   $monto=$montocheque-$fijo;
                   $this->request->data['Chequeinterese']['montodescuentointeres']=$fijo;
               }else{
                   $montointeres = $montocheque*($interes/100);
                   $monto = $montocheque-$montointeres;
                   $this->request->data['Chequeinterese']['montodescuentointeres']=$montointeres;
               }
               if($estado==1){
                $this->request->data['Chequeinterese']['montoentregado']=$monto;
                 $this->request->data['Chequeinterese']['montocheque']=0;
              }
                if($estado==2){
                    $this->request->data['Chequeinterese']['montoentregado']=0;
                     $this->request->data['Chequeinterese']['montocheque']=0;
                     $this->request->data['Chequeinterese']['montodescuentointeres']=0;
                }
                $this->ChequeEstadocheque->Cheque->Chequeinterese->create();
                $this->ChequeEstadocheque->Cheque->Chequeinterese->save($this->request->data);
            }
            
            
        }
	public function add($id=null) {
               $id=$this->params['pass'][0];
		if ($this->request->is('post')) {
                 
			$this->ChequeEstadocheque->create();
			if ($this->ChequeEstadocheque->save($this->request->data)) {
                                
                                   $this->chequeinteresesinsert($id);
                                     $this->Session->setFlash(__('El cheque estado del cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'index'));
                                     
                                   
                                
			} else {
				$this->Session->setFlash(__('El cheque estado del cheque no ha sido guardado. Intentalo de nuevo'));
			}
		}
                $conditions=array('Cheque.id'=>$id);
		$cheques = $this->ChequeEstadocheque->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                    'conditions'=>$conditions));
		$estadocheques = $this->ChequeEstadocheque->Estadocheque->find('list',array('fields'=>array('id','nombresss'),
                                                                                            'conditions'=>array('or'=>array(array('nomenclatura'=>'R'),
                                                                                                                            array('nomenclatura'=>'C')
                                                                                                                           ))));
		$users = $this->ChequeEstadocheque->User->find('list');
                $x=$this->ChequeEstadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'estadocheques', 'users'));
	}
        
        public function add2($id=null) {
             $id1=$this->params['pass'][1];
                $id=$this->params['pass'][0];
		if ($this->request->is('post')) {
			$this->ChequeEstadocheque->create();
			if ($this->ChequeEstadocheque->save($this->request->data)) {
                             $this->chequeinteresesinsert();
				$this->Session->setFlash(__('El cheque estado del cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'view',$id1));
			} else {
				$this->Session->setFlash(__('El cheque estado del cheque no ha sido guardado. Intentalo de nuevo'));
			}
		}
                $conditions=array('Cheque.id'=>$id);
		$cheques = $this->ChequeEstadocheque->Cheque->find('list',array('fields'=>array('id','numerodecheque'),
                                                                                    'conditions'=>$conditions));
		$estadocheques = $this->ChequeEstadocheque->Estadocheque->find('list',array('fields'=>array('id','nombresss')));
		$users = $this->ChequeEstadocheque->User->find('list');
                $x=$this->ChequeEstadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'estadocheques', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
               $id=$this->params['pass'][0];
               $res=$this->params['pass'][1];
            $this->ChequeEstadocheque->recursive=2;
            
		if (!$this->ChequeEstadocheque->exists($id)) {
			throw new NotFoundException(__('Invalido estado de cheque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChequeEstadocheque->save($this->request->data)) {
                                
                                    $sql="SELECT nomenclatura FROM estadocheques e, cheque_estadocheques c 
                                        WHERE estadocheque_id=e.id
                                        AND cheque_id=".$res." order by c.id desc";
                                        $z=  $this->ChequeEstadocheque->query($sql);
                                    
                                    $sql="SELECT id from solointereses where cheque_id=".$res." order by id desc";
                                    $res=  $this->ChequeEstadocheque->query($sql);
                                    debug($res);
                                    
                                    $sql="UPDATE solointereses SET 
                                            estado='".$z[0]['e']['nomenclatura']."' where id=".$res[0]['solointereses']['id'];
                                    $this->ChequeEstadocheque->query($sql);
                                
                                
				$this->Session->setFlash(__('El estado del cheque estado del cheque ha sido Modificado.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado de cheque estado del cheque no ha sido Modificado. Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('ChequeEstadocheque.' . $this->ChequeEstadocheque->primaryKey => $id));
			$this->request->data = $this->ChequeEstadocheque->find('first', $options);
                    
		}
		$cheques = $this->ChequeEstadocheque->Cheque->find('list');
               
		$estadocheques = $this->ChequeEstadocheque->Estadocheque->find('list');
		$users = $this->ChequeEstadocheque->User->find('list');
                $x=$this->ChequeEstadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'estadocheques', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
               
		$this->ChequeEstadocheque->id = $id;
		if (!$this->ChequeEstadocheque->exists()) {
			throw new NotFoundException(__('Cheque estado del cheque invalida'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->ChequeEstadocheque->delete()) {
			$this->Session->setFlash(__('El cheque estado del cheque ha sido eliminada'));
		} else {
			$this->Session->setFlash(__('El cheque estado del cheque no ha sido eliminada. Intentalo de nuevo y revisa.'));
		}
		return $this->redirect(array('controller' => 'Cheques','action' => 'view',$id));
	}}
