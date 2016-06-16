<?php
App::uses('AppController', 'Controller');
/**
 * Predicts Controller
 */
class PredictsController extends AppController {

	public $components = array('RequestHandler', 'Paginator');

/**
 * [beforeFilter]
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * [index]
 *
 * @return void
 */
	public function member() {
		$user = $this->Auth->user();
		$conditions = array();
		if (isset($this->request->query['key'])) {
			$conditions = array(
				'TeamsCompetition.name LIKE' => '%' . $this->request->query['key'] . '%'
			);
		}
		$this->paginate = array(
			'fields' => array(
				'Predict.id',
				'Predict.member_id',
				'Predict.teams_competition_id',
				'Predict.team',
				'Predict.team_a_score',
				'Predict.team_b_score',
				'Predict.modified',
				'TeamsCompetition.id',
				'TeamsCompetition.team_a_id',
				'TeamsCompetition.team_b_id',
				'TeamsCompetition.team_a_score',
				'TeamsCompetition.team_b_score',
				'TeamsCompetition.competitions_type_id',
				'TeamsCompetition.max_score',
				'TeamsCompetition.rate_id',
				'TeamsCompetition.team',
				'TeamsCompetition.date_time',
				"(SELECT CONCAT(name, '') FROM competitions_types WHERE competitions_types.id = TeamsCompetition.competitions_type_id) competitionsType",
				"(SELECT CONCAT(name, '') FROM rates WHERE rates.id = TeamsCompetition.rate_id) rate",
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a_logo",
				"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b",
				"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b_logo",
			),
			'limit' => 20,
			'conditions' => array(
				'Predict.member_id' => $user['member_id']
			),
			'order' => array('TeamsCompetition.date_time' => 'DESC')
		);
		$predicts = $this->paginate('Predict');
		$this->set(compact('predicts'));
	}

/**
 * [getForm]
 *
 * @param int $teamsCompetitionId teamsCompetitionId
 * @return void
 */
	public function getForm($teamsCompetitionId) {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$predict = $this->Predict->getPredictData($teamsCompetitionId, $user);
			if ($predict) {
				$this->request->data = $predict;
			}
			$result = $this->Predict->getPredictDataSubmit($teamsCompetitionId, $user);
			$this->set(compact('result'));
			return $this->render('/Elements/teams_competitions/predict_form');
		}
	}

/**
 * [submit]
 *
 * @return void
 */
	public function submitForm() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$this->request->data['Predict']['member_id'] = $user['member_id'];
			$teamsCompetitionId = $this->request->data['Predict']['teams_competition_id'];
			$saved = $this->Predict->save($this->request->data);
			if ($saved) {
				$this->Flash->success('ทายผลบอลสำเร็จ', array('key' => 'predicts'));
				$predict = $this->Predict->getPredictData($teamsCompetitionId, $user);
				$this->request->data = $predict;
			} else {
				$this->Flash->errors('กรุณากรอกข้อมูลให้ครบ', array('key' => 'predicts'));
			}
			$result = $this->Predict->getPredictDataSubmit($teamsCompetitionId, $user);
			$this->set(compact('result'));
			return $this->render('/Elements/teams_competitions/predict_form');
		}
	}

/**
 * [getPredictsToday]
 *
 * @return void
 */
	public function getPredictsToday() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$predicts = $this->Predict->getMemberPredictsByDate($user['member_id'], date('Y-m-d'));
			$this->set(compact('predicts'));
			$this->render('/Elements/predicts/predict_today_table');
		}
	}

/**
 * [deleted]
 *
 * @return void
 */
	public function deleted() {
		$user = $this->Auth->user();
		if ($this->request->is('ajax')) {
			$status = false;
			$message = 'ไม่สามารถลบข้อมูลได้';
			$deleted = $this->Predict->deletePredict($this->request->data['id'], $user['member_id']);
			if ($deleted) {
				$status = true;
				$message = 'ลบข้อมูลสำเร็จ';
			}
		}
		return $this->setJsonResponse(
			array(
				'status' => $status,
				'message' => $message,
			)
		);
	}
}
