<?php
App::uses('AppController', 'Controller');
/**
 * TeamsCompetitions Controller
 */
class TeamsCompetitionsController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [beforeFilter]
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('passed', 'coming', 'today');
	}

/**
 * [process]
 *
 * @return void
 */
	public function process() {
		$this->isAdmin();
		$conditions = array();
		if (isset($this->request->query['date_time'])) {
			$conditions = array(
				'DATE(TeamsCompetition.date_time)' => date('Y-m-d', strtotime($this->request->query['date_time']))
			);
		}
		$this->paginate = array(
			'fields' => array(
				'TeamsCompetition.id',
				'TeamsCompetition.team_a_id',
				'TeamsCompetition.team_b_id',
				'TeamsCompetition.team_a_score',
				'TeamsCompetition.team_b_score',
				'TeamsCompetition.competitions_type_id',
				'TeamsCompetition.max_score',
				'TeamsCompetition.rate_id',
				'TeamsCompetition.team',
				'TeamsCompetition.match_end',
				'CompetitionsType.name',
				'Rate.name',
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a_logo",
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b_logo",
			),
			'limit' => 30,
			'conditions' => $conditions,
			'order' => array('TeamsCompetition.date_time' => 'desc')
		);
		$teamsCompetitions = $this->paginate('TeamsCompetition');
		$this->set(compact('teamsCompetitions'));
	}

/**
 * [predicts]
 *
 * @return void
 */
	public function predicts() {
		$teamsCompetitions = $this->TeamsCompetition->getTeamsCompetitionsToday();
		$this->set(compact('teamsCompetitions'));
	}
/**
 * [passed]
 *
 * @return void
 */
	public function passed() {
		$conditions = array(
			'TeamsCompetition.date_time <' => date('Y-m-d H:i:s')
		);
		$this->paginate = array(
			'fields' => $this->TeamsCompetition->fields,
			'limit' => 2,
			'conditions' => $conditions,
			'order' => array(
				'TeamsCompetition.date_time' => 'desc',
				'CompetitionsType.name' => 'asc'
			)
		);
		$teamsCompetitions = $this->paginate('TeamsCompetition');
		$this->set(compact('teamsCompetitions'));
	}

/**
 * [index temes list]
 *
 * @return void
 */
	public function index() {
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'TeamsCompetition.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
			'fields' => array(
				'TeamsCompetition.id',
				'TeamsCompetition.team_a_id',
				'TeamsCompetition.team_b_id',
				'TeamsCompetition.team_a_score',
				'TeamsCompetition.team_b_score',
				'TeamsCompetition.competitions_type_id',
				'TeamsCompetition.max_score',
				'TeamsCompetition.rate_id',
				'TeamsCompetition.team',
				'CompetitionsType.name',
				'Rate.name',
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a_logo",
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b_logo",
			),
			'limit' => 20,
			'conditions' => $conditions,
			'order' => array('id' => 'desc')
		);
		$teamsCompetitions = $this->paginate('TeamsCompetition');
		$this->set(compact('teamsCompetitions'));
	}

/**
 * [add]
 *
 * @return void
 */
	public function add() {
		$this->isAdmin();
		$competitionsTypes = Hash::combine($this->TeamsCompetition->CompetitionsType->find('all'), '{n}.CompetitionsType.id', '{n}.CompetitionsType.name');
		$this->loadModel('Team');
		$teams = Hash::combine($this->Team->find('all'), '{n}.Team.id', '{n}.Team.name');
		$rates = Hash::combine($this->TeamsCompetition->Rate->find('all'), '{n}.Rate.id', '{n}.Rate.name');
		if ($this->request->is('post')) {
			if ($this->request->data['TeamsCompetition']['team_a_id'] == $this->request->data['TeamsCompetition']['team_b_id']) {
				$this->Flash->errors('ไม่สามารถเลือกทีมเหย้าและทีมเยือนเป็นทีมเดียวกันได้.', array('key' => 'teams_competitions'));
			} else {
				$saved = $this->TeamsCompetition->saveTeamsCompetition($this->request->data);
				if ($saved) {
					$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'teams_competitions'));
					$this->redirect('/teams_competitions/add');
				} else {
					$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'teams_competitions'));
				}
			}
		}
		$this->set(compact('competitionsTypes', 'teams', 'rates'));
	}

/**
 * [edit]
 *
 * @param int $id team id
 * @return void
 */
	public function edit($id) {
		$this->isAdmin();
		$teamsCompetition = $this->TeamsCompetition->findById($id);
		$competitionsTypes = Hash::combine($this->TeamsCompetition->CompetitionsType->find('all'), '{n}.CompetitionsType.id', '{n}.CompetitionsType.name');
		$this->loadModel('Team');
		$teams = Hash::combine($this->Team->find('all'), '{n}.Team.id', '{n}.Team.name');
		$rates = Hash::combine($this->TeamsCompetition->Rate->find('all'), '{n}.Rate.id', '{n}.Rate.name');
		if ($this->request->is('put')) {
			if ($this->request->data['TeamsCompetition']['team_a_id'] == $this->request->data['TeamsCompetition']['team_b_id']) {
				$this->Flash->errors('ไม่สามารถเลือกทีมเหย้าและทีมเยือนเป็นทีมเดียวกันได้.', array('key' => 'teams_competitions'));
			} else {
				$saved = $this->TeamsCompetition->saveTeamsCompetition($this->request->data);
				if ($saved) {
					$this->Flash->success('บันทึกข้อมูลแล้ว.', array('key' => 'teams_competitions'));
					$this->redirect('/teams_competitions/edit/' . $id);
				} else {
					$this->Flash->errors('ไม่สามารถเพิ่มข้อมูลได้.', array('key' => 'teams_competitions'));
				}
			}
		} else {
			$this->request->data = $teamsCompetition;
		}
		$this->set(compact('competitionsTypes', 'teams', 'rates'));
	}
}
