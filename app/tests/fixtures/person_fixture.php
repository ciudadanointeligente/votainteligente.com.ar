<?php
/* Person Fixture generated on: 2011-09-12 15:31:43 : 1315852303 */
class PersonFixture extends CakeTestFixture {
	var $name = 'Person';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'idfacebook' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'session_key' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'candidate_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'confirmsCandidate' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'idfacebook' => 'Lorem ipsum dolor sit amet',
			'session_key' => 'Lorem ipsum dolor sit amet',
			'candidate_id' => 1,
			'date' => '2011-09-12 15:31:43',
			'confirmsCandidate' => 1
		),
	);
}
