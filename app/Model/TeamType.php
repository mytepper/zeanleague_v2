<?php
App::uses('AppModel', 'Model');
/**
 * TeamType Model
 *
 * @property Team $Team
 */
class TeamType extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_type_id',
			'dependent' => false,
		)
	);

/**
 * [$validate rule]
 * @var array
 */
	public $validate = array(
		'name' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'กรุณากรอกชื่อ.'
            ),
			'isUnique' => array(
				'rule' => 'isUnique',
                'required' => true,
                'message' => 'มีข้อมูลชื่อนี้อยู่แล้ว.'
			)
        ),
		'country' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => false,
                'message' => 'Plase enter country.'
            )
        ),
		'leage' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => false,
                'message' => 'Plase enter leage.'
            )
        ),
		'division' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => false,
                'message' => 'Plase enter division.'
            )
        ),
    );

/**
 * [saveTeamType]
 * @method saveTeamType
 * @param array $data TeamType data
 * @return bool
 */
	public function saveTeamType($data) {
		return $this->save($data);
	}

/**
 * [getTeamTypeLists]
 * @method getTeamTypeLists
 * @return array list
 */
	public function getTeamTypeLists() {
		return $this->find('list', array(
			'fields' => array(
				'TeamType.id',
				'TeamType.name',
			)
		));
	}

}
