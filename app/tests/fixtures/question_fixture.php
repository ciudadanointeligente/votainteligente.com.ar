<?php
/* Question Fixture generated on: 2011-09-12 15:37:49 : 1315852669 */
class QuestionFixture extends CakeTestFixture {
	var $name = 'Question';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'question' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'explanation' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'short_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'sour' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'public' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'included_in_media_naranja' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'order' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'question' => '¿que piensas de los numeros imaginarios dibujados en un plano cartesiano?',
			'category_id' => 1,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>1,
			'public' => 1,
			'included_in_media_naranja' => 1,
		),
		array(
			'id' => 2,
			'question' => '¿un numero imaginario es par o impar??',
			'category_id' => 1,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>2,
			'public' => 1,
			'included_in_media_naranja' => 0,
		),
                array(
			'id' => 3,
			'question' => '¿es PI un numero par o impar?',
			'category_id' => 2,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>3,
			'public' => 1,
			'included_in_media_naranja' => 1,
		),
                array(
			'id' => 4,
			'question' => '¿una serie (que representa un numero real) geometrica es par?',
			'category_id' => 2,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>4,
			'public' => 1,
			'included_in_media_naranja' => 1,
		),
                array(
			'id' => 5,
			'question' => 'Esta es una pregunta no publica',
			'category_id' => 2,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>5,
			'public' => 0,
			'included_in_media_naranja' => 1,
		),
		array(
			'id' => 6,
			'question' => 'Esta es una pregunta fome',
			'category_id' => 3,
			'explanation'=>'blah',
			'short_description'=>'blah',
                        'order'=>1,
			'public' => 1,
			'included_in_media_naranja' => 1,
		),

	);
}
