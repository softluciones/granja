<?php
App::uses('AppModel', 'Model');
/**
 * ChequeEstadocheque Model
 *
 * @property Cheque $Cheque
 * @property Estadocheque $Estadocheque
 * @property User $User
 * @property Pago $Pago
 */
class ChequeEstadocheque extends AppModel {

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
		'Cheque' => array(
			'className' => 'Cheque',
			'foreignKey' => 'cheque_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estadocheque' => array(
			'className' => 'Estadocheque',
			'foreignKey' => 'estadocheque_id',
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
		'Pago' => array(
			'className' => 'Pago',
			'foreignKey' => 'cheque_estadocheque_id',
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
