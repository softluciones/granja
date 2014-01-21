<?php
App::uses('AppModel', 'Model');
/**
 * Capital Model
 *
 * @property Cheque $Cheque
 * @property User $User
 */
class Capital extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'capital';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cheque' => array(
			'className' => 'Cheque',
			'foreignKey' => 'cheque_id',
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
}
