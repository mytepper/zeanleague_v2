<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property User $User
 */
class Member extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'alias' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'This field is requied.',
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'member_id',
			'dependent' => false,
		)
	);

}
