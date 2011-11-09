<?php
class PersonAnswer extends AppModel {
	var $name = 'PersonAnswer';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Result' => array(
			'className' => 'Result',
			'foreignKey' => 'result_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'answer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
