<?php
App::uses('AppModel', 'Model');
/**
 * TeamsCompetition Model
 *
 * @property CompetitionType $CompetitionType
 * @property Rate $Rate
 */
class TeamsCompetition extends AppModel {

	public $fields = array(
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
		'CompetitionsType.name',
		'Rate.name',
		"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a",
		"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_a_id) team_a_logo",
		"(SELECT CONCAT(name, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b",
		"(SELECT CONCAT(logo_image, '') FROM teams WHERE teams.id = TeamsCompetition.team_b_id) team_b_logo",
	);

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
	public function getTeamsCompetitionsPassed() {
		$dates = $this->getTeamsCompetitionsDate(true);
		$data = array();
		foreach ($dates as $key => $value) {
			$query = $this->find('all', array(
				'fields' => $this->fields,
				'conditions' => array(
					'DATE(TeamsCompetition.date_time)' => date('Y-m-d', strtotime($value))
				),
				'order' => array('TeamsCompetition.competitions_type_id' => 'ASC')
			));
			$data[$key] = array('result' => $query, 'date' => $value);
		}
		return $data;
	}

/**
 * [getTeamsCompetitionsToday]
 *
 * @return array
 */
	public function getTeamsCompetitionsToday() {
		$competitionsTypes = $this->find('all', array(
			'fields' => array(
				'TeamsCompetition.date_time',
				'TeamsCompetition.competitions_type_id'
			),
			'conditions' => array(
				'DATE(TeamsCompetition.date_time)' => date('Y-m-d', strtotime(date('Y-m-d H:i:s')))
			),
			'group' => array('TeamsCompetition.competitions_type_id'),
			'order' => array(
				'TeamsCompetition.competitions_type_id' => 'ASC'
			)
		));
		$competitionsTypes = Hash::extract($competitionsTypes, '{n}.TeamsCompetition.competitions_type_id');
		$data = array();
		foreach ($competitionsTypes as $key => $value) {
			$query = $this->find('all', array(
				'fields' => $this->fields,
				'conditions' => array(
					'TeamsCompetition.competitions_type_id' => $value,
					'DATE(TeamsCompetition.date_time)' => date('Y-m-d')
				),
				'order' => array('TeamsCompetition.date_time' => 'ASC')
			));
			$competitionsType = $this->CompetitionsType->findById($value);
			$data[$key] = array('result' => $query, 'competitionsType' => $competitionsType['CompetitionsType']['name']);
		}
		return $data;
	}

/**
 * [getTeamsCompetitionsDate]
 *
 * @param string $passed TeamsCompetition coming or passed
 * @return array
 */
	public function getTeamsCompetitionsDate($passed = true) {
		$dateNow = date('Y-m-d H:i:s');
		$conditions = ($passed) ? array('TeamsCompetition.date_time <' => $dateNow) : array('TeamsCompetition.date_time <' => $dateNow);
		$result = $this->find('all', array(
			'conditions' => $conditions,
			'group' => 'DATE(TeamsCompetition.date_time)'
		));
		return hash::extract($result, '{n}.TeamsCompetition.date_time');
	}
}
