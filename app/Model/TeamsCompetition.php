<?php
App::uses('AppModel', 'Model');
/**
 * TeamsCompetition Model
 *
 * @property CompetitionType $CompetitionType
 * @property Rate $Rate
 */
class TeamsCompetition extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date_time' => array(
			'dateTime' => array(
				'rule' => array('dateTime'),
				'message' => 'กรุณาเลือกสันเวลาที่แข่งขัน'
			)
		),
		'team_a_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณาเลือกทีมเหย้า',
			),
		),
		'team_b_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณาเลือกทีมเยือน',
			),
		),
		'competition_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กระุณาเลือกประเภทการแข่งขัน',
			),
		),
		'rate_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณาเลือกอัตราการต่อรอง',
			),
		),
		'team' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'กรุณาเลือกทีมรอง',
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
		'CompetitionsType' => array(
			'className' => 'CompetitionsType',
			'foreignKey' => 'competitions_type_id',
		),
		'Rate' => array(
			'className' => 'Rate',
			'foreignKey' => 'rate_id',
		)
	);

/**
 * [saveTeamsCompetition]
 *
 * @param array $data TeamsCompetition data
 * @return array
 */
	public function saveTeamsCompetition($data) {
		return $this->save($data);
	}

/**
 * [getTeamsCompetitionsToday]
 *
 * @return void
 */
	public function getTeamsCompetitionsToday() {
		return $this->find('all', array(
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
			/*'conditions' => array(
				'DATE(TeamsCompetition.date_time)' => date('Y-m-d')
			)*/
		));
	}
}
