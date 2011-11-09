<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $layout = 'no_election';
	function myAccount(){
	    $this->loadModel('Election');
	    $elections = $this->Election->listAllForUser($this->Auth->user('id'));
	    $this->set('elections',$elections);
	}
}