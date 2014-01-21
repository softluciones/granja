<?php
/**
 * ChequeFixture
 *
 */
class ChequeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'banco_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'numerodecuenta' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'numerodecheque' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'monto' => array('type' => 'integer', 'null' => false, 'default' => null),
		'filename' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fecharecibido' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'fechacobro' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'cobrado' => array('type' => 'integer', 'null' => false, 'default' => null),
		'id_cheque' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'numerodecheque_UNIQUE' => array('column' => 'numerodecheque', 'unique' => 1),
			'fk_cheque_banco1_idx' => array('column' => 'banco_id', 'unique' => 0),
			'fk_cheque_cliente1_idx' => array('column' => 'cliente_id', 'unique' => 0),
			'fk_cheque_cheque1_idx' => array('column' => 'id_cheque', 'unique' => 0),
			'fk_cheque_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'banco_id' => 1,
			'cliente_id' => 1,
			'created' => '2013-11-12 14:32:45',
			'numerodecuenta' => 'Lorem ipsum dolor sit amet',
			'numerodecheque' => 'Lorem ipsum dolor sit amet',
			'monto' => 1,
			'filename' => 'Lorem ipsum dolor sit amet',
			'fecharecibido' => '2013-11-12 14:32:45',
			'fechacobro' => '2013-11-12 14:32:45',
			'cobrado' => 1,
			'id_cheque' => 1,
			'user_id' => 1
		),
	);

}
