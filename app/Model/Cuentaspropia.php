<?php
App::uses('AppModel', 'Model');
/**
 * Cuentaspropia Model
 *
 * @property Banco $Banco
 * @property Chequespropio $Chequespropio
 * @property Depositocaja $Depositocaja
 * @property Gasto $Gasto
 * @property Ingreso $Ingreso
 * @property Montocuenta $Montocuenta
 * @property Pago $Pago
 * @property Transaccioncuenta $Transaccioncuenta
 */
class Cuentaspropia extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nrocuenta';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nrocuenta' => array(
			'between' => array(
				'rule' => array('between'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Banco' => array(
			'className' => 'Banco',
			'foreignKey' => 'banco_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Chequespropio' => array(
			'className' => 'Chequespropio',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Depositocaja' => array(
			'className' => 'Depositocaja',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Gasto' => array(
			'className' => 'Gasto',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Ingreso' => array(
			'className' => 'Ingreso',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Montocuenta' => array(
			'className' => 'Montocuenta',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pago' => array(
			'className' => 'Pago',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Transaccioncuenta' => array(
			'className' => 'Transaccioncuenta',
			'foreignKey' => 'cuentaspropia_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
