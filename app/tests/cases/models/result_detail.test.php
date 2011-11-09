<?php
/* ResultDetail Test cases generated on: 2011-09-12 15:39:31 : 1315852771*/
App::import('Model', 'ResultDetail');

class ResultDetailTestCase extends CakeTestCase {
	var $fixtures = array('app.result_detail', 'app.result', 'app.category', 'app.question', 'app.answer', 'app.weight', 'app.candidate', 'app.election', 'app.user', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.person', 'app.person_answer');

	function startTest() {
		$this->ResultDetail =& ClassRegistry::init('ResultDetail');
	}

	function endTest() {
		unset($this->ResultDetail);
		ClassRegistry::flush();
	}

}
