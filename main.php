<?php

/**
 * Iron Elephant
 * @version 1.0.1
 */

// Import config file for default settings
require_once "config.php";
require_once "alternative_func.php";
require_once "core/heart.php";

use IronElephant\File;


/**
 * @var mixed $my_php_version Get php version
 */
$my_php_version = phpversion("core");
$my_php_version = (float) substr($my_php_version, 0, 3);

/**
 * @var int $minimum_php_version Minimum php version to run library
 */
$minimum_php_version = MINIMUM_PHP_VERSION;


/**
 * Check minimum version requirement to run this library
 */
if ($my_php_version < $minimum_php_version) {
	echo "Whoops!!! your php is very old please install higher version :" . PHP_EOL;
	echo "your php version is : $my_php_version" . PHP_EOL;
	echo "require version least $minimum_php_version " . PHP_EOL;
	die();
}

/**
 * Set error handler for try catch
 */
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

/**
 * Set a defualt time zone
 */
date_default_timezone_set(TIME_ZONE);

/**
 * @var string WEB_ADDRESS Create const web address
 */
if ($_SERVER['SERVER_PORT'] === 443) {
	define(
		'WEB_ADDRESS',
		'https://' . $_SERVER["HTTP_HOST"]
	);
} else {
	define(
		'WEB_ADDRESS',
		'http://' . $_SERVER["HTTP_HOST"]
	);
}
