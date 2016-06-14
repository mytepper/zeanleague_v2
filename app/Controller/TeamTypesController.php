<?php
App::uses('AppController', 'Controller');
/**
 * TeamTypes Controller
 */
class TeamTypesController extends AppController {

	public $components = array('RequestHandler', 'Flash', 'Paginator');

/**
 * [index view data table]
 * @method index
 *
 * @return void
 */
	public function index() {
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'TeamType.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
	        'limit' => 20,
			'conditions' => $conditions,
	        'order' => array('id' => 'desc')
	    );
		$teamTypes = $this->paginate('TeamType');
    	$this->set(compact('teamTypes'));
	}

/**
 * [add]
 * @method add
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$saved = $this->TeamType->saveTeamType($this->request->data);
			if ($saved) {
				$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'team_types'));
				$this->redirect('/team_types/add');
			} else {
				$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'team_types'));
			}
		}
	}

/**
 * [edit]
 *
 * @method edit
 * @param int $id teamTypes id
 * @return void
 */
	public function edit($id) {
		$teamType = $this->TeamType->findById($id);
		if ($this->request->is('put')) {
			$saved = $this->TeamType->saveTeamType($this->request->data);
			if ($saved) {
				$this->Flash->success('อัพเดทข้อมูลแล้ว.', array('key' => 'team_types'));
				$this->redirect('/team_types/edit/' . $id);
			} else {
				$this->Flash->errors('อัพเดทข้อมูลไม่ได้.', array('key' => 'team_types'));
			}
		} else {
			$this->request->data = $teamType;
		}
	}

}
