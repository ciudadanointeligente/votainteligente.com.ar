<?php
class AppController extends Controller {
    // AppController's components are NOT merged with defaults,
    // so session component is lost if it's not included here!
    var $components = array(
	    'Cookie','Twitter',
	    'Auth'=>array(
		'loginAction'=>array(
		    'controller' => 'account',
		    'action' => 'login'
		)
	    ),
	    'Session');

    function beforeFilter(){
	$this->_setUser();
	$this->_checkAdmin();
    }

    protected function _setUser(){
	$this->set('user',$this->Auth->user());
    }

    protected function _checkAdmin(){
	$isAskingAdmin = isset($this->params['admin']) && $this->params['admin'];
	$userIsAdmin = $this->Auth->user('admin');//We could also check in the database if this user is an admin
	if($isAskingAdmin && !$userIsAdmin) {
	    $this->Session->setFlash(__('You need to be Admin to access', true));
	    $this->redirect(array('controller'=>'account','action'=>'login'));
	}

    }

    function _setElection(){
	$electionSlug = $this->params['election'];
	$username = $this->params['user'];
	if (!$electionSlug || !$username) {
	    $this->redirect('/');
	}
	$this->loadModel('Election');
	$election = $this->Election->getElectionWithCandidates($electionSlug,$username);
	$exists = !empty($election);
	if ($exists) {
	    $user = $this->Election->User->findByUsername($username);
	    $this->electionUser = $user;
	    $this->set('electionUser',$user);
	    $this->set('election', $election);
	    $this->electionId = $election['Election']['id'];
	    $this->electionSlug = $electionSlug;

	    $this->set('electionSlug',$electionSlug);
	}
	else {
	    $this->Session->setFlash(__('Invalid election', true));
	    $this->redirect('/');
	}
    }

    function _setCandidates(){
	$candidates = $this->Candidate->find('all',array('conditions'=>array('election_id'=>$this->electionId)));
	$this->set('candidates',$candidates);
    }
}
?>
