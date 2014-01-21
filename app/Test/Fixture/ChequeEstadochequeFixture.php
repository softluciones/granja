<?php
/**
 * ChequeEstadochequeFixture
 *
 */
class ChequeEstadochequeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'cheque_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'estadocheque_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_cheque_estadocheque_cheque1_idx' => array('column' => 'cheque_id', 'unique' => 0),
			'fk_cheque_estadocheque_estadocheque1_idx' => array('column' => 'estadocheque_id', 'unique' => 0),
			'fk_cheque_estadocheque_user1_idx' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2013-11-13 12:46:14',
			'modified' => '2013-11-13 12:46:14',
			'cheque_id' => 1,
			'estadocheque_id' => 1,
			'user_id' => 1
		),
	);

}
