<?php
App::uses('TeamsCompetition', 'Model');

/**
 * TeamsCompetition Test Case
 */
class TeamsCompetitionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teams_competition',
		'app.team_a',
		'app.team_b',
		'app.competition_type',
		'app.rate',
		'app.teams_compettition',
		'app.predict'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeamsCompetition = ClassRegistry::init('TeamsCompetition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeamsCompetition);

		parent::tearDown();
	}

}
