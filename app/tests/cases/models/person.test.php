<?php
/* Person Test cases generated on: 2011-09-12 15:31:43 : 1315852303*/
App::import('Model', 'Person');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class PersonTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Person =& ClassRegistry::init('Person');
	}

	function endTest() {
		unset($this->Person);
		ClassRegistry::flush();
	}


	function testSaveUserAndResult() {
	    $userData = array(
		'idfacebook' => '560973905'
	    );
	    $winner = array(
		'Candidate'=>array(
		    'id'=>1,
		    'total'=>50
		),
		'afinity' => array(
		    1=>array(
			'Category'=>array(
			    'id'=>1,
			    'slug'=>'numeros-imaginarios',
			    'election_id' => 1,
			    'name' => 'numeros imaginarios',
			    'sort' => 1,
			    'afinity' => array(
				'importancesTimesWeights' => 0.1,
				'importances' => 0.2,
				'percentage' => 50,
			    )
			)
		    ),
		    2=> array(
			'Category' => array(
			    'id' => 2,
			    'election_id' => 1,
			    'slug'=>'numeros-reales',
			    'name' => 'numeros reales',
			    'sort' => 2,
			    'afinity' => array(
				'importancesTimesWeights' => 0.1,
				'importances' => 0.2,
				'percentage' => 50,
			    )
			)
		    )
		)
	    );
	    $answers = array(
		'Category' => array(
		    1 => array(
			'Question'=>array(
			    1=>array(
				'Answer'=>1,
				'Percentage'=>1
			    )
			)
		    ),
		    2 => array(
			'Question' => array(
			    3=>array(
				'Answer'=>5,
				'Percentage'=>1
			    ),
			    4 => array(
				'Answer'=>7,
				'Percentage'=>1
			    )
			)
		    )
		)
	    );
	    $this->Person->saveUserAndResult($winner,$answers,$userData);
	    $this->Person->Result->Behaviors->attach('Containable');
	    $this->Person->Result->contain('PersonAnswer','ResultDetail');
	    $this->Person->Result->recursive = 2;
	    $result = $this->Person->Result->findByPersonId($this->Person->id);
	    $this->assertEqual(3,count($result['PersonAnswer']));//3 is the amount of answered questions
	    $this->assertEqual(2,count($result['ResultDetail']));//2 is the amount of categories

	}

}
