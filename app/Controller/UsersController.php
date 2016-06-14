<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 */
class UsersController extends AppController {

	public $components = array('RequestHandler', 'Flash', 'Paginator', 'Auth');

/**
 * [beforeFilter]
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register', 'registerSendEmail', 'registerConfirm');
	}

/**
 * [register]
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$saved = $this->User->saveRegister($this->request->data);
			if ($saved) {
				$this->redirect('/users/registerSendEmail');
			}
		}
	}

/**
 * [registerSendEmail if users resgister completed redirect to this page for description for register]
 *
 * @return void
 */
	public function registerSendEmail() {
	}

/**
 * [login]
 *
 * @return void
 */
	public function login() {
	}

/**
 * [logout]
 *
 * @return void
 */
	public function logout() {
	}

/**
 * [registerConfirm]
 *
 * @return void
 * @throws NotFoundException
 */
	public function registerConfirm() {
		$token = $this->request->query['token'];
		$confirm = $this->User->registerConfirm($token);
		if ($confirm['status'] == false) {
			throw new NotFoundException("Invalied token.", 1);
		}
		$this->set(compact('confirm'));
	}
}
