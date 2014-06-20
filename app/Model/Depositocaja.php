<?php
App::uses('AppModel', 'Model');
/**
 * Depositocaja Model
 *
 * @property Cierrecaja $Cierrecaja
 * @property Cuentaspropia $Cuentaspropia
 */
class Depositocaja extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'depositocaja';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
