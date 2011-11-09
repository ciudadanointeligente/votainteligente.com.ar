<?php
/* Election Fixture generated on: 2011-09-07 18:00:02 : 1315429202 */
class ElectionFixture extends CakeTestFixture {
	var $name = 'Election';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);
	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'name' => 'elección uno',
			'slug' => 'eleccion_uno',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		),
		array(
			'id' => 2,
			'user_id' => 1,
			'name' => 'elección dos',
			'slug' => 'eleccion_dos',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		),
		array(
			'id' => 3,
			'user_id' => 2,
			'name' => 'elección tres',
			'slug' => 'eleccion_tres',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		),

	);
}
