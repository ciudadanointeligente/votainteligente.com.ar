<?php
/* CandidateProfile Test cases generated on: 2011-09-12 13:05:51 : 1315843551*/
App::import('Model', 'CandidateProfile');

class CandidateProfileTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience');

	function startTest() {
		$this->CandidateProfile =& ClassRegistry::init('CandidateProfile');
	}

	function endTest() {
		unset($this->CandidateProfile);
		ClassRegistry::flush();
	}

}
