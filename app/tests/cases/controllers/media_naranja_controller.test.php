<?php
/* Elections Test cases generated on: 2011-09-07 15:10:59 : 1315419059*/
App::import('Controller', 'MediaNaranja');
App::import('Vendor', 'facebook/facebook');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class TestMediaNaranjaController extends MediaNaranjaController {
	var $autoRender = false;
	var $redirectUrl = null;
	var $stopped = false;
	function _connectToFacebookOrLogin(){
	    return '1234567890';
	}
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

class MediaNaranjaControllerTestCase extends ApplicationTestCase {
    var $testDataThatIsCorrect = array(
	'Category'=>array(
	    1=>array(
		'Question' => array(
		    1=>array(
			'Answer'=>1,
			'Percentage'=>0.1

		    ),
		)
	    ),
	    2=>array(
		'Question' => array(
		    3=>array(
			'Answer'=>5,
			'Percentage'=>0.1
		    ),
		    4=>array(
			'Answer'=>7,
			'Percentage'=>0.1
		    )
		)
	    )
	)
    );
    var $testDataThatIsIncorrect = array(
	'Category'=>array(
	    1=>array(
		'Question' => array(
		    1=>array(
			'Answer'=>1,
			'Percentage'=>0.1

		    ),
		)
	    )
	)
    );
    function startTest() {
	    $this->MediaNaranja =& new TestMediaNaranjaController();
	    $this->MediaNaranja->constructClasses();
    }

    function endTest() {
	    if ($this->MediaNaranja->Session->check('Auth.User')) {
		$this->MediaNaranja->Session->delete('Auth.User');
	    }
	    $this->MediaNaranja->Session->delete('Auth.redirect');
	    unset($this->MediaNaranja);
	    ClassRegistry::flush();
    }
    function testIndex(){

	$this->MediaNaranja->params['user'] = 'usuario1';
	$this->MediaNaranja->params['election'] = 'eleccion_uno';
	$this->MediaNaranja->beforeFilter();
	$this->MediaNaranja->index();
	$this->assertEqual(2,count($this->MediaNaranja->viewVars['categories']));
    }
    function testChecksFormWasAnsweredCorrectly(){
	$result = $this->MediaNaranja->_answeredCorrectly($this->testDataThatIsCorrect);
	$this->assertTrue($result);
    }
    function testReturnsFalseIfFormWasNotComplete(){
	$result = $this->MediaNaranja->_answeredCorrectly($this->testDataThatIsIncorrect);
	$this->assertFalse($result);
    }
    function testVota() {

	$this->MediaNaranja->data = $this->testDataThatIsCorrect;
	$this->MediaNaranja->params['user'] = 'usuario1';
	$this->MediaNaranja->params['election'] = 'eleccion_uno';
	$this->MediaNaranja->beforeFilter();
	$this->MediaNaranja->vota();
	$this->assertEqual('resultado',$this->MediaNaranja->renderedAction);
    }
}
?>
