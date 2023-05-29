<?php

// Import config file for default settings
require_once "config.php";
use IronElephant\File;
 // check php information and get php version
 $my_php_version = phpversion("core");
 $my_php_version = (float) substr($my_php_version, 0, 3);
 $minimum_php_version = 7.4;
 
 // check minimum version requirement to run this library
 if ($my_php_version < $minimum_php_version) {
	 echo "Whoops!!! your php is very old please install higher version :" . PHP_EOL;
	 echo "your php version is : $my_php_version" . PHP_EOL;
	 echo "require version least $minimum_php_version " . PHP_EOL;
	 die();
 }

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

//Set a defualt time zone

date_default_timezone_set(TIME_ZONE);

function hr()
{
	// Drop a horizontal line
	echo "<hr>";
}
function br()
{
	//Drop a break line
	echo "<br>";
}
function d($data = "d function stop", $line_number = "", $file_name = "")
{
	// show a variable value
	if (!empty($line_number)) {
		# add line number
		$line_number = "<br>Line : " . $line_number;
	}
	if (!empty($file_name)) {
		# add file direction
		$file_name = "<br>File : " . $file_name;
	}
	echo "<pre>";
	echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
	var_dump($data);
	echo "</pre>";
}

function dd($data = "dd function stop", $line_number = "", $file_name = "")
{
	// show a variable value and die
	if (!empty($line_number)) {
		# add line number
		$line_number = "<br>Line : " . $line_number;
	}
	if (!empty($file_name)) {
		# add file direction
		$file_name = "<br>File : " . $file_name;
	}
	echo "<pre>";
	echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
	var_dump($data);
	echo "</pre>";
	die();
}

function dr($data = "dr function stop", $line_number = "", $file_name = "")
{
	// show a 'ARRAY' variable value and die
	// show a variable value and die
	if (!empty($line_number)) {
		# add line number
		$line_number = "<br>Line : " . $line_number;
	}
	if (!empty($file_name)) {
		# add file direction
		$file_name = "<br>File : " . $file_name;
	}
	echo "<pre>";
	echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
	print_r($data);
	echo "</pre>";
	die();
}

function js(string $input)
{
	// Add javaScript code to page
	echo "<script>";
	echo $input;
	echo "</script>";
}

function change_url(string $url = "/", int $statusCode = 303)
{
	// Change URL path with PHP
	header('Location: ' . $url, true, $statusCode);
}


function change_url_html(string $url = "/", int $sec = 0)
{
	// Change URL path with HTML
	echo "<meta http-equiv='refresh' content='$sec; URL=$url' />";
}


function change_url_js_1($url = "/")
{
	// Change URL path with JS
	// Simulate a MOUSE CLICK:
	echo "<script>window.location.href = '$url';</script>";
}

function change_url_js_2($url = "/")
{
	// Change URL path with JS
	// Simulate a HTTP redirect:
	echo "<script>window.location.replace('$url');</script>";
}

function change_url_js_3($url = "/")
{
	// Change URL path with JS
	echo "<script>window.location.assign('$url');</script>";
}

function change_url_full($url = "/")
{
	// Complate Change URL path with another functions
	change_url_html($url);
	change_url_js_1($url);
	change_url_js_2($url);
	change_url_js_3($url);
	change_url($url);
}

function is_post(): bool
{
	// Check request method is POST
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	if ($method === "post") {
		return true;
	}
	return false;
}

function is_get(): bool
{
	// Check request method is GET
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	if ($method === "get") {
		return true;
	}
	return false;
}


function issv(string $name): bool
{
	// check session value
	if (isset($_SESSION["$name"])) {
		return true;
	}
	return false;
}

function esv(string $name)
{
	// If session value is set then will be echo
	if (isset($_SESSION["$name"])) {
		echo $_SESSION["$name"];
	}
}

function rsv(string $name)
{
	// If session value is set then will be retuen
	if (isset($_SESSION["$name"])) {
		return $_SESSION["$name"];
	}
}

function et(string $string)
{
	// check variable for null data
	if (empty(trim($string))) {
		return true;
	}
	return false;
}

function randomatic(string $case = "a", int $length = 1)
{
	// Creare a random string with your pattern and length
	$result = "";

	if ($length < 1) {
		return false;
	}

	$lowerChars = "abcdefghijklmnopqrstuvwxyz";
	$upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$numberChars = "0123456789";
	$allChars = $lowerChars . $upperChars . $numberChars;

	$case = trim(strtolower($case));

	switch ($case) {
		case 'ln':
			$case = "nl";
			break;
		case 'un':
			$case = "nu";
			break;
		case 'ul':
			$case = "lu";
			break;
	}

	// Change argumant to lower case
	switch ($case) {

		case 'l':
			for ($i = 0; $i < $length; $i++)
				$result .= $lowerChars[rand(0, 25)];
			break;

		case 'u':
			for ($i = 0; $i < $length; $i++)
				$result .= $upperChars[rand(0, 25)];
			break;

		case 'n':
			for ($i = 0; $i < $length; $i++)
				$result .= (string)rand(0, 9);
			break;

		case 'nl':
			for ($i = 0; $i < $length; $i++)
				$result .= ($lowerChars . $numberChars)[rand(0, 35)];
			break;

		case 'nu':
			for ($i = 0; $i < $length; $i++)
				$result .= ($upperChars . $numberChars)[rand(0, 35)];
			break;

		case 'lu' :
			for ($i = 0; $i < $length; $i++)
				$result .= ($upperChars . $lowerChars)[rand(0, 51)];
			break;

		case 'a':
			for ($i = 0; $i < $length; $i++) {
				$result .= $allChars[rand(0, 61)];
			}
			break;

		default:
			echo "Wrong pattern $case" . PHP_EOL;
			return false;
	}

	return $result;
}


function check_cookie(): bool
{
	if (count($_COOKIE) > 0) {
		return true;
	} else {
		return false;
	}
}

function cookie_value(string $cookie_name)
{
	// Return Cookie value if is set
	if (isset($_COOKIE["$cookie_name"])) {
		return $_COOKIE["$cookie_name"];
	} else {
		return false;
	}
}

function get_url(bool $full = false)
{
	$request_uri = "";
	$protocol = "http";

	if ($full) {
		# domain only or full URL
		$request_uri = $_SERVER['REQUEST_URI'];
	}

	if ($_SERVER['SERVER_PORT'] === 443) {
		// check witch your protocol 'HTTP or HTTPS'
		$protocol .= "s"; // HTTP change to HTTPS
	}
	return ($protocol . '://' . $_SERVER["HTTP_HOST"] . $request_uri);
}

function createSalt(int $length = 32, $save_old = ".salt.backup"): bool
	{

		$pre = 'define("SALT","';
		$suf = '");';
		// Create a salt
		$salt = randomatic("a", $length);

		// Reaf config file
		$f = new File();
		$file_value = $f->read(__DIR__. "/../config.php");

		// Find Prefix position 
		$prepos = strpos($file_value, $pre);

		// Prefix post + prefix length == salt position 
		$salt_pos = $prepos + strlen($pre);

		// fFind suffix postion 
		$sufpos = strpos($file_value, $suf, $salt_pos);

		// Get old salt 
		$old_salt = substr($file_value, $salt_pos, $sufpos - $salt_pos);

		// Replace old SALT with new SALT
		$new_file_value = str_replace($old_salt, $salt, $file_value);

		// write new config file
		if ($save_old) {

			// Save old salts in file
			$date = date("Y-m-d H:i:s A");
			
			$f->append("Time : $date -> -> $old_salt \r" ,$save_old);
		}

		if ($f->write($new_file_value,__DIR__ . "/../config.php")) {

			return true;
		} else {
			return false;
		}
	}