<?php
/* Category Test cases generated on: 2011-09-12 15:29:43 : 1315852183*/
App::import('Model', 'Category');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class CategoryTestCase extends ApplicationTestCase {
	var $weightsForOneCandidate = array(
                0=>array(
                    'Weight'=>array(
                        'id' => 1,
                        'question_id' => 1,
                        'candidate_id' => 1,
                        'answer_id' => 1,
                        'weighting' => 1,
                    )
                ),
                1=>array(
                    'Weight'=>array(
                        'id' => 2,
                        'question_id' => 2,
                        'candidate_id' => 1,
                        'answer_id' => 3,
                        'weighting' => 1,
                    )
                ),
                2=>array(
                    'Weight'=>array(
                        'id' => 3,
                        'question_id' => 2,
                        'candidate_id' => 1,
                        'answer_id' => 4,
                        'weighting' => 0.5,
                    )
                ),
                3=>array(
                    'Weight'=>array(
                        'id' => 4,
                        'question_id' => 1,
                        'candidate_id' => 1,
                        'answer_id' => 2,
                        'weighting' => 0.5,
                    )
                ),
                4=>array(
                    'Weight'=>array(
                        'id' => 5,
                        'question_id' => 2,
                        'candidate_id' => 1,
                        'answer_id' => 5,
                        'weighting' => 0,
                    )
                ),
                5=>array(
                    'Weight'=>array(
                        'id' => 6,
                        'question_id' => 1,
                        'candidate_id' => 1,
                        'answer_id' => 6,
                        'weighting' => 0,
                    )
                )
            );
	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}
	function testGetAll(){
	    $idElection = 1;
            $result = $this->Category->getAll($idElection);
            $expected = array(
                1=>array(
                    'Category'=>array(
                        'id'=>1,
			'election_id' =>1,
			'slug'=>'numeros-imaginarios',
                        'name'=>'numeros imaginarios',
                        'sort'=>1,
                        )
                    ),
                2=>array(
                    'Category'=>array(
                        'id'=>2,
			'election_id' =>1,
			'slug'=>'numeros-reales',
                        'name'=>'numeros reales',
                        'sort'=>2,
                        )
                    )
            );
            $this->assertEqual($result,$expected);
        }
	function testShowsOnlyPublicQuestionsInMediaNaranja(){
	    $electionId = 1;
	    $categoriesAndQuestions = $this->Category->findAllForMediaNaranja($electionId);
	    $nonPublicQuestions = 0;
	    foreach($categoriesAndQuestions as $category) {
		foreach($category['Questions'] as $question) {
		    $isThisQuestionNonPublic = !$question['Question']['public'];
		    if ($isThisQuestionNonPublic) {
			$nonPublicQuestions++;
		    }
		}
	    }
	    $this->assertEqual(0,$nonPublicQuestions);
	}
	function testShowsOnlyPublicQuestionsInProfile(){
	    $idElection = 1;
	    $categoriesAndQuestions = $this->Category->getAllCategoriesAndQuestionsForCandidate($idElection,1);
	    $nonPublicQuestions = 0;
	    foreach($categoriesAndQuestions as $category) {
		foreach($category['Question'] as $question) {
		    $isThisQuestionNonPublic = !$question['public'];
		    if ($isThisQuestionNonPublic) {
			$nonPublicQuestions++;
		    }
		}
	    }
	    $this->assertEqual(0,$nonPublicQuestions);
	}

	function testGetAllForElection(){
	    $categories = $this->Category->findAllForElection(1);
	    $this->assertEqual(2,count($categories));
	}
	function testCalculateAfinityWithACandidateWithAHundredPercent(){
            $answersAndPercentages = array(
                'Question'=>array(
                        1=>array(
                            'Answer'=>1,
                            'Percentage'=>1
                        ),
                        2=>array(
                            'Answer'=>3,
                            'Percentage'=>1
                        )
                    )
            );
            $result = $this->Category->calculateAfinity($this->weightsForOneCandidate,$answersAndPercentages);
            $expected = array(
		'importancesTimesWeights'=>2,
		'importances'=>2,
		'percentage'=>100
	    );
            $this->assertEqual($result,$expected);
        }
	function testGetOnlyQuestionsForTheCurrentElection() {
	    $questions =  $this->Category->getAllCategoriesAndQuestionsForCandidate(3);
	    $this->assertEqual(3,$questions[0]['Category']['id']);
	    $this->assertEqual(6,$questions[0]['Question'][0]['id']);
	}
        function testCalculateAfinityWithACandidateWithASeventyFivePercent(){

            $answersAndPercentages = array(
                'Question'=>array(
                        1=>array(
                            'Answer'=>1,
                            'Percentage'=>0.5
                        ),
                        2=>array(
                            'Answer'=>4,
                            'Percentage'=>0.5
                        )
                    )
            );
            $result = $this->Category->calculateAfinity($this->weightsForOneCandidate,$answersAndPercentages);
            $expected = array(
		'importancesTimesWeights'=>0.75,
		'importances'=>1,
		'percentage'=>75
	    );
            $this->assertEqual($result,$expected);
        }
        function testCalculateAfinityWithACandidateWithAZeroPercent(){

            $answersAndPercentages = array(
                'Question'=>array(
                        1=>array(
                            'Answer'=>5,
                            'Percentage'=>0.5
                        ),
                        2=>array(
                            'Answer'=>6,
                            'Percentage'=>0.5
                        )
                    )
            );
            $result = $this->Category->calculateAfinity($this->weightsForOneCandidate,$answersAndPercentages);
            $expected = array(
		'importancesTimesWeights'=>0,//Us vs the candidates importances vs candidate
		'importances'=>1,//sum of the users percentages
		'percentage'=>0
	    );
            $this->assertEqual($result,$expected);
        }

}
