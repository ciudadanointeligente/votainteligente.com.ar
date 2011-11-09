<?php
/* PersonAnswer Test cases generated on: 2011-09-12 15:32:24 : 1315852344*/
App::import('Model', 'PersonAnswer');

class PersonAnswerTestCase extends CakeTestCase {
	var $fixtures = array('app.person_answer', 'app.result', 'app.answer', 'app.question', 'app.weight', 'app.candidate', 'app.election', 'app.user', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.person');

	function startTest() {
		$this->PersonAnswer =& ClassRegistry::init('PersonAnswer');
	}

	function endTest() {
		unset($this->PersonAnswer);
		ClassRegistry::flush();
	}

}
