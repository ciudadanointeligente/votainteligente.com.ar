<?php
/* CandidatePoliticalExperience Test cases generated on: 2011-09-12 13:14:55 : 1315844095*/
App::import('Model', 'CandidatePoliticalExperience');

class CandidatePoliticalExperienceTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_political_experience', 'app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_link', 'app.candidate_party', 'app.candidate_university_study', 'app.candidate_work_experience');

	function startTest() {
		$this->CandidatePoliticalExperience =& ClassRegistry::init('CandidatePoliticalExperience');
	}

	function endTest() {
		unset($this->CandidatePoliticalExperience);
		ClassRegistry::flush();
	}

}
