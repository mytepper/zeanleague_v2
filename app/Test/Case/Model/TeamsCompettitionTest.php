<?php
App::uses('TeamsCompettition', 'Model');

/**
 * TeamsCompettition Test Case
 */
class TeamsCompettitionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teams_compettition',
		'app.team_a',
		'app.team_b',
		'app.compettition_type',
		'app.rate',
		'app.predict'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeamsCompettition = ClassRegistry::init('TeamsCompettition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeamsCompettition);

		parent::tearDown();
	}

}
