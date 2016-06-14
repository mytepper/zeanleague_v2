<?php
App::uses('CompetitionsType', 'Model');

/**
 * CompetitionsType Test Case
 */
class CompetitionsTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.competitions_type',
		'app.team',
		'app.team_type',
		'app.compettions_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompetitionsType = ClassRegistry::init('CompetitionsType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompetitionsType);

		parent::tearDown();
	}

}
