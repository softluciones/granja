<?php
App::uses('Cuenta', 'Model');

/**
 * Cuenta Test Case
 *
 */
class CuentaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cuenta',
		'app.banco',
		'app.user',
		'app.role',
		'app.cheque_estadocheque',
		'app.cheque',
		'app.cliente',
		'app.pagotercero',
		'app.cliente1',
		'app.pago',
		'app.chequeinterese',
		'app.interese',
		'app.tipopago',
		'app.gestiondecobranza',
		'app.estadocheque'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cuenta = ClassRegistry::init('Cuenta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cuenta);

		parent::tearDown();
	}

}
