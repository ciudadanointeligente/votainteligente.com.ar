<?php
/* FacebookDetail Test cases generated on: 2011-09-14 15:35:19 : 1316025319*/
App::import('Model', 'FacebookDetail');

class FacebookDetailTestCase extends CakeTestCase {
	var $fixtures = array('app.facebook_detail', 'app.election', 'app.user', 'app.candidate', 'app.candidate_profile', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience', 'app.weight', 'app.question', 'app.category', 'app.result_detail', 'app.result', 'app.person', 'app.person_answer', 'app.answer', 'app.source_of_answer');

	function startTest() {
		$this->FacebookDetail =& ClassRegistry::init('FacebookDetail');
	}

	function endTest() {
		unset($this->FacebookDetail);
		ClassRegistry::flush();
	}

}
