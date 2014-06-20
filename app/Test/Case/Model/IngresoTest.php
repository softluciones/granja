<?php
App::uses('Ingreso', 'Model');

/**
 * Ingreso Test Case
 *
 */
class IngresoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingreso',
		'app.tipoingreso',
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
		'app.depositocaja',
		'app.gasto',
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
		$this->Ingreso = ClassRegistry::init('Ingreso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingreso);

		parent::tearDown();
	}

}
