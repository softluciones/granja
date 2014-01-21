<?php
App::uses('Role', 'Model');

/**
 * Role Test Case
 *
 */
class RoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role',
		'app.user',
		'app.banco',
		'app.cheque',
		'app.cliente',
		'app.cuenta',
		'app.pagotercero',
		'app.cliente1',
		'app.pago',
		'app.chequeinterese',
		'app.interese',
		'app.cheque_estadocheque',
		'app.estadocheque',
		'app.tipopago',
		'app.gestiondecobranza'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Role = ClassRegistry::init('Role');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Role);

		parent::tearDown();
	}

}
