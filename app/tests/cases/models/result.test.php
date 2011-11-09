<?php
/* Result Test cases generated on: 2011-09-12 15:42:06 : 1315852926*/
App::import('Model', 'Result');

class ResultTestCase extends CakeTestCase {
	var $fixtures = array('app.result', 'app.person', 'app.candidate', 'app.election', 'app.user', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.person_answer', 'app.answer', 'app.question', 'app.category', 'app.result_detail', 'app.weight');

	function startTest() {
		$this->Result =& ClassRegistry::init('Result');
	}

	function endTest() {
		unset($this->Result);
		ClassRegistry::flush();
	}

}
