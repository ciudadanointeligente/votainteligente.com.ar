<?php
/* CandidateUniversityStudy Test cases generated on: 2011-09-12 13:16:00 : 1315844160*/
App::import('Model', 'CandidateUniversityStudy');

class CandidateUniversityStudyTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_university_study', 'app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_work_experience');

	function startTest() {
		$this->CandidateUniversityStudy =& ClassRegistry::init('CandidateUniversityStudy');
	}

	function endTest() {
		unset($this->CandidateUniversityStudy);
		ClassRegistry::flush();
	}

}
