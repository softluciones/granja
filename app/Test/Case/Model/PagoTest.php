<?php
App::uses('Pago', 'Model');

/**
 * Pago Test Case
 *
 */
class PagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pago',
		'app.chequeinterese',
		'app.interese',
		'app.user',
		'app.role',
		'app.banco',
		'app.cheque',
		'app.cliente',
		'app.cuenta',
		'app.pagotercero',
		'app.cheque_estadocheque',
		'app.estadocheque',
		'app.gestiondecobranza',
		'app.tipopago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pago = ClassRegistry::init('Pago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pago);

		parent::tearDown();
	}

}
