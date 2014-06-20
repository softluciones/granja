<?php
App::uses('Depositocaja', 'Model');

/**
 * Depositocaja Test Case
 *
 */
class DepositocajaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.depositocaja',
		'app.cierrecaja',
		'app.cuentaspropia',
		'app.banco',
		'app.user',
		'app.role',
		'app.cheque_estadocheque',
		'app.cheque',
		'app.cliente',
		'app.cuenta',
		'app.pago',
		'app.tipopago',
		'app.pagotercero',
		'app.interese',
		'app.chequeinterese',
		'app.gestiondecobranza',
		'app.estadocheque',
		'app.chequespropio',
		'app.gasto',
		'app.ingreso',
		'app.montocuenta',
		'app.transaccioncuenta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Depositocaja = ClassRegistry::init('Depositocaja');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Depositocaja);

		parent::tearDown();
	}

}
