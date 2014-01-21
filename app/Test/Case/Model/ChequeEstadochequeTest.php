<?php
App::uses('ChequeEstadocheque', 'Model');

/**
 * ChequeEstadocheque Test Case
 *
 */
class ChequeEstadochequeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cheque_estadocheque',
		'app.cheque',
		'app.banco',
		'app.user',
		'app.role',
		'app.chequeinterese',
		'app.interese',
		'app.pago',
		'app.tipopago',
		'app.pagotercero',
		'app.cliente',
		'app.cuenta',
		'app.estadocheque',
		'app.gestiondecobranza'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChequeEstadocheque = ClassRegistry::init('ChequeEstadocheque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChequeEstadocheque);

		parent::tearDown();
	}

}
