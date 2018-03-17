<?php
if ($f3->get('SESSION.logged_in') == 'ok'){
	$f3->reroute('/');
}

global $db, $metatags;
// sanitization
$username = trim(htmlspecialchars($f3->get('POST.username')));
$password = trim(htmlspecialchars($f3->get('POST.password')));
// validation
$errors = array();
if(empty($username)){
	$errors['username'] = 'Please indicate your username';
}
if(empty($password)){
	$errors['password'] = 'Please indicate your password';
}
if(count($errors)<1){
	// check for user
	$user = new DB\SQL\Mapper($db, 'users');
	$user->load(array('email = :username and password = :password  LIMIT 0,1', ':username'=>$username, ':password'=>$password));
	if($db->count()==1){
		$f3->set('SESSION.logged_in', 'ok');
		$f3->set('SESSION.user',  array('email'=>$user->email, 'fullname'=>$user->fullname, 'role'=>$user->role));
		
		pr( $f3->get('SESSION.goto') );
		
		if(!empty($f3->get('SESSION.goto'))){
			$url = $f3->get('SESSION.goto');
			$f3->set('SESSION.goto', '');
			$f3->reroute($url);
		}else{
			$f3->reroute('/');
		}
	}
} else{
	$f3->set('SESSION.errors', $errors);
}
$f3->reroute('@login');