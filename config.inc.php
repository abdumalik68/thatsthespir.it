<?php

define('SERVER', 'dev');

switch (SERVER){

case 'dev':
	define('WWWROOT', 'http://thatsthespirit.v2');
	define('DB_NAME', 'thatsthespirit');
	define('DB_USER', 'pixeline');
	define('DB_PASSWORD', '5270L');
	define('DB_HOST', 'localhost');
	define('DEBUG', 3);
	break;


default:
	define('WWWROOT', 'http://thatsthespir.it');
	define('DB_NAME', 'XXXXXXX');
	define('DB_USER', 'XXXXXXX');
	define('DB_PASSWORD', 'XXXXXXX');
	define('DB_HOST', 'localhost');
	define('DEBUG', 0);

	break;
}
//define('SALT',crypt('I am so In l0ve with you, dudette!'));
define('UPLOADS', 'uploads/');
