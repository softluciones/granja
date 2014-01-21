<?php
/**
 * CuentaFixture
 *
 */
class CuentaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'numero' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'banco_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_cuenta_banco1_idx' => array('column' => 'banco_id', 'unique' => 0),
			'fk_cuenta_cliente1_idx' => array('column' => 'cliente_id', 'unique' => 0),
			'fk_cuenta_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'numero' => 'Lorem ipsum dolor sit amet',
			'banco_id' => 1,
			'cliente_id' => 1,
			'user_id' => 1
		),
	);

}
