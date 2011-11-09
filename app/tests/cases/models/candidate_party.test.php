<?php
/* CandidateParty Test cases generated on: 2011-09-12 13:13:22 : 1315844002*/
App::import('Model', 'CandidateParty');

class CandidatePartyTestCase extends CakeTestCase {
	var $fixtures = array('app.candidate_party', 'app.candidate_profile', 'app.candidate', 'app.election', 'app.user', 'app.candidate_link', 'app.candidate_political_experience', 'app.candidate_university_study', 'app.candidate_work_experience');

	function startTest() {
		$this->CandidateParty =& ClassRegistry::init('CandidateParty');
	}

	function endTest() {
		unset($this->CandidateParty);
		ClassRegistry::flush();
	}

}
