<?php
/**
 * Predict Fixture
 */
class PredictFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'teams_compettition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'team_a_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'team_b_score' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'member_id' => 1,
			'teams_compettition_id' => 1,
			'team_a_score' => 1,
			'team_b_score' => 1,
			'created' => '2016-06-15 17:41:13',
			'modified' => '2016-06-15 17:41:13'
		),
	);

}
