<?php
/* Candidate Test cases generated on: 2011-09-09 14:38:36 : 1315589916*/
App::import('Model', 'Candidate');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}

class CandidateTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Candidate =& ClassRegistry::init('Candidate');
	}

	function endTest() {
		unset($this->Candidate);
		ClassRegistry::flush();
	}
	function testCandidateCompatibility(){
            $data = array(
                'Category'=>array(
                    1=>array(
                        'Question'=>array(
                            1=>array(
                                'Answer'=>1,
                                'Percentage'=>0.5
                                ),
			    //it is important to notice that the second question is not answered because it
			    //was never shown in the form, this was because the'included_in_media_naranja'
			    //field in this case is 0 or false
                        )
                    ),
                    2=>array(
                        'Question'=>array(
                            3=>array(
                                'Answer'=>5,
                                'Percentage'=>0.5
                                ),
                            4=>array(
                                'Answer'=>7,
                                'Percentage'=>0.5
                                ),
                        )
                    )
                    )
                );
            $idCandidate = 1;

            $result = $this->Candidate->compatibility($idCandidate,$data);
            $expected = array(
                1=>array(
                    'Category'=>array(
                        'id'=>1,
			'election_id'=>1,
			'slug'=>'numeros-imaginarios',
                        'name'=>'numeros imaginarios',
                        'sort'=>1,
                        'afinity'=>array(
				'importancesTimesWeights'=>0.5,//(1*0.5)
				'importances'=>0.5,//(0.5)
				'percentage'=>100
			    )
                        )
                    ),
                2=>array(
                    'Category'=>array(
                        'id'=>2,
			'election_id'=>1,
			'slug'=>'numeros-reales',
                        'name'=>'numeros reales',
                        'sort'=>2,
                        'afinity'=>array(
				'importancesTimesWeights'=>1,//(1*0.5)+(1*0.5)
				'importances'=>1,//(0.5+0.5)
				'percentage'=>100
			    )
                        )
                    )
            );
            $this->assertEqual($result,$expected);
        }
	function testCalculateTotalAfinity(){
            $data = array(
                1=>array(
                    'Category'=>array(
                        'id'=>1,
                        'name'=>'numeros imaginarios',
                        'afinity'=>array(
				'importancesTimesWeights'=>0.5,//(1*0.5)
				'importances'=>0.5,//(0.5)
				'percentage'=>100
			    )
                        )
                    ),
                2=>array(
                    'Category'=>array(
                        'id'=>2,
                        'name'=>'numeros reales',
                        'afinity'=>array(
				'importancesTimesWeights'=>1,//(1*0.5)+(1*0.5)
				'importances'=>1,//(0.5+0.5)
				'percentage'=>100
			    )
                        )
                    )
            );
            $expected = 100;
            $result = $this->Candidate->calculateTotalAfinity($data);
            $this->assertEqual($expected,$result);
        }

}
