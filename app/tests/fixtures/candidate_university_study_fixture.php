<?php
/* CandidateUniversityStudy Fixture generated on: 2011-09-12 13:16:00 : 1315844160 */
class CandidateUniversityStudyFixture extends CakeTestFixture {
	var $name = 'CandidateUniversityStudy';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_profile_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'career' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'university' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ending_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'candidate_profile_id' => 1,
			'career' => 'Lorem ipsum dolor sit amet',
			'university' => 'Lorem ipsum dolor sit amet',
			'ending_year' => 'Lorem ipsum dolor sit amet'
		),
	);
}
