<?php
class Candidate extends AppModel {
	var $name = 'Candidate';
	var $displayField = 'name';
	var $actsAs = array(
		'Utils.Sluggable' => array(
		    'label' => 'name'
		)
	    );
	var $validate = array(
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
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Weight' => array(
			'className' => 'Weight',
			'foreignKey' => 'candidate_id',
			'dependent' => true,
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
	var $belongsTo = array(
		'Election' => array(
			'className' => 'Election',
			'foreignKey' => 'election_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasOne = array(
		'CandidateProfile'=>array(
		    'dependent'	=> true
		)
	    );
	function getProfile($candidateId){
	    $this->CandidateProfile->Behaviors->attach('Containable');
	    $profile = $this->CandidateProfile->find('first',
		    array(
			'conditions'=>array(
			    'candidate_id'=>$candidateId
			    ),
			'contain'=>array('Candidate','CandidateLink','CandidateParty','CandidateUniversityStudy','CandidateWorkExperience')
			)
		    );
	    $idProfile = $profile['CandidateProfile']['id'];
	    $politicalExperiences = $this->CandidateProfile->CandidatePoliticalExperience->find('all',
		    array(
			'conditions'=>array(
			    'candidate_profile_id'=>$idProfile
			),
			'order'=>array('CandidatePoliticalExperience.type','CandidatePoliticalExperience.ending_year DESC')
		    )
		);
	    Configure::load('medianaranja');
	    $possibleTypes = Configure::read('PoliticalExperience.types');
	    $orderedPoliticalExperiences = array();
	    foreach ($politicalExperiences as $experience) {
		$type = $experience['CandidatePoliticalExperience']['type'];
		$typeDescription = $possibleTypes[$type];
		$orderedPoliticalExperiences[$type]['description'] = $typeDescription;
		$orderedPoliticalExperiences[$type]['experiences'][] = $experience['CandidatePoliticalExperience'];
	    }
	    $profile['CandidatePoliticalExperience'] = $orderedPoliticalExperiences;

	    return $profile;
	}

	function afterFind($results) {
	    foreach ($results as $key => $val) {
		    if (isset($val['Candidate']) && isset($val['Candidate']['imagepath'])) {
			if (!$this->isUrl($results[$key]['Candidate']['imagepath'])) {
			    $results[$key]['Candidate']['imagepath'] = 'candidate/imagepath/'.$results[$key]['Candidate']['imagepath'];
			}

		    }
	    }
	    return $results;
	}

	function isUrl($url) {
	    $info = parse_url($url);
	    return (isset($info['scheme'])&& isset($info['host']))&&($info['scheme']=='http'||$info['scheme']=='https')&&$info['host']!="";
	}

	function compatibility($idCandidate,$categories){
            $candidate = $this->findById($idCandidate);
	    $electionId = $candidate['Candidate']['election_id'];
            $result = array();
            $categoriesFromDatabase = $this->Weight->Question->Category->getAll(
		    $electionId,
                    array(
                            'id'=>array_keys($categories['Category'])
                        )
                );
            foreach($categories['Category'] as $idCategory=>$category){
                $questionIds = array();
                foreach($category['Question'] as $idQuestion=>$question){
                    $questionIds[]=$idQuestion;
                }
                $weights = $this->Weight->find(
                    'all',
                    array(
                        'conditions'=>array(
                            'candidate_id'=>$idCandidate,
                            'question_id'=>$questionIds
                            )
                        )
                    );
                $categoryResult = $categoriesFromDatabase[$idCategory];
                $categoryResult['Category']['afinity'] = $this->Weight->Question->Category->calculateAfinity($weights,$category);
                $result[$idCategory] = $categoryResult;
            }
            return $result;
        }
	
	function calculateTotalAfinity($data){
            $totalImportancesTimesWeight = 0;
	    $totalImportances = 0;
            foreach($data as $category){
                $totalImportancesTimesWeight += $category['Category']['afinity']['importancesTimesWeights'];
		$totalImportances += $category['Category']['afinity']['importances'];
            }
            if ( $totalImportances==0 ) {
                return 0;
            }
            return ($totalImportancesTimesWeight/$totalImportances)*100;
        }
}
