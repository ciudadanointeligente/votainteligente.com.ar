<?php
/* CandidateLink Test cases generated on: 2011-09-12 13:12:18 : 1315843938*/
App::import('Model', 'CandidateLink');

class CandidateLinkTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_link', 'app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience');

	function startTest() {
		$this->CandidateLink =& ClassRegistry::init('CandidateLink');
	}

	function endTest() {
		unset($this->CandidateLink);
		ClassRegistry::flush();
	}

}
