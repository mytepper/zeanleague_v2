<?php
App::uses('TeamsCompettitionsController', 'Controller');

/**
 * TeamsCompettitionsController Test Case
 */
class TeamsCompettitionsControllerTest extends ControllerTestCase {

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

}
