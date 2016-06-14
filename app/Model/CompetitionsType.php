<?php
App::uses('AppModel', 'Model');
/**
 * CompetitionsType Model
 *
 * @property Team $Team
 */
class CompetitionsType extends AppModel {

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * [$validate]
 * @var array
 */
	public $validate = array(
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
				'message' => 'กรุณากรอกข้อมูลเกี่ยวกับประเภทการแข่งขัน.'
			),
		),
		'start_date' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'message' => 'กรุณาเลือกวันที่เริ่มการแข่งขัน.'
			),
		),
		'end_date' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'message' => 'กรุณาเลือกวันที่จบการแข่งขัน.'
			),
		),
		'year' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'message' => 'กรุณาป้อนฤดูกาลการแข่งขัน.'
			),
			'numeric' => array(
				'rule' => 'notBlank',
				'message' => 'กรุณาป้อนฤดูกาลการแข่งขันเป็นตัวเลข คศ.'
			)
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
 * [saveCompettitionsType]
 * @method saveCompettitionsType
 * @param array $data CompettitionsType data
 * @return bool
 */
	public function saveCompetitionsType($data) {
		return $this->save($data);
	}
}
