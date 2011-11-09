<?php
/* CandidateWorkExperience Fixture generated on: 2011-09-12 13:17:53 : 1315844273 */
class CandidateWorkExperienceFixture extends CakeTestFixture {
	var $name = 'CandidateWorkExperience';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_profile_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'starting_year' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ending_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'position' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'company' => 'Lorem ipsum dolor sit amet'
		),
	);
}
