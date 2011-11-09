<?php
/* Question Test cases generated on: 2011-09-12 15:37:49 : 1315852669*/
App::import('Model', 'Question');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class QuestionTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Question =& ClassRegistry::init('Question');
	}

	function endTest() {
		unset($this->Question);
		ClassRegistry::flush();
	}
	function testFindAllWithConditionsForMediaNaranja(){
	    $result = $this->Question->findAllWithConditions(1,array('included_in_media_naranja'=>1));
	    $this->assertEqual(1,count($result));
	}
	function testShowsOnlyPublicQuestionsInComparison() {
	    $questions = $this->Question->findAllForCompare(2);
	    $this->assertEqual(2,count($questions));
	}

}
