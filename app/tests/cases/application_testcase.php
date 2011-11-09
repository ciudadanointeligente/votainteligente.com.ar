<?php
SimpleTest::ignore('ApplicationTestCase');

/**
 * App Test case. Contains base set of fixtures.
 *
 */
class ApplicationTestCase extends CakeTestCase {
    var $fixtures = array('app.election', 'app.user', 'app.candidate','app.category', 'app.question',
	'app.result_detail','app.answer','app.candidate_link','app.candidate_party',
	'app.candidate_political_experience','app.candidate_profile','app.candidate_university_study',
	'app.candidate_work_experience','app.result','app.candidate_link','app.person_answer','app.person','app.question'
	,'app.result_detail','app.weight','app.source_of_answer','app.facebook_detail');
    function before($method) {
	$readableTestName = $this->readableTestName($method);
	if ($readableTestName) {
	    echo $readableTestName.'<br />';
	}

	parent::before($method);
    }
    function readableTestName($name){
	if (substr($name,0,4)=='test') {
	    return $this->putSpacesBetweenName(substr($name,4));
	}
	return false;
    }
    function putSpacesBetweenName($nameWithoutSpaces){
	$string = preg_replace('/((?<=[0-9])|(?=[A-Z]))/',' ', $nameWithoutSpaces);
	return $string;
    }
}
?>
