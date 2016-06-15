<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property Group $Group
 * @property Predict $Predict
 * @property User $User
 */
class Member extends AppModel {

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Predict' => array(
			'className' => 'Predict',
			'foreignKey' => 'member_id',
			'dependent' => false,
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'member_id',
			'dependent' => false,
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'alias' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'กรุณากรอกฉายาของคุณ.',
			),
		),
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'กรุณากรอกชื่อของคุณ.',
			),
		),
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'กรุณากรอกนามสกุลของคุณ.',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'กรุณากรอกอีเมลล์ของคุณ.',
			),
		),
		'phone' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'กรุณากรอกเบอร์โทรศัพท์ของคุณเป็นตัวเลข.',
			),
			'length' => array(
				'rule' => array('between', 9, 10),
				'message' => 'กรุณากรอกเบอร์มือถือ 9 - 10 ตัว.',
			)
		),
	);

/**
 * [$actsAs configtion]
 * @var array
 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'avatar_image' => array(
			   'fields' => array(
				   'dir' => 'avatar_dir'
			   ),
			   'thumbnailSizes' => array(
			        'thumb' => '200x200'
			    ),
				'deleteOnUpdate' => true,
				'maxSize' => 1000000,
				'nameCallback' => '__renameFile'
			)
		)
	);

}
