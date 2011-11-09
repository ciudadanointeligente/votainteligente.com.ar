<?php
/* Category Fixture generated on: 2011-09-12 15:29:43 : 1315852183 */
class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'election_id' => array('type' => 'integer', 'null' => false, 'default' => NULL,),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sort' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'slug'=>'numeros-imaginarios',
			'election_id' => 1,
			'name' => 'numeros imaginarios',
                        'sort' => 1
		),
            array(
			'id' => 2,
			'election_id' => 1,
			'slug'=>'numeros-reales',
			'name' => 'numeros reales',
                        'sort' => 2
		),
            array(
			'id' => 3,
			'election_id' => 2,
			'slug'=>'cosas-fomes',
			'name' => 'cosas fomisismas',
                        'sort' => 1
		),
	);
}
