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
 * @throws NotFoundException
 */
	public function profile() {
		$user = $this->Auth->user();
		if (empty($user) || $user['role'] != 1) {
			throw new NotFoundException();
		}
		$this->Member->recursive = 0;
		$user = $this->Member->findById($user['Member']['id']);
		if ($this->request->is('put')) {
			$saved = $this->Member->save($this->request->data);
			if ($saved) {
				$this->Flash->success('อัพเดท ข้อมูลสำเร็จ.', array('key' => 'members'));
				$this->redirect('/members/profile');
			} else {
				$this->Flash->error('กรุณาตรวจสอบข้อมูลที่จำเป็นต้องกรอกให้ถูกต้อง.', array('key' => 'members'));
			}
		} else {
			$this->request->data = $user;
		}
		$this->set(compact('user'));
	}

/**
 * [uploadLogo description]
 *
 * @return [type]     [description]
 */
	public function uploadLogo() {
		$status = false;
		$imageLogo = '';
		if ($this->request->is('put')) {
			$saved = $this->Member->save($this->request->data);
			if ($saved) {
				$member = $this->Member->findById($this->request->data['Member']['id']);
				$status = true;
				$imageLogo = 'images/imageThumb/member/avatar_image/' . $this->request->data['Member']['id'] . '/thumb_' . $member['Member']['avatar_image'];
			}
		}

		return $this->setJsonResponse(
			array(
				'status' => $status,
				'imageLogo' => $imageLogo,
			)
		);
	}
}
