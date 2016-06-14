<?php
App::uses('MembersController', 'Controller');

/**
 * MembersController Test Case
 */
class MembersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.member',
		'app.line',
		'app.user',
		'app.facebook',
		'app.admin'
	);

}
