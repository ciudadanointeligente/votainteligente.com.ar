<?php
/* Weight Fixture generated on: 2011-09-12 15:27:01 : 1315852021 */
class WeightFixture extends CakeTestFixture {
	var $name = 'Weight';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'candidate_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'answer_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'weighting' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'question_id' => 1,//impar
			'candidate_id' => 1,
			'answer_id' => 1,
			'weighting' => 1
		),
                array(
			'id' => 2,
			'question_id' => 1,
			'candidate_id' => 2,//par
			'answer_id' => 2,
			'weighting' => 1
		),

                //pregunta 2
                array(
			'id' => 3,
			'question_id' => 2,//impar
			'candidate_id' => 1,
			'answer_id' => 3,
			'weighting' => 1
		),
                array(
			'id' => 4,
			'question_id' => 2,
			'candidate_id' => 2,//par
			'answer_id' => 4,
			'weighting' => 1
		),

                //pregunta 3
                array(
			'id' => 5,
			'question_id' => 3,
			'candidate_id' => 1,//impar
			'answer_id' => 5,
			'weighting' => 1
		),
                array(
			'id' => 6,
			'question_id' => 3,
			'candidate_id' => 2,//par
			'answer_id' => 6,
			'weighting' => 1
		),
                //pregunta 4
                array(
			'id' => 7,
			'question_id' => 4,
			'candidate_id' => 1,//impar
			'answer_id' => 7,
			'weighting' => 1
		),
                array(
			'id' => 8,
			'question_id' => 4,
			'candidate_id' => 2,//par
			'answer_id' => 8,
			'weighting' => 1
		),
	);
}
