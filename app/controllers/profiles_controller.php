<?php
class ProfilesController extends AppController {

	var $name = 'Profiles';
	var $uses = array('Candidate');
	var $layout = 'profile_layout';
	var $helpers = array('Time');
	var $components = array(
	    'Auth'=>array(
		'allowedActions' => array('index','view')
	    ));

	function beforeFilter() {
	    parent::beforeFilter();
	    $this->_setElection();
	    $this->_setCandidates();
	}

	function index(){
	}

	function view($candidateSlug){
	    $candidate = $this->Candidate->findBySlug($candidateSlug);
	    $this->set("title_for_layout",'Perfil de '.$candidate['Candidate']['name']);
	    if(empty($candidate)){
		$this->render('error');
	    }
	    $candidateId = $candidate['Candidate']['id'];
	    $candidateProfile = $this->Candidate->getProfile($candidateId);
	    $this->set('profile',$candidateProfile);
	    $this->_getCandidatesAnswer($candidateId);
	}

	function _getCandidatesAnswer($candidateId){
	    $categories = $this->Candidate->Weight->Question->Category->getAllCategoriesAndQuestionsForCandidate($candidateId);
	    $this->set('categories',$categories);
	}
}