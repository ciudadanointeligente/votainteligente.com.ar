<?php
class MediaNaranjaController extends AppController {

	var $name = 'MediaNaranja';
	var $uses = array();
	var $components = array(
	    'Cookie',
	    'Auth'=>array(
		'allowedActions' => array('index','vota','confirm')
	));
	function beforeFilter(){
	    parent::beforeFilter();
	    $this->_setElection();
	}
	function _setFacebookData(){
	    Configure::load('facebook');
	    $this->FACEBOOK_APP_ID = Configure::read('Facebook.APP_ID');
	    $this->FACEBOOK_SECRET = Configure::read('Facebook.SECRET');
	    $this->FACEBOOK_APP_URL = Configure::read('Facebook.APP_URL');
	    $this->set('facebookAppId',$this->FACEBOOK_APP_ID);
	    $this->set('facebookAppUrl',$this->FACEBOOK_APP_URL);
	}
	function index(){
		$this->_setFacebookData();
		$this->layout = 'voto';
		$this->loadModel('Category');
		$categories = $this->Category->findAllForMediaNaranja($this->electionId);
		$this->set('height',Configure::read('Facebook.MEDIANARANJA.form.height'));
		$this->set('categories', $categories);
                $this->render('index');
	}
	function vota(){
	    $this->_setFacebookData();
                $hasBeenAsweredCorrectly = $this->_answeredCorrectly($this->data);
                if(!$hasBeenAsweredCorrectly){
                    $this->redirect('/'.$this->electionUser['User']['username'].'/'.$this->electionSlug.'/media_naranja');
                    return;
                }
                $categories = $this->data;
                $this->helpers[]= 'Number';
                $this->helpers[]= 'Percentage';
		$this->layout = 'resultado';
                $afinity = $this->_getAfinityByCandidate($categories);
		$this->_determineWinner($afinity);
		$this->set('height',Configure::read('Facebook.MEDIANARANJA.result.height'));
		$this->render('resultado');

	}
	function _getAfinityByCandidate($categories){
	    $this->loadModel('Candidate');
	    $candidates = $this->Candidate->find('all',array('conditions'=>array('election_id'=>$this->electionId)));
	    $afinity = array();
	    foreach($candidates as $candidate){
		$idCandidate = $candidate['Candidate']['id'];
		$afinityWithThisCandidate = $this->Candidate->compatibility($idCandidate,$categories);
		$candidate['afinity'] = $afinityWithThisCandidate;
		$candidate['Candidate']['total'] = $this->Candidate->calculateTotalAfinity($afinityWithThisCandidate);
		$afinity[] =$candidate;
	    }
	    return $afinity;
	}
	function _determineWinner($afinity) {
	    usort($afinity,array("MediaNaranjaController","_orderCandidates"));
	    $winner = $afinity[0];
	    unset($afinity[0]);
	    $this->set('winner',$winner);
	    $this->set('others',$afinity);
	    $this->_saveUserWithWinner($winner);
	}
	function _saveUserWithWinner($winner){
	    $this->loadModel('Person');
	    $userData = array('idfacebook'=>null);
	    if (isset($this->facebookUserId)) {
		$userData['idfacebook'] = $this->facebookUserId;
	    }
	    $idPerson = $this->Person->saveUserAndResult($winner,$this->data,$userData);
	    $this->_prepareFacebookWallPublication($winner);
	    $this->set('person_id',$idPerson);
	}
	function _answeredCorrectly($data){
	    if (empty($data)) {
		return false;
	    }
	    $this->loadModel('Question');
	    $amountOfQuestionsThatShouldHaveBeenAnswered = $this->Question->find('count',array(
		'conditions' => array(
		    'public'=>1,
		    'included_in_media_naranja'=>1
		    )
		));
	    $amountOfQuestionsActuallyAnswered = 0;
	    foreach ($data['Category'] as $category){
		foreach ($category['Question'] as $question) {
		    if (isset($question['Answer']) && !is_null($question['Answer'])) {
			$amountOfQuestionsActuallyAnswered ++;
		    }
		}
	    }
	    if ($amountOfQuestionsActuallyAnswered == $amountOfQuestionsThatShouldHaveBeenAnswered) {
		return true;
	    }
	    return false;

	}
        function _orderCandidates($candidateA,$candidateB){
            return $candidateB['Candidate']['total'] - $candidateA['Candidate']['total'];
        }
        function confirm(){
	    $this->layout = 'script';
            $this->loadModel('Person');
            $this->Person->save($this->data);
        }
	function _prepareFacebookWallPublication($winner){
	    $title = Configure::read('Facebook.MEDIANARANJA.wall.name');
	    $title = sprintf($title, $winner['Candidate']['name']);
	    $facebookWallPublication = array(
		'title'=>$title,
		'caption'=>Configure::read('Facebook.MEDIANARANJA.wall.caption'),
		'image'=>$winner['Candidate']['imagepath'],
		'image_link'=>$winner['Candidate']['imagepath'],//it should link to the candidates profile
		'text'=>Configure::read('Facebook.MEDIANARANJA.wall.action_link.text'),
		'href'=>Configure::read('Facebook.MEDIANARANJA.wall.action_link.href'),
	    );
	    $this->set('facebookWallPublication',$facebookWallPublication);
	}

}
?>