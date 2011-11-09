<?php
/* CandidatePoliticalExperience Fixture generated on: 2011-09-12 13:14:55 : 1315844095 */
class CandidatePoliticalExperienceFixture extends CakeTestFixture {
	var $name = 'CandidatePoliticalExperience';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_profile_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'starting_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ending_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'position' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'candidate_profile_id' => 1,
			'starting_year' => 'Lorem ipsum dolor sit amet',
			'ending_year' => 'Lorem ipsum dolor sit amet',
			'position' => 'Lorem ipsum dolor sit amet',
			'type' => 1
		),
	);
}
