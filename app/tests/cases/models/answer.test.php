<?php
/* Answer Test cases generated on: 2011-09-12 15:27:45 : 1315852065*/
App::import('Model', 'Answer');

class AnswerTestCase extends CakeTestCase {
	var $fixtures = array('app.answer', 'app.question', 'app.weight', 'app.candidate', 'app.election', 'app.user', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.person', 'app.person_answer');

	function startTest() {
		$this->Answer =& ClassRegistry::init('Answer');
	}

	function endTest() {
		unset($this->Answer);
		ClassRegistry::flush();
	}

}
