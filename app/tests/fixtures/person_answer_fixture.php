<?php
/* PersonAnswer Fixture generated on: 2011-09-12 15:32:24 : 1315852344 */
class PersonAnswerFixture extends CakeTestFixture {
	var $name = 'PersonAnswer';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'result_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'answer_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'importance' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'result_id' => 1,
			'answer_id' => 1,
			'importance' => 1,
			'created' => '2011-09-12 15:32:24'
		),
	);
}
