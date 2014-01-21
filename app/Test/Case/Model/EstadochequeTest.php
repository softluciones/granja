<?php
App::uses('Estadocheque', 'Model');

/**
 * Estadocheque Test Case
 *
 */
class EstadochequeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estadocheque',
		'app.user',
		'app.role',
		'app.banco',
		'app.cheque',
		'app.cliente',
		'app.cuenta',
		'app.pagotercero',
		'app.cheque_estadocheque',
		'app.pago',
		'app.chequeinterese',
		'app.interese',
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
		$this->Estadocheque = ClassRegistry::init('Estadocheque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estadocheque);

		parent::tearDown();
	}

}
