<?php
class AccountController extends AppController {
    public $components = array(
	    'Auth' => array(
		'allowedActions' => array('login','twitter','twitter_callback','facebook')
		),
	'Twitter'
	    );
    var $uses = array('User');
    var $layout = 'no_election';
    function initialize(&$controller, $settings = array()) {
	// saving the controller reference for later use
	$this->controller =& $controller;
    }
    function login() {
    }
    function logout() {
	$this->redirect($this->Auth->logout());
    }
    public function twitter() {
	Configure::load('twitter');
	$this->Twitter->appSetup(Configure::read('twitter.consumer_key'), Configure::read('twitter.consumer_secret'), true);
	$this->Twitter->connect(Router::url(array('action'=>'twitter_callback'),true));
    }
    public function twitter_callback() {
	if (isset($this->params['url']['denied'])) {
	    $this->redirect('login');
	}
	$this->Twitter->callback($this->params['url']['oauth_token'], $this->params['url']['oauth_verifier']);
	$credentials = $this->Twitter->accountVerifyCredentials();
	$twitterScreenName = $credentials['screen_name'];
	$existingUser = $this->User->find('first',array('conditions'=>array('twitter'=>$twitterScreenName)));
	$data = array(
		'name' => $credentials['name'],
		'twitter' => $twitterScreenName,
		'twitter_oauth_token' => $this->params['url']['oauth_token']
	);
	$this->loginWithOauthUser($existingUser,$data);
    }
    public function facebook(){
	App::import('Vendor', 'facebook/facebook');
	$facebook=new Facebook(array(
	    'appId'=>'207065096023211',
	    'secret'=>'6c7a372f41b7d7299ce7ec67231eb771'
	));
	$user=$facebook->getUser();
	if ($user) {
	    try {
		$user = $facebook->api('/me');
	    } catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	    }
	}
	if ($user) {
	    $data = array(
		'name' => $user['name'],
		'facebook_id'=>$user['id'],
		'facebook_name'=>$user['name'],
		'facebook_access_token'=>$facebook->getAccessToken()
	    );
	    $existingUser=$this->User->findByFacebookId($data['facebook_id']);
	    $this->loginWithOauthUser($existingUser,$data);
	} else {
	    $login_url = $facebook->getLoginUrl(array(
			    'next' => Router::url(array('action'=>'facebook'),true),
			));
	    $this->redirect($login_url);
	}
    }
    public function loginWithOauthUser($existingUser,$data){
	$loggedUser = $this->User->findById($this->Auth->user('id'));
	$isThereAUserAlreadyLogged = !empty($loggedUser);
	if($isThereAUserAlreadyLogged) {
	    $loggedUser['User'] = array_merge($loggedUser['User'],$data);
	    $this->User->save($loggedUser);
	}
	if(empty($existingUser)){
	    if($this->User->save($data)){
		$this->Auth->login($this->User->id);
	    }else{
		$this->Session->setFlash(__('Sorry, we could not save your profile. Please, try again.', true));
		$this->redirect(array('action'=>'login'));
	    }
	}else{
	    $this->Auth->login($existingUser['User']['id']);
	}
	$this->redirect(array('controller'=>'users','action'=>'myAccount'));
    }
}
?>
