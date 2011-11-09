<?php
/* Candidates Test cases generated on: 2011-09-09 15:11:33 : 1315591893*/
App::import('Controller', 'Candidates');

class TestCandidatesController extends CandidatesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CandidatesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate', 'app.election', 'app.user');

	function startTest() {
		$this->Candidates =& new TestCandidatesController();
		$this->Candidates->constructClasses();
	}

	function endTest() {
		unset($this->Candidates);
		ClassRegistry::flush();
	}

}
