<?php
App::uses('AppModel', 'Model');
/**
 * Rate Model
 *
 * @property TeamsCompetition $TeamsCompetition
 */
class Rate extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TeamsCompetition' => array(
			'className' => 'TeamsCompetition',
			'foreignKey' => 'rate_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
