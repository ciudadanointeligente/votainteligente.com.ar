<?php
/* FacebookDetail Fixture generated on: 2011-09-14 15:35:19 : 1316025319 */
class FacebookDetailFixture extends CakeTestFixture {
	var $name = 'FacebookDetail';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'election_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'app_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'secret' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'app_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'election_id' => 1,
			'app_id' => 'Lorem ipsum dolor sit amet',
			'secret' => 'Lorem ipsum dolor sit amet',
			'app_url' => 'Lorem ipsum dolor sit amet'
		),
	);
}
