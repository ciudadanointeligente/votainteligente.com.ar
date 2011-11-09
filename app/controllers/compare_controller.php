<?php
class CompareController extends AppController {

	var $name = 'Compare';
        var $uses = array('Candidate','Category');
	var $layout = 'compare_layout';
	var $helpers = array('Time');
	var $components = array(
	'Auth'=>array(
	    'allowedActions' => array('index','getComparisonAddress','showCandidateBasicProfile')
	));

	function beforeFilter(){
	    parent::beforeFilter();
	    $this->_setElection();
	}

        function index(){
	    $data = null;
	    if(isset($this->params['candidatesAndCategory'])) {
		$data = $this->params['candidatesAndCategory'];
	    }
	    $this->_setCategories();
	    $this->_setCandidates();
	    if (!is_null($data)) {
		$elements = $this->_decodeData($data);
		$haveCandidatesAndCategoryBeenSelected = !is_null($elements);
		if ($haveCandidatesAndCategoryBeenSelected){
		    $this->_setSelectedCandidatesAndCategory($elements);
		}
	    }
	    $this->set("title_for_layout",'Comparar candidatos');
        }

	function _setCategories(){
	    $this->Category->recursive = -1;
	    $categories = $this->Category->getAll($this->electionId);
            $this->set('categories',$categories);
	    if (!empty($categories)) {
		reset($categories);
		$current = current($categories);
		$this->set('categoryId',$current['Category']['id']);
	    }
	}

	function _setSelectedCandidatesAndCategory($elements){
	    $firstCandidate = $elements['firstCandidate'];
	    $this->set('firstCandidate',$firstCandidate);
	    $this->set("title_for_layout",'Comparar candidatos');
	    if (isset($elements['secondCandidate'])) {
		$secondCandidate = $elements['secondCandidate'];
		$this->set('secondCandidate',$secondCandidate);
		$this->set('categoryId',$elements['categoryId']);
		$this->set('redirectAgain',false);
		$this->_compare($firstCandidate['Candidate']['id'],$secondCandidate['Candidate']['id'],$elements['categoryId']);
	    }
	}

        function _compare($firstCandidateId,$secondCandidateId,$categoryId){
            $questions         = $this->Category->Question->findAllForCompare($categoryId);
            $category          = $this->Category->find('first',array('fields'=>array('id','name'),'conditions'=>array('id'=>$categoryId)));
            $idsQuestion       = array();
            foreach ($questions as $question) {
                $idsQuestion[] = $question['Question']['id'];
            }
            $weightsOfBothCandidates    = array();
            $this->Category->Question->Weight->getWeightsForQuestionsForACandidate($weightsOfBothCandidates,$idsQuestion,$firstCandidateId);
            $this->Category->Question->Weight->getWeightsForQuestionsForACandidate($weightsOfBothCandidates,$idsQuestion,$secondCandidateId);
            $this->set('idFirstCandidate',$firstCandidateId);
            $this->set('idSecondCandidate',$secondCandidateId);
            $this->set('weights',$weightsOfBothCandidates);
            $this->set('category',$category);
            $this->set('questions',$questions);
	    $this->render('compare');
        }

	function _comparisonDataChecker($data){
	    $dataRight = preg_match('/[a-z\-\0-9]+_vs_[a-z\-\0-9]+_en_[a-z\-\0-9]+/', $data,$matches);
	    if (!$dataRight || count($matches)>1) {
		return false;
	    }
	    return true;
	}

	function _decodeData($data){
	    if(!$this->_comparisonDataChecker($data)){
		$firstCandidate = $this->Candidate->findBySlug($data);
		if (!empty($firstCandidate)) {
		    return array(
			'firstCandidate'=>$firstCandidate
		    );
		}
		return Null;
	    }
	    $elements = explode('_en_', $data,2);
	    $candidates = $elements[0];
	    $categorySlug = $elements[1];
	    $candidates = explode('_vs_',$candidates,2);
	    $firstCandidate = $this->Candidate->findBySlug($candidates[0]);
	    $secondCandidate = $this->Candidate->findBySlug($candidates[1]);
	    $category = $this->Category->findBySlug($categorySlug);
	    if ( empty($firstCandidate) || empty($secondCandidate) || empty($category)) {
		return null;
	    }
	    return array(
		'firstCandidate'=>$firstCandidate,
		'secondCandidate'=>$secondCandidate,
		'categoryId'=>$category['Category']['id']
	    );
	}

	function _encodeData($firstCandidateId,$secondCandidateId,$categoryId){
	    $firstCandidate = $this->Candidate->findById($firstCandidateId);
	    $secondCandidate = $this->Candidate->findById($secondCandidateId);
	    $category = $this->Category->findById($categoryId);
	    $data = $firstCandidate['Candidate']['slug'].'_vs_'.$secondCandidate['Candidate']['slug'].'_en_'.$category['Category']['slug'];
	    $url = Router::url('/'.$this->electionUser['User']['username'].'/'.$this->electionSlug.'/compare/'.$data);
	    $this->set('url',$url);
	}

	function getComparisonAddress(){
	    $this->layout = 'script';
	    $firstCandidateId  = $this->data['firstCandidate'];
            $secondCandidateId = $this->data['secondCandidate'];
            $categoryId        = $this->data['category'];
	    $this->_encodeData($firstCandidateId,$secondCandidateId,$categoryId);
	}

	function showCandidateBasicProfile(){
	    $this->layout = 'script';
	    $candidateId = $this->params['idCandidate'];
	    $this->Candidate->Behaviors->attach('Containable');
	    $this->Candidate->contain('CandidateProfile');
	    $candidate = $this->Candidate->findById($candidateId);
	    $this->set('candidate',$candidate);
	}
}
