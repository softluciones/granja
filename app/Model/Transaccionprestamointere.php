<?php
App::uses('AppModel', 'Model');
/**
 * Transaccionprestamointere Model
 *
 * @property Prestamo $Prestamo
 * @property Pagodeprestamo $Pagodeprestamo
 */
class Transaccionprestamointere extends AppModel {

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
		'prestamo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'montointeres' => array(
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
		'Prestamo' => array(
			'className' => 'Prestamo',
			'foreignKey' => 'prestamo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pagodeprestamo' => array(
			'className' => 'Pagodeprestamo',
			'foreignKey' => 'pagodeprestamo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
