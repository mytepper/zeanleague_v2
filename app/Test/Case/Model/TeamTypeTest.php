<?php
App::uses('TeamType', 'Model');

/**
 * TeamType Test Case
 */
class TeamTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.team_type',
		'app.team',
		'app.compettions_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeamType = ClassRegistry::init('TeamType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeamType);

		parent::tearDown();
	}

}
