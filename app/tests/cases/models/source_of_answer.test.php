<?php
/* SourceOfAnswer Test cases generated on: 2011-09-12 17:09:35 : 1315858175*/
App::import('Model', 'SourceOfAnswer');

class SourceOfAnswerTestCase extends CakeTestCase {
	var $fixtures = array('app.source_of_answer', 'app.weight', 'app.question', 'app.category', 'app.result_detail', 'app.result', 'app.person', 'app.candidate', 'app.election', 'app.user', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.person_answer', 'app.answer');

	function startTest() {
		$this->SourceOfAnswer =& ClassRegistry::init('SourceOfAnswer');
	}

	function endTest() {
		unset($this->SourceOfAnswer);
		ClassRegistry::flush();
	}

}
