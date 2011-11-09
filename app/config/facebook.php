<?php
/**
  * Get an api_key and secret from facebook and fill in this content.
  * save the file to app/config/facebook.php
  */
$config = array(
  'Facebook' => array(
  	'appId' => '207065096023211',
    'secret' => '6c7a372f41b7d7299ce7ec67231eb771',
    'cookie' => true,
    'locale' => 'en_US',
  )
);
$config['Facebook']['APP_ID']	= '176181905778804';
$config['Facebook']['SECRET']	= 'ca36c95de87db93df8d0a83d8537759e';
$config['Facebook']['APP_URL']	= 'http://apps.facebook.com/medianaranjatest/';
$config['Facebook']['MEDIANARANJA']['form']['height'] = 3100;
$config['Facebook']['MEDIANARANJA']['result']['height'] = 1790;
$config['Facebook']['MEDIANARANJA']['wall']['name'] = 'Mi media naranja política es %s';
$config['Facebook']['MEDIANARANJA']['wall']['caption'] = 'blablablabla';
$config['Facebook']['MEDIANARANJA']['wall']['action_link']['text'] = 'Fundación ciudadano inteligente';
$config['Facebook']['MEDIANARANJA']['wall']['action_link']['href'] = 'http://www.ciudadanointeligente.cl/';
?>