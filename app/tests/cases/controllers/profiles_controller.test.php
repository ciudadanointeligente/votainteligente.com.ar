<?php
/* Elections Test cases generated on: 2011-09-07 15:10:59 : 1315419059*/
App::import('Controller', 'Profiles');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class TestProfilesController extends ProfilesController {
	var $autoRender = false;
	var $redirectUrl = null;
	var $stopped = false;

	function redirect($url, $status = null, $exit = true) {
	    if(!$this->stopped){
		$this->redirectUrl = $url;
		$this->_stop();
	    }

	}

	function render($action = null, $layout = null, $file = null) {
	    $this->renderedAction = $action;
	}

	function _stop($status = 1) {
	    $this->stopped = $status;

	}
}
class ProfilesControllerTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Profiles =& new TestProfilesController();
		$this->Profiles->constructClasses();
	}

	function endTest() {
		if ($this->Profiles->Session->check('Auth.User')) {
		    $this->Profiles->Session->delete('Auth.User');
		}
		$this->Profiles->Session->delete('Auth.redirect');
		unset($this->Profiles);
		ClassRegistry::flush();
	}
	
	function testGetTheRightCandidatesForThisElection(){
	    $this->Profiles->params['user'] = 'usuario1';
	    $this->Profiles->params['election'] = 'eleccion_uno';
	    $this->Profiles->beforeFilter();
	    $this->Profiles->_setCandidates();
	    $candidatesForThisElection = $this->Profiles->viewVars['candidates'];
	    $this->assertEqual(2,count($candidatesForThisElection));

	}
}
?>