<?php
/* Election Test cases generated on: 2011-09-07 11:16:37 : 1315404997*/
App::import('Model', 'Election');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}

class ElectionTestCase extends ApplicationTestCase {
	function startTest() {
		$this->Election =& ClassRegistry::init('Election');
	}
	function endTest() {
		unset($this->Election);
		ClassRegistry::flush();
	}
	function testGetOnlyMyElections(){
	    $myElections = $this->Election->listAllForUser(1);
	    $expected = array(
		0=>array(
		    'Election'=>array(
			'id'=>1,
			'user_id'=>1,
			'name'=>'elección uno',
			'slug'=>'eleccion_uno',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		    )
		),
		1=>array(
		    'Election'=>array(
			'id'=>2,
			'user_id'=>1,
			'name'=>'elección dos',
			'slug'=>'eleccion_dos',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		    )
		)
	    );
	    $this->assertEqual($expected,$myElections);
	}
	function testIfAUserIsOwnerOfAnElection(){
	    $amI = $this->Election->AmIOwnerOfThisElection(2,1);
	    $this->assertTrue($amI);
	}
	function testIfAUserIsNotOwnerOfAnElection(){
	    $amI = $this->Election->AmIOwnerOfThisElection(3,1);
	    $this->assertFalse($amI);
	}
	function testGetElectionAndCandidates(){
	    $electionWithCandidates = $this->Election->getElectionWithCandidates('eleccion_uno','usuario1');
	    $expected = array(
		'Election'=>array(
			'id'=>1,
			'user_id'=>1,
			'name'=>'elección uno',
			'slug'=>'eleccion_uno',
			'start_date' => '2011-09-07',
			'end_date' => '2011-09-07'
		    ),
		'Candidate' => array(
		    0=>array(
			'id' => 1,
			'election_id' => 1,
			'name' => 'candidato1',
			'slug' => 'candidato1',
			'imagepath' => 'candidate/imagepath/Lorem ipsum dolor sit amet'
		    ),
		    1=>array(
			'id' => 2,
			'election_id' => 1,
			'name' => 'candidato2',
			'slug' => 'candidato2',
			'imagepath' => 'candidate/imagepath/Lorem ipsum dolor sit amet'
		    ),
		)
	    );
	    $this->assertEqual($expected,$electionWithCandidates);

	}

}
