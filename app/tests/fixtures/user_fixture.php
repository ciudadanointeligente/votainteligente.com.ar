<?php
/* User Fixture generated on: 2011-09-07 11:13:13 : 1315404793 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'admin' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'twitter' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'twitter_oauth_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'facebook_access_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'username' => 'usuario1',
			'password' => 'Lorem ipsum dolor sit amet',
			'admin'=>true,
			'name' => 'pepito',
			'twitter' => 'Lorem ipsum dolor sit amet',
			'twitter_oauth_token' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 'Lorem ipsum dolor sit amet',
			'facebook_name' => 'Lorem ipsum dolor sit amet',
			'facebook_access_token' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'username' => 'Non admin user',
			'password' => 'Lorem ipsum dolor sit amet',
			'admin'=>false,
			'name' => 'Quiero ser admin pero no puedo',
			'twitter' => 'Lorem ipsum dolor sit amet',
			'twitter_oauth_token' => 'Lorem ipsum dolor sit amet',
			'facebook_id' => 'Lorem ipsum dolor sit amet',
			'facebook_name' => 'Lorem ipsum dolor sit amet',
			'facebook_access_token' => 'Lorem ipsum dolor sit amet'
		),
	);
}
