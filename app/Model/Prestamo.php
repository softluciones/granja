<?php
App::uses('AppModel', 'Model');
/**
 * Prestamo Model
 *
 * @property Cliente $Cliente
 * @property Interesprestamo $Interesprestamo
 * @property Prestamo $Prestamo
 * @property User $User
 * @property Cuota $Cuota
 * @property Garantia $Garantia
 * @property Gestiondecobranzaprestamo $Gestiondecobranzaprestamo
 * @property Prestamo $Prestamo
 * @property Transaccionprestamointere $Transaccionprestamointere
 */
class Prestamo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'prestamo';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cliente_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'monto' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fechainicio' => array(
			'datetime' => array(
				'rule' => array('date'),
				'message' => 'debe ser datos de fecha',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Interesprestamo' => array(
			'className' => 'Interesprestamo',
			'foreignKey' => 'interesprestamo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prestamo1' => array(
			'className' => 'Prestamo',
			'foreignKey' => 'prestamo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'Cuota' => array(
			'className' => 'Cuota',
			'foreignKey' => 'prestamo_id',
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
		'Garantia' => array(
			'className' => 'Garantia',
			'foreignKey' => 'prestamo_id',
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
		'Gestiondecobranzaprestamo' => array(
			'className' => 'Gestiondecobranzaprestamo',
			'foreignKey' => 'prestamo_id',
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
		'Prestamo' => array(
			'className' => 'Prestamo',
			'foreignKey' => 'prestamo_id',
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
		'Transaccionprestamointere' => array(
			'className' => 'Transaccionprestamointere',
			'foreignKey' => 'prestamo_id',
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
