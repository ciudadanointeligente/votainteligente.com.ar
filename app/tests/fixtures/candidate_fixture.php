<?php
/* Candidate Fixture generated on: 2011-09-09 14:38:36 : 1315589916 */
class CandidateFixture extends CakeTestFixture {
	var $name = 'Candidate';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'election_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'imagepath' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'election_id' => 1,
			'name' => 'candidato1',
			'slug' => 'candidato1',
			'imagepath' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'election_id' => 1,
			'name' => 'candidato2',
			'slug' => 'candidato2',
			'imagepath' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'election_id' => 2,
			'name' => 'candidato3',
			'slug' => 'candidato3',
			'imagepath' => 'Lorem ipsum dolor sit amet'
		),
	);
}
