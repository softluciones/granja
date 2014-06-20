<?php
/**
 * IngresoFixture
 *
 */
class IngresoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ingreso';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'monto' => array('type' => 'integer', 'null' => false, 'default' => null),
		'observacion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tipoingreso_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cierrecaja_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'cuentaspropia_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ingreso_tipoingreso1_idx' => array('column' => 'tipoingreso_id', 'unique' => 0),
			'fk_ingreso_cierrecaja1_idx' => array('column' => 'cierrecaja_id', 'unique' => 0),
			'fk_ingreso_cuentaspropias1_idx' => array('column' => 'cuentaspropia_id', 'unique' => 0)
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
			'observacion' => 'Lorem ipsum dolor sit amet',
			'tipoingreso_id' => 1,
			'cierrecaja_id' => 1,
			'cuentaspropia_id' => 1
		),
	);

}
