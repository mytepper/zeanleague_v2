<?php
App::uses('AppModel', 'Model');
/**
 * Predict Model
 *
 * @property Member $Member
 * @property TeamsCompetition $TeamsCompetition
 */
class Predict extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'member_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Not Empty',
			),
		),
		'teams_compettition_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Not Empty',
			),
		),
		'team_a_score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณาทายสกอทีมเหย้า',
			),
			'number' => array(
				'rule' => array('range', -1, 999),
				'message' => 'กรอกตัวเลขให้ถูกต้อง'
			)
		),
		'team_b_score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณทายสกอทีมเยือน',
			),
			'number' => array(
				'rule' => array('range', -1, 999),
				'message' => 'กรอกตัวเลขให้ถูกต้อง'
			)
		),
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
			'foreignKey' => 'member_id'
		),
		'TeamsCompetition' => array(
			'className' => 'TeamsCompetition',
			'foreignKey' => 'teams_competition_id'
		)
	);

/**
 * [getPredictData]
 *
 * @param int $teamsCompetitionId get teamsCompetitionId
 * @param array $user user data
 * @return array data
 */
	public function getPredictData($teamsCompetitionId, $user) {
		return $this->find('first', array(
			'conditions' => array(
				'Predict.teams_competition_id' => $teamsCompetitionId,
				'Predict.member_id' => $user['member_id']
			)
		));
	}

/**
 * [getPredictDataSubmit]
 *
 * @param int $teamsCompetitionId teamsCompetitionId
 * @param array $user user data
 * @return array
 */
	public function getPredictDataSubmit($teamsCompetitionId, $user) {
		$teamsCompetition = $this->TeamsCompetition->getTeamsCompetitionData($teamsCompetitionId);
		$date = date('Y-m-d', strtotime($teamsCompetition['TeamsCompetition']['date_time']));
		$status = false;
		$result = ( $teamsCompetition['TeamsCompetition']['date_time'] < date('Y-m-d H:i:s')) ? 'คุณทายผลทีมที่แข่งในวัน ' . $date . ' ไปจำนวน 5 คู่แล้ว' : 'ไม่สามารถทายผลคู่ที่เริ่มการแข่งขันแล้ว';
		$limit = 5;
		$predictLimit = $this->find('count', array(
			'conditions' => array(
				'Predict.member_id' => $user['member_id'],
				'DATE(TeamsCompetition.date_time)' => $date
			)
		));
		if ($predictLimit < $limit && $teamsCompetition['TeamsCompetition']['date_time'] > date('Y-m-d H:i:s')) {
			$status = true;
			$result = $teamsCompetition;
		}
		return array(
			'status' => $status,
			'result' => $result
		);
	}

/**
 * [getMemberPredictsByDate description]
 *
 * @param int $memberId memberId
 * @param date $date date
 * @return array
 */
	public function getMemberPredictsByDate($memberId, $date) {
		return $this->find('all', array(
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
			'conditions' => array(
				"DATE(TeamsCompetition.date_time)" => date('Y-m-d', strtotime($date)),
				'Predict.member_id' => $memberId
			),
			'order' => array('TeamsCompetition.date_time' => 'ASC')
		));
	}

/**
 * [getMemberPredicts]
 *
 * @param int $memberId member id
 * @return array
 */
	public function getMemberPredicts($memberId) {
		$dates = $this->getPredictsDateAll($memberId);
		$data = array();
		foreach ($dates as $key => $value) {
			$result = $this->getMemberPredictsByDate($memberId, $value);
			$data[] = array(
				'date' => $value,
				'result' => $result
			);
		}
		return $data;
	}

/**
 * [getPredictsDateAll]
 *
 * @param int $memberId member id
 * @return array
 */
	public function getPredictsDateAll($memberId) {
		$result = $this->find('all', array(
			'conditions' => array(
				'Predict.member_id' => $memberId
			),
			'group' => array('DATE(TeamsCompetition.date_time)'),
			'order' => array('TeamsCompetition.date_time' => 'DESC')
		));
		return hash::extract($result, '{n}.TeamsCompetition.date_time');
	}

/**
 * [deletePredict]
 *
 * @param int $predictId predictId
 * @param int $memberId memberId
 * @return bool
 */
	public function deletePredict($predictId, $memberId) {
		$find = $this->find('first', array(
			'conditions' => array(
				'Predict.id' => $predictId,
				'Predict.member_id' => $memberId,
				'TeamsCompetition.date_time >' => date('Y-m-d H:i:s')
			)
		));
		$deleted = false;
		if ($find) {
			$deleted = $this->delete($predictId, true);
		}
		return $deleted;
	}
}
