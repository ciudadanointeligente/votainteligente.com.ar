<?php
/* CandidateParty Fixture generated on: 2011-09-12 13:13:22 : 1315844002 */
class CandidatePartyFixture extends CakeTestFixture {
	var $name = 'CandidateParty';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_profile_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'starting_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ending_year' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'party' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'candidate_profile_id' => 1,
			'starting_year' => 'Lorem ipsum dolor sit amet',
			'ending_year' => 'Lorem ipsum dolor sit amet',
			'party' => 'Lorem ipsum dolor sit amet'
		),
	);
}
