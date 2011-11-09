<?php
/* Elections Test cases generated on: 2011-09-07 15:10:59 : 1315419059*/
App::import('Controller', 'UserElections');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class TestUserElectionsController extends UserElectionsController {
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

class UserElectionsControllerTestCase extends ApplicationTestCase {

	function startTest() {
		$this->UserElections =& new TestUserElectionsController();
		$this->UserElections->constructClasses();
	}

	function endTest() {
		if ($this->UserElections->Session->check('Auth.User')) {
		    $this->UserElections->Session->delete('Auth.User');
		}
		$this->UserElections->Session->delete('Auth.redirect');
		unset($this->UserElections);
		ClassRegistry::flush();
	}
}
?>