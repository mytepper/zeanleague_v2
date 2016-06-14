<?php
App::uses('AppController', 'Controller');
/**
 * Members Controller
 */
class MembersController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [beforeFilter]
 *
 * @return void
 */
	public function beforeFilter() {
		return parent::beforeFilter();
	}

/**
 * [register public page]
 *
 * @method register
 * @return void
 */
	public function profile() {
		$user = $this->Auth->user();
		if ($this->request->is('put')) {
			$saved = $this->Member->save($this->request->data);
			if ($saved) {
				$this->Flash->success('Update profile successfully.', array('key' => 'members'));
				$this->redirect('/members/profile');
			} else {
				$this->Flash->error('Please check all input of required.', array('key' => 'members'));
			}
		} else {
			$this->request->data = $user;
		}
	}
}
