<?php
//error_reporting(E_WARNING | E_ERROR);
global $db;

$provider_name = $f3->get('PARAMS.action');

if(empty($provider_name)){
	die("no provider");
}

try {

	$config_file_path = dirname(__FILE__) .'/hybridauth/config.php';
	//require_once dirname(__FILE__) ."/hybridauth/Hybrid/Auth.php";

	$hybridauth = new Hybrid_Auth( $config_file_path );

	// try to authenticate with the selected provider
	$adapter = $hybridauth->authenticate( $provider_name );
	// then grab the user profile
	$user_profile = $adapter->getUserProfile();



	$username = trim($user_profile->email);

	$user = new DB\SQL\Mapper($db, 'users');
	$user->load(array('email = :username LIMIT 0,1', ':username'=>$username));
	$new = false;
	if($user->dry()){
		$user->role='subscriber';
		$user->created= date('Y-m-d H:i:s');
		$new= true;
	}
	$user->fullname= (!empty($user_profile->displayName)) ?  $user_profile->displayName : preg_replace('/([^@]*).*/', '$1', $user->email);
	$user->email = (!empty($username)) ? $username : $user->fullname ;
	$username= $user->email;
	$user->image= $user_profile->photoURL;
	$user->password =$provider_name;
	$user->save();
	$user = new DB\SQL\Mapper($db, 'users');
	$user->load(array('email = :username LIMIT 0,1', ':username'=>$username));
	
	if($new){
		// Email to admin
		$smtp = new SMTP ( SMTP_HOST , SMTP_PORT, SMTP_PROTOCOL, SMTP_USER, SMTP_PASSWORD );

		$smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
		$smtp->set('To', '<aplennevaux@gmail.com>');
		$smtp->set('Subject', "That's The Spirit: New user registration!");
		$smtp->set('Errors-to', '<alexandre@pixeline.be>');

		$message = 'On '.date('d.m.Y at H:i:s').', a new user registered, kind master.'."\n---\n";
		$message .= "email: ". $user->email . "\nname:".$user->fullname;
		$message .="\n---\nSee you,\n\nThe Spirit.";
		$sent = $smtp->send($message, TRUE);
	}

	$f3->set('SESSION.logged_in', 'ok');
	$_SESSION['logged_in']= 'ok';
	
	$_SESSION['user'] = array('id'=> $user->id, 'email'=>$user->email, 'fullname'=>$user->fullname, 'role'=>$user->role, 'image'=> $user->image, 'urls'=> json_decode($user->urls));

	if(!empty($f3->get('SESSION.next_action'))){

		switch($f3->get('SESSION.next_action')){

		case 'like':

			$fav = new DB\SQL\Mapper($db, 'favourites');
			$fav->quote_id = $f3->get('SESSION.quote_id') ;
			$fav->user_email = $username;
			$fav->save();

			$f3->set('SESSION.goto', '/quote/view/'.$f3->get('SESSION.quote_id'));

			break;
		}
		$f3->clear('SESSION.next_action');
		$f3->clear('SESSION.quote_id');
	}


	if(!empty($f3->get('SESSION.goto'))){
		$f3->reroute($f3->get('SESSION.goto'));
		$f3->clear('SESSION.goto');

	}else{
		$f3->reroute('/');
	}
}
catch( Exception $e ){
	//header("Location: /login-error.php");
	//echo '<pre>';
	// var_dump($e);
	$smtp = new SMTP ( SMTP_HOST , SMTP_PORT, SMTP_PROTOCOL, SMTP_USER, SMTP_PASSWORD );

	$smtp->set('From', '"pixeline" <alexandre@pixeline.be>');
	$smtp->set('To', '<aplennevaux@gmail.com>');
	$smtp->set('Subject', "That's The Spirit: User opauth Error! ");
	$smtp->set('Errors-to', '<alexandre@pixeline.be>');

	$message = 'On '.date('d.m.Y at H:i:s').', an error occured:.'."\n---\n";
	$message .= "email: ". $user->email . "\nname:".$user->fullname. "<pre>";
	$message .= print_r($e, true);
	$message .="<br>\n---\nSee you,\n\nThe Spirit.";
	$sent = $smtp->send($message, TRUE);
}
