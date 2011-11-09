<?php
class Category extends AppModel {
	var $name = 'Category';
	var $displayField = 'name';
	var $validate = array(
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sort' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
	    'Election' => array(
			'className' => 'Election',
			'foreignKey' => 'election_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ResultDetail' => array(
			'className' => 'ResultDetail',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function getAll($electionId,$extraConditions=array()){
	    $conditions = array(
		'election_id' => $electionId
	    );
	    $conditions = array_merge($conditions,$extraConditions);
            $categoriesFromDatabase = $this->find(
                    'all',
                    array(
                        'conditions'=>$conditions
                    )
                );
            $result = array();
            foreach($categoriesFromDatabase as $category){
                $idCategory = $category['Category']['id'];
                $result[$idCategory]=$category;
            }
            return $result;
        }

	function findAllForElection($electionId) {
	    return $this->findAllWithConditions(array('election_id'=>$electionId));
	}

	function findAllForMediaNaranja($electionId){
	    return $this->findAllWithConditions(array(
		'election_id'=>$electionId,
		'included_in_media_naranja '=>1));
	}

	function findAllWithConditions($electionId,$conditionsForQuestions = array()){
	    $this->recursive = -1;
	    $categories = $this->find('all',
                    array(
                        'conditions'=>array(
					'election_id' => $electionId
				    )
                    ));
	    $categoriesResult = array();
	    foreach ($categories as $category){
		    $questionsInThisCategory = $this->Question->findAllWithConditions($category['Category']['id'],$conditionsForQuestions);
		    $areThereQuestions = count($questionsInThisCategory)>0;
		    if($areThereQuestions){
			    $category['Questions']=$questionsInThisCategory;
			    $categoriesResult[]=$category;
		    }
	    }
	    return $categoriesResult;
	}

	function getAllCategoriesAndQuestionsForCandidate($candidateId){
	    $this->Behaviors->attach('Containable');
	    $candidatesElectionId = $this->Election->Candidate->field('election_id',array('id'=>$candidateId));
	    $contain = array(
		'Question'=>array(
		    'Answer'=>array(
			'Weight'=>array(
			    'SourceOfAnswer',
			    'conditions'=>array(
				'Weight.candidate_id ='=>$candidateId
				),
			    )
			),
		    'conditions'=>array('public'=>1)
		    )
		);
	    $categories = $this->find('all',array('contain'=>$contain,'conditions'=>array('election_id'=>$candidatesElectionId)));
	    foreach ($categories as $key => $category){
		if (empty($category['Question'])) {
		    unset($categories[$key]);
		}
	    }
	    return $categories;
	}

	function calculateAfinity($weightsForThisCandidate,$answersAndPercentages){
            $totalAfinity = 0;
            $importancesTimesWeights = 0;
            $importances = 0;
            foreach($answersAndPercentages['Question'] as $idQuestion=>$answer){
                if(!isset($answer['Answer'])){
                    $answer['Answer']=0;
                }
                $importance = $answer['Percentage'];

                $weight = 0;
                foreach($weightsForThisCandidate as $weightForThisCandidate){
                    $isThisTheRightWeight = ($weightForThisCandidate['Weight']['question_id']==$idQuestion)&&($weightForThisCandidate['Weight']['answer_id']==$answer['Answer']);
                    if($isThisTheRightWeight){
                        $weight = $weightForThisCandidate['Weight']['weighting'];
                        break;
                    }
                }
                $importancesTimesWeights += $importance*$weight;
                $importances += $importance;
            }
            $totalAfinity = ($importancesTimesWeights/$importances)*100;
	    return array(
		'importancesTimesWeights'=>$importancesTimesWeights,
		'importances'=>$importances,
		'percentage'=>$totalAfinity
	    );
        }
}
