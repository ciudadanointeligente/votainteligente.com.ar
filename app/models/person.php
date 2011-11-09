<?php
class Person extends AppModel {
	var $name = 'Person';
	var $displayField = 'idfacebook';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Candidate' => array(
			'className' => 'Candidate',
			'foreignKey' => 'candidate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasOne = array(
		'Result' => array(
			'className' => 'Result',
			'foreignKey' => 'person_id',
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

	function saveUser($data){
            $this->create($data);
            $this->set('date',date('Y-m-d H:i:s') );
            $this->save();
        }

	function saveUserAndResult($winner,$answers,$userData){
            $userData['candidate_id']=$winner['Candidate']['id'];
            $this->saveUser($userData);
	    $resultId = $this->saveResult($winner,$answers);
	    $this->saveAnswers($answers,$resultId);
            return $this->id;
        }

	function saveResult($winner,$answers){
	    $this->Result->create();
            $this->Result->set('person_id',$this->id);
            $this->Result->set('candidate_id',$winner['Candidate']['id']);
            $this->Result->set('result',$winner['Candidate']['total']);
            $this->Result->save();
            $this->saveResultDetails($winner);
	    return $this->Result->id;
	}

	function saveResultDetails($winner){
	    $resultDetails = array();
            foreach($winner['afinity'] as $category){
                $resultDetails[]=array(
                    'ResultDetail'=>array(
                        'result_id'=>$this->Result->id,
                        'category_id'=>$category['Category']['id'],
                        'result'=>$category['Category']['afinity']['percentage']
                    )
                );
            }
            $this->Result->ResultDetail->saveAll($resultDetails);

	}
	
        function saveAnswers($data,$result_id){
            $answers = array();
            foreach($data['Category'] as $category){
                foreach($category['Question'] as $question){
                    if(isset($question['Answer'])&&$question['Answer']!=0){
                        $answers[]=array(
                            'PersonAnswer'=>array(
                                'result_id'=>$result_id,
                                'answer_id'=>$question['Answer'],
                                'importance'=>$question['Percentage'],
                            )
                        );
                    }
                }
            }
            $personAnswer =& ClassRegistry::init('PersonAnswer');
            $personAnswer->saveAll($answers);

        }

}
