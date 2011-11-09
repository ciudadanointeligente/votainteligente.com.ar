<?php
/* CandidateProfile Fixture generated on: 2011-09-12 13:05:51 : 1315843551 */
class CandidateProfileFixture extends CakeTestFixture {
	var $name = 'CandidateProfile';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'candidate_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'birth' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'profession' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sons' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'civil_status' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'religion' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'twitter' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'highschool' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'current_party' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'current_party_starting_year' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'assets' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'candidate_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'birth' => '2011-09-12',
			'profession' => 'Lorem ipsum dolor sit amet',
			'sons' => 1,
			'civil_status' => 'Lorem ipsum dolor sit amet',
			'religion' => 'Lorem ipsum dolor sit amet',
			'twitter' => 'Lorem ipsum dolor sit amet',
			'facebook_description' => 'Lorem ipsum dolor sit amet',
			'facebook' => 'Lorem ipsum dolor sit amet',
			'highschool' => 'Lorem ipsum dolor sit amet',
			'current_party' => 'Lorem ipsum dolor sit amet',
			'current_party_starting_year' => 1,
			'assets' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2011-09-12 13:05:51',
			'modified' => '2011-09-12 13:05:51'
		),
	);
}
