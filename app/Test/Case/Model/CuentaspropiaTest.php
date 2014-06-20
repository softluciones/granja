<?php
App::uses('Cuentaspropia', 'Model');

/**
 * Cuentaspropia Test Case
 *
 */
class CuentaspropiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.depositocaja',
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
		$this->Cuentaspropia = ClassRegistry::init('Cuentaspropia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cuentaspropia);

		parent::tearDown();
	}

}
