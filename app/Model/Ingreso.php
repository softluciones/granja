<?php
App::uses('AppModel', 'Model');
/**
 * Ingreso Model
 *
 * @property Tipoingreso $Tipoingreso
 * @property Cierrecaja $Cierrecaja
 * @property Cuentaspropia $Cuentaspropia
 */
class Ingreso extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ingreso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tipoingreso' => array(
			'className' => 'Tipoingreso',
			'foreignKey' => 'tipoingreso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cierrecaja' => array(
			'className' => 'Cierrecaja',
			'foreignKey' => 'cierrecaja_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cuentaspropia' => array(
			'className' => 'Cuentaspropia',
			'foreignKey' => 'cuentaspropia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
