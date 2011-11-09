<?php
class CandidateWorkExperience extends AppModel {
	var $name = 'CandidateWorkExperience';
	var $displayField = 'company';
	var $validate = array(
		'position' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'company' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CandidateProfile' => array(
			'className' => 'CandidateProfile',
			'foreignKey' => 'candidate_profile_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
