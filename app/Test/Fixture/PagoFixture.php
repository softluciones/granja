<?php
/**
 * PagoFixture
 *
 */
class PagoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		' modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'monto' => array('type' => 'integer', 'null' => false, 'default' => null),
		'conceptode' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'edodeuda' => array('type' => 'integer', 'null' => true, 'default' => null),
		'pagointerese_deuda' => array('type' => 'integer', 'null' => true, 'default' => null),
		'chequeinterese_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'cheque_estadocheque_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'tipopago_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'pagotercero_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_pago_chequeinterese1_idx' => array('column' => 'chequeinterese_id', 'unique' => 0),
			'fk_pago_cheque_estadocheque1_idx' => array('column' => 'cheque_estadocheque_id', 'unique' => 0),
			'fk_pago_tipopago1_idx' => array('column' => 'tipopago_id', 'unique' => 0),
			'fk_pago_pagotercero1_idx' => array('column' => 'pagotercero_id', 'unique' => 0),
			'fk_pago_user1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'created' => '2013-11-13 12:48:11',
			' modified' => '2013-11-13 12:48:11',
			'monto' => 1,
			'conceptode' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'edodeuda' => 1,
			'pagointerese_deuda' => 1,
			'chequeinterese_id' => 1,
			'cheque_estadocheque_id' => 1,
			'tipopago_id' => 1,
			'pagotercero_id' => 1,
			'user_id' => 1
		),
	);

}
