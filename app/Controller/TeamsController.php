<?php
App::uses('AppController', 'Controller');
/**
 * Teams Controller
 */
class TeamsController extends AppController {

	public $components = array('RequestHandler', 'Flash', 'Paginator');

/**
 * [index temes list]
 * @method index
 * @return void
 */
	public function index() {
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'Team.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
			'limit' => 20,
			'conditions' => $conditions,
			'order' => array('id' => 'desc')
		);
		$teams = $this->paginate('Team');
		$this->set(compact('teams'));
	}

/**
 * [add]
 * @method add
 *
 * @return void
 */
	public function add() {
		$teamTypes = $this->Team->TeamType->getTeamTypeLists();
		if ($this->request->is('post')) {
			$saved = $this->Team->saveTeam($this->request->data);
			if ($saved) {
				$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'teams'));
				$this->redirect('/teams/add');
			} else {
				$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'teams'));
			}
		}
		$this->set(compact('teamTypes'));
	}

/**
 * [edit]
 *
 * @method edit
 * @param int $id team id
 * @return void
 */
	public function edit($id) {
		$teamTypes = $this->Team->TeamType->getTeamTypeLists();
		$team = $this->Team->findById($id);
		if ($this->request->is('put')) {
			$saved = $this->Team->saveTeam($this->request->data);
			if ($saved) {
				$this->Flash->success('อัพเดทข้อมูลแล้ว.', array('key' => 'teams'));
				$this->redirect('/teams/edit/' . $id);
			} else {
				$this->Flash->errors('อัพเดทข้อมูลไม่ได้.', array('key' => 'teams'));
			}
		} else {
			$this->request->data = $team;
		}
		$this->set(compact('teamTypes'));
	}

/**
 * [uploadLogo description]
 * @method uploadLogo
 * @return [type]     [description]
 */
	public function uploadLogo() {
		$status = false;
		$imageLogo = '';
		if ($this->request->is('put')) {
			$saved = $this->Team->saveTeam($this->request->data);
			if ($saved) {
				$team = $this->Team->findById($this->request->data['Team']['id']);
				$status = true;
				$imageLogo = 'images/imageThumb/team/logo_image/' . $this->request->data['Team']['id'] . '/thumb_' . $team['Team']['logo_image'];
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
