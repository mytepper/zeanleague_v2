<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * User Model
 *
 * @property Member $Member
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'This field is requied.',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email already registered'
			)
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field is requied.',
			),
			'length' => array(
				'rule' => array('between', 8, 15),
				'message' => 'Your password must be between 8 and 15 characters.',
			)
		),
		'password_confirm' => array(
			'length' => array(
				'rule' => array('between', 8, 15),
				'message' => 'Your password must be between 8 and 15 characters.',
			),
			'compare' => array(
				'rule' => array('matchPasswords'),
				'message' => 'The passwords you entered do not match.',
			)
		)
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id',
		)
	);

/**
 * [matchPasswords]
 *
 * @return bool
 */
	public function matchPasswords() {
		return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm'];
	}

/**
 * [beforeSave]
 *
 * @param array $options = array()
 * @return void
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

/**
 * [saveRegister]
 *
 * @param array $data user register data
 * @return void
 */
	public function saveRegister($data) {
		$data['User']['token'] = sha1(microtime() . strtotime(date('Y-m-d H:i:s')) . rand(10, 100000000));
		$savedUser = $this->saveAll($data);
		$userId = $this->id;
		if ($savedUser) {
			$savedMember = $this->Member->save(array('Member' => array('alias' => 'junior member')));
			$updatedUser = $this->save(array('User' => array('id' => $userId, 'member_id' => $this->Member->id)));
			$this->sendLinkRegisteredConfirm($userId);
		}
		return $savedUser;
	}

/**
 * [sendLinkRegisteredConfirm]
 *
 * @param int $userId user id
 * @return void
 */
	public function sendLinkRegisteredConfirm($userId) {
		$user = $this->findById($userId);
		$email = new CakeEmail();
		$email->config('gmail')
			->viewVars(array('user' => $user))
			->template('registeredConfirm', 'default')
			->subject('Test email')
			->to($user['User']['email'])
			->emailFormat('html')
			->send();
	}

/**
 * [registerConfirm description]
 *
 * @param string $token user token
 * @return array
 */
	public function registerConfirm($token) {
		$status = false;
		$message = 'Token invalied.';
		$user = $this->find('first', array(
			'conditions' => array(
				'User.token' => $token
			)
		));
		if ($user) {
			$status = true;
			$message = ($user['User']['confirm'] == 1) ? 'Token already activated.' : 'User was activated successfully.';
			$this->save(array('User' => array('id' => $user['User']['id'], 'confirm' => 1)));
		}
		return array(
			'status' => $status,
			'message' => $message
		);
	}
}
