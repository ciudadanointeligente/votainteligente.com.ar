<?php
class Election extends AppModel {
	var $name = 'Election';
	var $displayField = 'name';
	var $actsAs = array(
	    'Utils.Sluggable' => array(
		'label' => 'name'
	    )
	    );
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
	    'Candidate' => array(
			'className' => 'Candidate',
			'foreignKey' => 'election_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	function listAllForUser($idUser) {
	    $elections = $this->find('all',array('conditions'=>array('user_id' => $idUser)));
	    return $elections;
	}
	function AmIOwnerOfThisElection($idElection,$idUser){
	    $amI = $this->find('count',array('conditions'=>array('id'=>$idElection,'user_id'=>$idUser)));
	    return $amI;
	}
	function getElectionWithCandidates($electionSlug,$username){
	    $this->Behaviors->attach('Containable');
	    $this->contain(array('Candidate'));
	    $user_id = $this->User->field('id',array('username'=>$username));

	    return $this->find('first',array(
		'conditions' => array(
		    'slug' => $electionSlug,
		    'user_id' => $user_id
		)
		));
	}
}
