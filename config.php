<?php

// Editable lines
define("TIME_ZONE", "");

if ($_SERVER['SERVER_PORT'] === 443) {
	define(
		'WEB_ADDRESS',
		'https://' . $_SERVER["HTTP_HOST"]
	);
}
else{
	define(
		'WEB_ADDRESS',
		'http://' . $_SERVER["HTTP_HOST"]
	);
}

define("LOWERCHARS", "abcdefghijklmnopqrstuvwxyz");
define("UPPERCHARS", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
define("NUMBERCHARS", "0123456789");
define("OTHERCHARS", " .-_");
define("BASICCHARS", LOWERCHARS . UPPERCHARS . NUMBERCHARS);
define("ALLCHARS", BASICCHARS . OTHERCHARS);

define("SALT","");

/**
 *  database config variable
 */
define("HOST_NAME", 'localhost');
define("USER_NAME", 'root');
define("USER_PASSWORD", '');
define("DB_NAME", '');