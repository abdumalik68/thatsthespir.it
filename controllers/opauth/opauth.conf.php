<?php
/**
 * Opauth basic configuration file to quickly get you started
 * ==========================================================
 * To use: rename to opauth.conf.php and tweak as you like
 * If you require advanced configuration options, refer to opauth.conf.php.advanced
 */

$config = array(
/**
 * Path where Opauth is accessed.
 *  - Begins and ends with /
 *  - eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'
 *  - if Opauth is reached via http://auth.example.org/, path is '/'
 */
	'path' => '/auth/',

/**
 * Callback URL: redirected to after authentication, successful or otherwise
 */
	'callback_url' => '{path}callback',

	'callback_transport' => 'session',
	
/**
 * A random string used for signing of $auth response.
 * 
 * NOTE: PLEASE CHANGE THIS INTO SOME OTHER RANDOM STRING
 */
	'security_salt' => 'LDFmiilYf8Fyw5W10DSFLMSKJFDSF9234304W1KsVrieQCnpBzzpTBWA5vJidQKDx8pMJbmw28R1C4m',
		
/**
 * Strategy
 * Refer to individual strategy's documentation on configuration requirements.
 * 
 * eg.
 * 'Strategy' => array(
 * 
 *   'Facebook' => array(
 *      'app_id' => 'APP ID',
 *      'app_secret' => 'APP_SECRET'
 *    ),
 * 
 * )
 *
Facebook app:
https://developers.facebook.com/apps/381323445386729/dashboard/

google app:
https://console.developers.google.com/project/thats-the-spirit/apiui/credential

twitter app:
https://apps.twitter.com/app/8399745
Github app:
https://github.com/settings/applications/208551


 */
	'Strategy' => array(
		// Define strategies and their respective configs here
		
		'Facebook' => array(
			'app_id' => '381323445386729',
			'app_secret' => '70a7e4b4f18643bd5f44851ab637d845',
			'scope'=>'email'
		),
		'Facebook-test' => array(
			// TEST FB APP
			'app_id' => '381324232053317',
			'app_secret' => '5b2f8e894723cc831f9d5c51e73f46d7',
			'strategy_class' => 'Facebook',
			'strategy_url_name' => 'facebook-test',
			'scope'=>'email'
		),	

		'Google' => array(
			'client_id' => '673306183223-0ft3a8jd9icav8l0ida4rhtg0vn847g3.apps.googleusercontent.com',
			'client_secret' => 'ArQphOkW_M93XKWi0gWL6uRX',
			'scope' => 'email'
		),
		
		'Twitter' => array(
			'key' => '4GPxkkexLCBntwO9Lq879H9SD',
			'secret' => 'flkYZYLTJLEo5nofHj98ClejMqjXeiFJZ1wuHOgxSKq08yfMIa'
		),	
		
		'GitHub' => array(
			'client_id' => '44ccee421e44fbee93ce',
			'client_secret' => 'd577497f887b5002e146ef03c14636b7113967b3',
			'scope'=>'user:email'
		),				
	),
);