<?php
App::uses('AppModel', 'Model');
/**
 * Team Model
 *
 * @property TeamType $TeamType
 * @property CompettionsType $CompettionsType
 */
class Team extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TeamType' => array(
			'className' => 'TeamType',
			'foreignKey' => 'team_type_id',
		)
	);

/**
 * [$validate rule]
 * @var array
 */
	public $validate = array(
		/*'logo_image' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'required' => false,
				'message' => 'กรุณาใส่รูป Logo.'
			),
		),*/
		'name' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'กรุณากรอกชื่อ.'
            ),
			'isUnique' => array(
				'rule' => 'isUnique',
                'message' => 'มีข้อมูลชื่อนี้อยู่แล้ว.'
			)
        ),
		'description' => array(
			'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'กรุณากรอกข้อมูลเกี่ยวกับทีม.'
            ),
		),
		'team_type_id' => array(
			'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'กรุณาเลือกประเภททีม.'
            ),
		)
    );

/**
 * [$actsAs configtion]
 * @var array
 */
	public $actsAs = array(
		'Upload.Upload' => array(
		   'logo_image' => array(
			   'fields' => array(
				   'dir' => 'logo_dir'
			   ),
			   'thumbnailSizes' => array(
                    'thumb' => '80x80'
                ),
				'deleteOnUpdate' => true,
				'maxSize' => 2097152,
				'nameCallback' => '__renameFile'
		   )
		)
	);

/**
 * [saveTeam]
 * @method saveTeam
 * @param array $data team data
 * @return array if true  return false if false
 */
	public function saveTeam($data) {
		return $this->save($data);
	}

}
