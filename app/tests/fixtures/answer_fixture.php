<?php
/* Answer Fixture generated on: 2011-09-12 15:27:45 : 1315852065 */
class AnswerFixture extends CakeTestFixture {
	var $name = 'Answer';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'answer' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'answer' => 'esta bien eso para verlo de manera grafica pero no se demuestra la imparidad de los numeros imaginarios',
			'question_id' => 1,
		),
                array(
			'id' => 2,
			'answer' => 'me gusta!! por que tienen un numero par de ejes',
			'question_id' => 1,
		),
                array(
			'id' => 3,
			'answer' => 'impar',
			'question_id' => 2,
		),
                array(
			'id' => 4,
			'answer' => 'par',
			'question_id' => 2,
		),
                array(
			'id' => 5,
			'answer' => 'impar',
			'question_id' => 3,
		),
                array(
			'id' => 6,
			'answer' => 'par',
			'question_id' => 3,
		),
                array(
			'id' => 7,
			'answer' => 'impar',
			'question_id' => 4,
		),
                array(
			'id' => 8,
			'answer' => 'par',
			'question_id' => 4
		),
	);
}
