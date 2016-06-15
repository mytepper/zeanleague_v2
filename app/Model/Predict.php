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
				'message' => 'Your custom message here',
			),
		),
		'teams_compettition_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
		'team_a_score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
		'team_b_score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
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
 * [getPredictData description]
 *
 * @param  [type]         $teamsCompetitionId [description]
 * @param  [type]         $user               [description]
 * @return [type]                             [description]
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
}
