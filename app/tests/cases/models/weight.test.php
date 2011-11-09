<?php
/* Weight Test cases generated on: 2011-09-12 15:27:02 : 1315852022*/
App::import('Model', 'Weight');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class WeightTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Weight =& ClassRegistry::init('Weight');
	}

	function endTest() {
		unset($this->Weight);
		ClassRegistry::flush();
	}

	function testGetWeightsForQuestionsForACandidate(){
	    $weights = array();
	    $this->Weight->getWeightsForQuestionsForACandidate($weights,array(1,2),1);//Avoid triadic
	    $expected = array(
		1=>array(//question with id 1
		    1=>array( //answer with id 1
			1 //first Candidate
		    )
		),
		2=>array( // question with id 2
		    3=>array( //answer with id 3
			1 //candidate
		    )
		)
	    );
	    $this->assertEqual($expected,$weights);
	}
	function testGetWeightsForQuestionsForTwoCandidates(){
	    $weights = array();
	    /*
	     * Weights Ordered by question and answer should be appended
	     * in this array
	     */
	    $this->Weight->getWeightsForQuestionsForACandidate($weights,array(1,2),1);//Avoid triadic
	    $this->Weight->getWeightsForQuestionsForACandidate($weights,array(1,2),2);//Avoid triadic
	    $expected = array(
		1=>array(//question with id 1
		    1=>array( //answer with id 1
			1 //first Candidate said answer 1 for question 1
		    ),
		    2=>array(
			2 //second candidate said 2 for question 1
		    )
		),
		2=>array( // question with id 2
		    3=>array( //answer with id 3
			1 //candidate said that answer 3 for question 1
		    ),
		    4=>array(
			2 //candidate with id 2 said answer 4 for question 2
		    )
		)
	    );
	    $this->assertEqual($expected,$weights);
	}

}
