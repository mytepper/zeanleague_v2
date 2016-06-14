<?php
/**
 * TeamsCompettition Fixture
 */
class TeamsCompettitionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'team_a_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'team_b_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'team_a_score' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'team_b_score' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'compettition_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'max_score' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rate_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'team_a_id' => 1,
			'team_b_id' => 1,
			'team_a_score' => 1,
			'team_b_score' => 1,
			'compettition_type_id' => 1,
			'created' => '2016-05-30 13:50:19',
			'modified' => '2016-05-30 13:50:19',
			'max_score' => 1,
			'rate_id' => 1
		),
	);

}
