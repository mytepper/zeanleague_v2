<?php
App::uses('Predict', 'Model');

/**
 * Predict Test Case
 */
class PredictTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.predict',
		'app.member',
		'app.group',
		'app.user',
		'app.teams_compettition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Predict = ClassRegistry::init('Predict');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Predict);

		parent::tearDown();
	}

}
