<?php
App::uses('AppController', 'Controller');
/**
 * CompetitionsTypes Controller
 */
class CompetitionsTypesController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [index temes list]
 *
 * @return void
 */
	public function index() {
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'CompetitionsType.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
			'limit' => 20,
			'conditions' => $conditions,
			'order' => array('id' => 'desc')
		);
		$compettitionsTypes = $this->paginate('CompetitionsType');
		$this->set(compact('compettitionsTypes'));
	}

/**
 * [add]
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$saved = $this->CompetitionsType->saveCompetitionsType($this->request->data);
			if ($saved) {
				$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'competitions_types'));
				$this->redirect('/competitions_types/add');
			} else {
				$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'competitions_types'));
			}
		}
	}

/**
 * [edit]
 *
 * @param int $id team id
 * @return void
 */
	public function edit($id) {
		$competitionsType = $this->CompetitionsType->findById($id);
		$logo = $competitionsType;
		if ($this->request->is('put')) {
			$saved = $this->CompetitionsType->saveCompetitionsType($this->request->data);
			if ($saved) {
				$this->Flash->success('อัพเดทข้อมูลแล้ว.', array('key' => 'competitions_types'));
				$this->redirect('/competitions_types/edit/' . $id);
			} else {
				$this->Flash->errors('อัพเดทข้อมูลไม่ได้.', array('key' => 'competitions_types'));
			}
		} else {
			$this->request->data = $competitionsType;
		}

		$this->set(compact('logo'));
	}

/**
 * [uploadLogo description]
 *
 * @return json
 */
	public function uploadLogo() {
		$status = false;
		$imageLogo = '';
		if ($this->request->is('put')) {
			$saved = $this->CompetitionsType->saveCompetitionsType($this->request->data);
			if ($saved) {
				$team = $this->CompetitionsType->findById($this->request->data['CompetitionsType']['id']);
				$status = true;
				$imageLogo = 'images/imageThumb/competitions_type/logo_image/' . $this->request->data['CompetitionsType']['id'] . '/thumb_' . $team['CompetitionsType']['logo_image'];
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
