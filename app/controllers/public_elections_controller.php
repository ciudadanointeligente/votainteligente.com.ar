<?php
class PublicElectionsController extends AppController {

	var $name = 'PublicElections';
	var $components = array(
	'Auth'=>array(
	    'allowedActions' => array('index','view')
	));
	var $uses = array('Election');

	function index() {
	    $this->layout = 'no_election';
		$this->Election->recursive = 0;
		$this->set('elections', $this->paginate());
	}

	function view($slug = null) {
		$this->_setElection();
		$this->layout = 'profile_layout';

	}

}
