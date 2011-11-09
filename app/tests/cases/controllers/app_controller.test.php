<?php
App::import('Controller', 'App');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}


class TestAppController extends AppController {
	var $autoRender = false;
	var $redirectUrl = null;
	var $stopped = false;
	var $uses = array();

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
/**
 * Description of app_controller
 *
 * @author feli
 */
class AppControllerTestCase extends ApplicationTestCase {

	function startTest() {
		$this->App =& new TestAppController();
		$this->App->constructClasses();
	}

	function endTest() {
		if ($this->App->Session->check('Auth.User')) {
		    $this->App->Session->delete('Auth.User');
		}
		$this->App->Session->delete('Auth.redirect');
		unset($this->App);
		ClassRegistry::flush();
	}
	function testCheckIfAdminWithAnAdmin() {
	    $this->App->Session->write('Auth.User', array(
		'id' => 1,
		'username' => 'notTheOwner',
		'admin' => true
	    ));
	    $this->App->params['admin'] = true;
	    $this->App->params['user'] = 'usuario1';
	    $this->App->params['election'] = 'eleccion_uno';
	    $this->App->beforeFilter();
	    $this->assertNull($this->App->redirectUrl);
	}
	function testCheckIfAdminWithANonAdmin() {
	    $this->App->Session->write('Auth.User', array(
		'id' => 2,
		'username' => 'notTheOwner',
		'admin' => false
	    ));
	    $this->App->params['admin'] = true;
	    $this->App->params['user'] = 'usuario1';
	    $this->App->params['election'] = 'eleccion_uno';
	    $this->App->beforeFilter();
	    $this->assertEqual(array('controller'=>'account','action'=>'login'),$this->App->redirectUrl);

	}
	function testCheckIfAdminWithANonLoggedUser() {
	    $this->App->params['admin'] = true;
	    $this->App->params['user'] = 'usuario1';
	    $this->App->params['election'] = 'eleccion_uno';
	    $this->App->beforeFilter();
	    $this->assertEqual(array('controller'=>'account','action'=>'login'),$this->App->redirectUrl);

	}
	function testAllowsCertainActionsWithNoElections(){
	    $this->App->params['admin'] = true;
	    //$this->App->params['election'] = 'eleccion_uno';//THIS ACTION DOESN'T REQUIRE AN ELECTION
	    $this->App->beforeFilter();
	    $this->assertEqual(array('controller'=>'account','action'=>'login'),$this->App->redirectUrl);
	}
	function testSetElection(){
	    $this->App->beforeFilter();
	    $this->App->params['user'] = 'usuario1';
	    $this->App->params['election'] = 'eleccion_uno';
	    $this->App->_setElection();
	    $this->assertEqual($this->App->electionId,1);
	}
	function testSetSecondElection(){
	    $this->App->beforeFilter();
	    $this->App->params['user'] = 'usuario1';
	    $this->App->params['election'] = 'eleccion_dos';
	    $this->App->_setElection();
	    $this->assertEqual($this->App->electionId,2);
	}
}

?>
