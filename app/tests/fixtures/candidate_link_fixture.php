<?php
/* CandidateLink Fixture generated on: 2011-09-12 13:12:18 : 1315843938 */
class CandidateLinkFixture extends CakeTestFixture {
	var $name = 'CandidateLink';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_profile_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'link' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'candidate_profile_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'link' => 'Lorem ipsum dolor sit amet'
		),
	);
}
