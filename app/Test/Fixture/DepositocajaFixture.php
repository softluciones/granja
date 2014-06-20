<?php
/**
 * DepositocajaFixture
 *
 */
class DepositocajaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'depositocaja';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'monto' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '12,2'),
		'cierrecaja_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cuentaspropia_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'nroplanilla' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_depositocaja_cierrecaja1_idx' => array('column' => 'cierrecaja_id', 'unique' => 0),
			'fk_depositocaja_cuentaspropias1_idx' => array('column' => 'cuentaspropia_id', 'unique' => 0)
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
			'monto' => 1,
			'cierrecaja_id' => 1,
			'cuentaspropia_id' => 1,
			'nroplanilla' => 'Lorem ipsum dolor sit amet'
		),
	);

}
