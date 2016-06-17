<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Session',
		//'Security',
		'Flash',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish',
					'contain' => array(
						'Member'
					),
					'fields' => array('username' => 'email'),
					'scope' => array('confirm' => 1)
				)
			)
		)
	);

/**
 * [setJsonResponse]
 *
 * @param array $array response
 * @return json
 */
	public function setJsonResponse($array) {
		$this->set('json', $array);
		$this->set('_serialize', array('json'));
	}

/**
 * [isAdmin]
 *
 * @return void
 * @throws NotFoundException
 */
	public function isAdmin() {
		$user = $this->Auth->user();
		if ($user['role'] == 1) {
			throw new NotFoundException();
		}
	}
}
