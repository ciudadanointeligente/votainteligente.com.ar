<?php
/* CandidateWorkExperience Test cases generated on: 2011-09-12 13:17:53 : 1315844273*/
App::import('Model', 'CandidateWorkExperience');

class CandidateWorkExperienceTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_work_experience', 'app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_link', 'app.candidate_party', 'app.candidate_political_experience', 'app.candidate_university_study');

	function startTest() {
		$this->CandidateWorkExperience =& ClassRegistry::init('CandidateWorkExperience');
	}

	function endTest() {
		unset($this->CandidateWorkExperience);
		ClassRegistry::flush();
	}

}
