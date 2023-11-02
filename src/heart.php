<?php

/**
 * This is heart of IRON Library ( helper functions )
 */

require_once "config.php";

/**
 * Drop a horizontal line
 *
 * @return string
 * 
 * @author Seyed Mahmoud Mousavi
 */
function hr(): void
{
    echo "<hr/>";
}
/**
 * Drop a break line
 *
 * @return void
 * @author Seyed Mahmoud Mousavi
 */
function br(): void
{
    echo "<br/>";
}
/**
 * Drop a varible for showing value
 *
 * @param $data
 * @param int|null $line_number
 * @param int|null $file_name
 * @example d($data, __LINE__, __FILE__);
 * @return void 
 * @author Seyed Mahmoud Mousavi
 */
function d($data = "d function stop", int|null $line_number = null, int|string $file_name = null): void
{
    if (!is_null($line_number)) {
        /**
         * @var string $line_number Add line number
         */
        $line_number = "<br>Line : " . $line_number;
    }
    if (!is_null($file_name)) {
        /**
         * @var string $file_name Add file path
         */
        $file_name = "<br>File : " . $file_name;
    }
    echo "<pre>";
    echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
    (is_array($data)) ? var_dump($data) : print_r($data);
    echo "</pre>";
}
/**
 * Drop and die a variable for showing value
 *
 * @param $data
 * @param int|null $line_number
 * @param int|null $file_name
 * @example dd($data, __LINE__, __FILE__); frop and die
 * @return void
 * @author Seyed Mahmoud Mousavi
 */
function dd($data = "d function stop", int|null $line_number = null, int|string $file_name = null): void
{
    d($data, $line_number, $file_name);
    die();
}
/**
 * Add javaScript code to HTML page
 *
 * @param string $input
 * @example js(' alert("hello"); ');
 * @return void
 * @author Seyed Mahmoud Mousavi
 */
function js(string $input): void
{
    echo "<script>";
    echo $input;
    echo "</script>";
}
/**
 * Change URL path with PHP
 *
 * @param string $url
 * @param integer $statusCode
 * @example redirect("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 */
function redirect(string $url = "/", int $statusCode = 303): void
{
    header('Location: ' . $url, true, $statusCode);
    die;
}
/**
 * Check request method is POST?
 *
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 */
function is_post(): bool
{
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method === "post") {
        return true;
    }
    return false;
}

/**
 * Check request method is GET?
 *
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 */
function is_get(): bool
{
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    if ($method === "get") {
        return true;
    }
    return false;
}

/**
 * Return session value if set
 *
 * @param $name
 * @param $value
 * @return void
 */
function session($name = null, $value = null)
{
    if (is_null($name)) {
        return $_SESSION;
    }
    if (is_null($value)) {
        return $_SESSION["$name"];
    }
    if (isset($_SESSION["$name"])) {
        $_SESSION["$name"] = $value;
    }
}
/**
 * echo session value if set
 *
 * @param  $name
 * @param  $name
 * @return void
 */
function e_session($name = null)
{
    if ($name === null) {
        print session();
    }
    echo session($name);
}

/**
 * Creare a random string with your pattern and length
 *
 * @param string $case Deafault is 'A' all option : "A|N|L|U|NL|NU|LU" 
 * @param integer $length Length of string default is '1' 
 *  
 * @return bool | string Return false or string pattern
 * @author Seyed Mahmoud Mousavi
 */
function randomatic(string $case = "a", int $length = 1)
{
    $result = "";

    if ($length < 1) {
        return false;
    }
    /**
     * @var string $lowerChars Lowercase chars
     * @var string $upperChars Uppercase chars
     * @var string $numberChars Number chars
     * @var string $allChars All chars
     */
    $lowerChars = "abcdefghijklmnopqrstuvwxyz";
    $upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numberChars = "0123456789";
    $allChars = $lowerChars . $upperChars . $numberChars;

    /**
     * @var string $case Pattern methodS : A|N|L|U|NL|NU|LU
     */
    $case = trim(strtolower($case));

    /**
     * Generate random string with your option
     */
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

        case 'ln':
        case 'nl':
            for ($i = 0; $i < $length; $i++)
                $result .= ($lowerChars . $numberChars)[rand(0, 35)];
            break;

        case 'nu':
        case 'un':
            for ($i = 0; $i < $length; $i++)
                $result .= ($upperChars . $numberChars)[rand(0, 35)];
            break;

        case 'ul':
        case 'lu':
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

/**
 * Chck cookie on ro off ?
 *
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 */
function check_cookie(): bool
{
    if (count($_COOKIE) > 0) {
        return true;
    } else {
        return false;
    }
}
/**
 * Return Cookie value if it's set
 *
 * @param string $cookie_name Name of cookie
 * @return void
 * @author Seyed Mahmoud Mousavi
 */
function cookie(string $cookie_name)
{
    if (isset($_COOKIE["$cookie_name"])) {
        return $_COOKIE["$cookie_name"];
    }
}
/**
 * Get url 
 *
 * @param boolean $full True : full URL, False : web address default is 'false'
 * @return string
 * @author Seyed Mahmoud Mousavi
 */
function my_address(bool $url = false): string
{
    /**
     * @var string $request_uri 
     * @var string $protocol http|httpss
     */
    $request_uri = "";
    $protocol = "http";

    /**
     * Generate URL or Web address
     */
    if ($url) {
        // Generate URL 
        $request_uri = $_SERVER['REQUEST_URI'];
    }
    /**
     * Protocol type detection
     * If true HTTP change to HTTPS
     */
    if ($_SERVER['SERVER_PORT'] === 443) {

        $protocol .= "s";
    }
    return ($protocol . '://' . $_SERVER["HTTP_HOST"] . $request_uri);
}

/**
 * set error session 
 *
 * @param $name
 * @param $value
 * @return void
 */
function error($name = null, $value = null)
{
    if (!isset($_SESSION['error'])) {
        $_SESSION['error'] = [];
    }

    if (is_null($name)) {
        return $_SESSION['error'];
    }
    if (is_null($value)) {
        return $_SESSION["$name"];
    }
    if (isset($_SESSION["$name"])) {
        $_SESSION["$name"] = $value;
    }
}
