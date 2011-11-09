<?php
/* Elections Test cases generated on: 2011-09-07 15:10:59 : 1315419059*/
App::import('Controller', 'PublicElections');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class TestPublicElectionsController extends PublicElectionsController {
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

class PublicElectionsControllerTestCase extends ApplicationTestCase {

	function startTest() {
		$this->PublicElections =& new TestPublicElectionsController();
		$this->PublicElections->constructClasses();
	}

	function endTest() {
		if ($this->PublicElections->Session->check('Auth.User')) {
		    $this->PublicElections->Session->delete('Auth.User');
		}
		$this->PublicElections->Session->delete('Auth.redirect');
		unset($this->PublicElections);
		ClassRegistry::flush();
	}
	function testSetsTheCandidatesForThisElection(){
	    $result = $this->testAction('/usuario1/eleccion_uno',array(
		'return' => 'vars'
	    ));
	    $candidates = $result['election']['Candidate'];
	    $this->assertEqual(2,count($candidates));
	}

}
