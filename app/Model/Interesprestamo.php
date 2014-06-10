<?php
App::uses('AppModel', 'Model');
/**
 * Interesprestamo Model
 *
 * @property Prestamo $Prestamo
 */
class Interesprestamo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'interesprestamo';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	public $virtualFields = array(
		'Valor'=>'if(tipoprestamo=1,concat(valor,"% Pago Diario"),concat(valor,"% Pago fijo"))'
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Prestamo' => array(
			'className' => 'Prestamo',
			'foreignKey' => 'interesprestamo_id',
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
