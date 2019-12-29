<?php

define('SERVER', 'dev');

switch (SERVER) {

    case 'dev':
        define('WWWROOT', 'http://localhost:8000');
        define('DB_NAME', 'thatsthespirit');
        define('DB_USER', 'pixeline');
        define('DB_PASSWORD', 'Q5p2HqJcjaDaLqep');
        define('DB_HOST', 'mysql');
        define('DEBUG', 9);
        break;

    default:
        define('WWWROOT', 'https://thatsthespir.it');
        define('DB_NAME', 'thatsthespirit');
        define('DB_USER', 'ttspirit');
        define('DB_PASSWORD', 'Q5p2HqJcjaDaLqep');
        define('DB_HOST', 'mysql');
        define('DEBUG', 0);

        break;
}
//define('SALT',crypt('I am so In l0ve with you, dudette!'));
define('UPLOADS', 'uploads/');

define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'aplennevaux@gmail.com');
define('SMTP_PORT', 465);
define('SMTP_PROTOCOL', 'SSL');
define('SMTP_PASSWORD', 'W3 Are tHe Kings0f RGB!');
