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
                                $cheq=$this->params['pass'][0];
                                $montos=$this->params['pass'][4];
                                $sql="SELECT * FROM chequeinterese where cheque_id=".$id." and (estadocheque=2 or estadocheque=0)";
                                $chequeintereses=  $this->Pago->query($sql);
                                $sql="SELECT * FROM intereses";
                                $intereses=$this->Pago->query($sql);
                                $sql="SELECT * FROM cheques WHERE id=".$id;
                                $cheque=  $this->Pago->query($sql);
                                if($chequeintereses!=NULL){
                                    $monto=$montos;
                                    $montopago=$this->request->data['Pago']['monto'];
                                    $totalpago=$monto-$montopago;
                                    $sql="SELECT * FROM estadocheques where nomenclatura='AbnCG'";
                                    $estado=  $this->Pago->query($sql);
                                    if($totalpago<=0){
                                        if($totalpago==0){
                                            $sql3="INSERT INTO chequeinterese (montocheque,
                                                                                montodescuentointeres,
                                                                                montoentregado,
                                                                                estadocheque,
                                                                                cheque_id,
                                                                                user_id) 
                                                                VALUES(".$totalpago.",
                                                                       0,
                                                                       0,
                                                                       2,
                                                                       ".$cheq.",
                                                                       ".$this->Auth->user('id').")";
                                            
                                            $c=  $this->Pago->query($sql3);
                                            
                                            $sql="UPDATE cheques SET DEUDA=1,modified=now(),cobrado=2 WHERE id=".$cheq;
                                            $insertcheque=  $this->Pago->query($sql);
                                            
                                            $sql="SELECT * FROM estadocheques where nomenclatura='AbnCG'";
                                            $estado=  $this->Pago->query($sql);
                                            
                                            $sql="INSERT INTO cheque_estadocheques(created,
                                                                                    modified,
                                                                                    cheque_id,
                                                                                    estadocheque_id,
                                                                                    user_id)
                                                                                    
                                                                            VALUES(now(),
                                                                                   now(),
                                                                                   ".$cheq.",
                                                                                   ".$estado[0]['estadocheques']['id'].",
                                                                                   ".$this->Auth->user('id').")";
                                            $this->Pago->query($sql);
                                            
                                            $sql="INSERT INTO solointereses(monto,
                                                                            montointereses,
                                                                            cheque_id,
                                                                            interese_id,
                                                                            estado,
                                                                            cobrado,
                                                                            fecha)
                                                                     VALUES(".$totalpago.",
                                                                             0,
                                                                             ".$cheq.",
                                                                             ".$cheque[0]['cheques']['interese_id'].",
                                                                             '".$estado[0]['estadocheques']['nomenclatura']."',
                                                                             2,
                                                                             now())";
                                            $this->Pago->query($sql);
                                            
                                        }else{
                                            $sql="INSERT INTO cheque_estadocheques(created,
                                                                                    modified,
                                                                                    cheque_id,
                                                                                    estadocheque_id,
                                                                                    user_id)
                                                                                    
                                                                                    VALUES(now(),
                                                                                           now(),
                                                                                           ".$cheq.",
                                                                                           ".$estado[0]['estadocheques']['id'].",
                                                                                           ".$this->Auth->user('id').")";
                                                    $this->Pago->query($sql);
                                                    $sql="UPDATE cheques SET DEUDA=1,modified=now(),cobrado=2 WHERE id=".$cheq;
                                                    $insertcheque=  $this->Pago->query($sql);
                                                    
                                                    $sql="INSERT INTO solointereses(monto,
                                                                                    montointereses,
                                                                                    cheque_id,
                                                                                    interese_id,
                                                                                    estado,
                                                                                    cobrado,
                                                                                    fecha)
                                                                             VALUES(".$totalpago.",
                                                                                     0,
                                                                                     ".$cheq.",
                                                                                     ".$cheque[0]['cheques']['interese_id'].",
                                                                                     '".$estado[0]['estadocheques']['nomenclatura']."',
                                                                                     2,
                                                                                     now())";
                                                    $this->Pago->query($sql);
                                                    
                                        }
                                        
                                    }
                                    else{
                                        if($totalpago>0){
                                            /*debug($monto);
                                            debug($montopago);
                                            debug($totalpago);*/
                                            $ban=0;
                                            for($i=0;$i<count($intereses)&&$ban==0;$i++){
                                                if($totalpago>=$intereses[$i]['intereses']['minimo']&&$totalpago<=$intereses[$i]['intereses']['maximo']){
                                                    //debug("intervalos papas");
                                                    $interes=$intereses[$i]['intereses']['montofijo'];
                                                    $ban=1;
                                                }
                                                if($ban==1){
                                                    $sql3="INSERT INTO chequeinterese (montocheque,
                                                                                montodescuentointeres,
                                                                                montoentregado,
                                                                                estadocheque,
                                                                                cheque_id,
                                                                                user_id) 
                                                                VALUES(".$totalpago.",
                                                                       ".$interes.",
                                                                       0,
                                                                       2,
                                                                       ".$cheq.",
                                                                       ".$this->Auth->user('id').")";
                                            
                                                    $c=  $this->Pago->query($sql3);
                                                    
                                                    $sql="UPDATE cheques SET DEUDA=1,modified=now(),cobrado=2 WHERE id=".$cheq;
                                                    $insertcheque=  $this->Pago->query($sql);
                                                    
                                                    $sql="SELECT * FROM estadocheques where nomenclatura='AbnCG'";
                                                    $estado=  $this->Pago->query($sql);

                                                    $sql="INSERT INTO cheque_estadocheques(created,
                                                                                            modified,
                                                                                            cheque_id,
                                                                                            estadocheque_id,
                                                                                            user_id)

                                                                                    VALUES(now(),
                                                                                           now(),
                                                                                           ".$cheq.",
                                                                                           ".$estado[0]['estadocheques']['id'].",
                                                                                           ".$this->Auth->user('id').")";
                                                    $this->Pago->query($sql);
                                                        $sql="INSERT INTO solointereses(monto,
                                                                            montointereses,
                                                                            cheque_id,
                                                                            interese_id,
                                                                            estado,
                                                                            cobrado,
                                                                            fecha)
                                                                     VALUES(".$totalpago.",
                                                                             ".$interes.",
                                                                             ".$cheq.",
                                                                             ".$intereses[$i]['intereses']['id'].",
                                                                             '".$estado[0]['estadocheques']['nomenclatura']."',
                                                                             2,
                                                                             now())";
                                                        $this->Pago->query($sql);
                                                }
                                            }
                                            if($ban==0){
                                                for($i=0;$i<count($intereses)&&$ban==0;$i++){
                                                    if($cheque[0]['cheques']['interese_id']==$intereses[$i]['intereses']['id']){
                                                        if($intereses[$i]['intereses']['porcentaje']!=null){
                                                            $interes=round($totalpago*($intereses[$i]['intereses']['porcentaje']/100));
                                                            if($interes%2!=0)
                                                                $interes++;
                                                            $ban=2;
                                                        }
                                                        if($ban==2){
                                                            $sql3="INSERT INTO chequeinterese (montocheque,
                                                                                                montodescuentointeres,
                                                                                                montoentregado,
                                                                                                estadocheque,
                                                                                                cheque_id,
                                                                                                user_id) 
                                                                                VALUES(".$totalpago.",
                                                                                       ".$interes.",
                                                                                       0,
                                                                                       2,
                                                                                       ".$cheq.",
                                                                                       ".$this->Auth->user('id').")";

                                                                    $c=  $this->Pago->query($sql3);

                                                                    $sql="SELECT * FROM estadocheques where nomenclatura='AbnCG'";
                                                                    $estado=  $this->Pago->query($sql);
                                                                    
                                                                    $sql="UPDATE cheques SET DEUDA=1,modified=now(),cobrado=2 WHERE id=".$cheq;
                                                                    $insertcheque=  $this->Pago->query($sql);

                                                                    $sql="INSERT INTO cheque_estadocheques(created,
                                                                                                            modified,
                                                                                                            cheque_id,
                                                                                                            estadocheque_id,
                                                                                                            user_id)

                                                                                                    VALUES(now(),
                                                                                                           now(),
                                                                                                           ".$cheq.",
                                                                                                           ".$estado[0]['estadocheques']['id'].",
                                                                                                           ".$this->Auth->user('id').")";
                                                                    $this->Pago->query($sql);
                                                                        $sql="INSERT INTO solointereses(monto,
                                                                                            montointereses,
                                                                                            cheque_id,
                                                                                            interese_id,
                                                                                            estado,
                                                                                            cobrado,
                                                                                            fecha)
                                                                                     VALUES(".$totalpago.",
                                                                                             ".$interes.",
                                                                                             ".$cheq.",
                                                                                             ".$intereses[$i]['intereses']['id'].",
                                                                                             '".$estado[0]['estadocheques']['nomenclatura']."',
                                                                                             2,
                                                                                             now())";
                                                                        $this->Pago->query($sql);
                                                        }
                                                    }
                                                }
                                            }
                                            
                                        }
                                    }
                                    
                                }
                                    
                                $this->Session->setFlash(__('El pago ha sido efectuado.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'view',$cheq));
			} else {
				$this->Session->setFlash(__('Algo está mal en esta transaccion revisa de nuevo'));
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
                    $montos=$this->params['pass'][4];
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
		$this->set(compact('debo','otro','clientes', 'chequeinterese', 'cheques', 'chequeEstadocheques', 'tipopagos', 'pagoterceros', 'users','montos'));
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
