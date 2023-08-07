<?php

/**
 * This is heart of IRON ELEPHANT ( base of functions )
 */

use IronElephant\File;


/**
 * Drop a horizontal line
 *
 * @return string
 * 
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function hr()
{
    echo "<hr/>";
}
/**
 * Drop a break line
 *
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function br()
{
    echo "<br/>";
}
/**
 * Drop a varible for showing value
 *
 * @param string $data
 * @param string $line_number
 * @param string $file_name
 * @example d($data, __LINE__, __FILE__);
 * @return void 
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function d($data = "d function stop", $line_number = "", $file_name = "")
{
    if (!empty($line_number)) {
        /**
         * @var string $line_number Add line number
         */
        $line_number = "<br>Line : " . $line_number;
    }
    if (!empty($file_name)) {
        /**
         * @var string $file_name Add file path
         */
        $file_name = "<br>File : " . $file_name;
    }
    echo "<pre>";
    echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
    var_dump($data);
    echo "</pre>";
}
/**
 * Drop and die a variable for showing value
 *
 * @param string $data
 * @param string $line_number
 * @param string $file_name
 * @example dd($data, __LINE__, __FILE__); frop and die
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function dd($data = "dd function stop", $line_number = "", $file_name = "")
{
    if (!empty($line_number)) {
        /**
         * @var string $line_number Add line number
         */
        $line_number = "<br>Line : " . $line_number;
    }
    if (!empty($file_name)) {
        /**
         * @var string $file_name Add file path
         */
        $file_name = "<br>File : " . $file_name;
    }
    echo "<pre>";
    echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
    var_dump($data);
    echo "</pre>";
    die();
}
/**
 * Drop and die a array variable for showing value
 *
 * @param string $data
 * @param string $line_number
 * @param string $file_name
 * @example dr($data, __LINE__, __FILE__); drop and die array
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function dr($data = "dr function stop", $line_number = "", $file_name = "")
{
    if (!empty($line_number)) {
        /**
         * @var string $line_number Add line number
         */
        $line_number = "<br>Line : " . $line_number;
    }
    if (!empty($file_name)) {
        /**
         * @var string $file_name Add file path
         */
        $file_name = "<br>File : " . $file_name;
    }
    echo "<pre>";
    echo "<hr>Function : " . __FUNCTION__ . $line_number . $file_name .  "<br><br>";
    print_r($data);
    echo "</pre>";
    die();
}
/**
 * Add javaScript code to HTML page
 *
 * @param string $input
 * @example d(' alert("hello"); ');
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function js(string $input)
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
 * @example change_url("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url(string $url = "/", int $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die;
}

/**
 * Change URL path with HTML
 *
 * @param string $url
 * @param integer $sec
 * @example change_url_html("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url_html(string $url = "/", int $sec = 0)
{
    echo "<meta http-equiv='refresh' content='$sec; URL=$url' />";
    die;
}

/**
 * Change URL path with JS
 * Simulate a MOUSE CLICK:
 *
 * @param string $url
 * @example change_url_js_1("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url_js_1($url = "/")
{

    echo "<script>window.location.href = '$url';</script>";
    die;
}
/**
 * Change URL path with JS
 * Simulate a HTTP redirect:
 *
 * @param string $url
 * @example change_url_js_2("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url_js_2($url = "/")
{
    echo "<script>window.location.replace('$url');</script>";
    die;
}
/**
 * Change URL path with JS
 *
 * @param string $url
 * @example change_url_js_3("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url_js_3($url = "/")
{
    echo "<script>window.location.assign('$url');</script>";
    die;
}
/**
 * Complate Change URL path with another functions
 *
 * @param string $url
 * @example change_url_full("https://google.com"); change page locatian to google.com
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function change_url_full($url = "/")
{
    change_url_html($url);
    change_url_js_1($url);
    change_url_js_2($url);
    change_url_js_3($url);
    change_url($url);
}
/**
 * Check request method is POST?
 *
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
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
 * @version 1.0.0
 * @since 1.0.0
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
 * Check session value
 *
 * @param string $name
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function issv(string $name): bool
{
    if (isset($_SESSION["$name"])) {
        return true;
    }
    return false;
}
/**
 * If session value is set then will be echo
 * echo $_SESSION["$name"]
 *
 * @param string $name
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function esv(string $name)
{
    if (isset($_SESSION["$name"])) {
        echo $_SESSION["$name"];
    }
}
/**
 * If session value is set then will be retuen
 *
 * @param string $name
 * @return void | $_SESSION["$name"]
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function rsv(string $name)
{
    if (isset($_SESSION["$name"])) {
        return $_SESSION["$name"];
    }
}
/**
 * Check variable for null data
 *
 * @param string $string
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function et(string $string): bool
{
    if (empty(trim($string))) {
        return true;
    }
    return false;
}
/**
 * Creare a random string with your pattern and length
 *
 * @param string $case Deafault is 'A' all option : "A|N|L|U|NL|NU|LU" 
 * @param integer $length Length of string default is '1' 
 *  
 * @return bool | string Return false or string pattern
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.1
 * @since 1.0.0
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
 * @version 1.0.0
 * @since 1.0.0
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
 * @version 1.0.0
 * @since 1.0.0
 */
function cookie_value(string $cookie_name)
{
    if (isset($_COOKIE["$cookie_name"])) {
        return $_COOKIE["$cookie_name"];
    } else {
        return false;
    }
}
/**
 * Get url 
 *
 * @param boolean $full True : full URL, False : web address default is 'false'
 * @return string
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function get_url(bool $url = false): string
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
 * Creare new salt in config file
 *
 * @param integer $length Length of salt
 * @param string $save_old_to_file Save old salts in this file default is '.salt.backup'
 * @return boolean
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.0
 */
function createSalt(int $length = 32, $save_old_to_file = ".salt.backup"): bool
{
    /**
     * @var string $pre Prefix for findding salt in config file
     * @var string $suf Suffix for finddin salt in config file
     */
    $pre = 'define("SALT","';
    $suf = '");';

    /**
     * @var string $salt Generate salt
     */
    $salt = randomatic("a", $length);

    // Reaf config file
    $f = new File(__DIR__ . "/config.php");
    $file_value = $f->read();

    /**
     * @var string $prepos Find Prefix position 
     */
    $prepos = strpos((string)$file_value, $pre);

    /**
     * @var string $salt_pos Prefix post + prefix length ==> salt position 
     */
    $salt_pos = $prepos + strlen($pre);

    /**
     * @var string $sufpos Find suffix postion 
     */
    $sufpos = strpos((string)$file_value, $suf, $salt_pos);

    /**
     * @var string $old_salt Get old salt 
     */
    $old_salt = substr((string)$file_value, $salt_pos, $sufpos - $salt_pos);


    if ($old_salt === "") {
        $new_file_value = str_replace($pre . $suf, $pre . $salt . $suf, (string)$file_value);
    } else {
        /**
         * @var string $new_file_value Replace old SALT with new SALT
         */
        $new_file_value = str_replace($old_salt, $salt, (string)$file_value);
    }

    /**
     * Write new config file
     */
    if ($save_old_to_file && $old_salt !== "") {

        /**
         * @var string $date Save old salts in file with date
         */
        $date = date("Y-m-d H:i:s A");

        // Append old salt to file
        $f->append("Time : $date -> -> $old_salt \r", $save_old_to_file);
    }

    // Rewrite congig file
    if ($f->write($new_file_value)) {

        return true;
    } else {
        return false;
    }
}

$errors = [];
/**
 * Set error for front of your project
 *                      
 * @param string $name name of error
 * @param mixed $value value of error
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.1
 */
function set_error(string $name, $value = null)
{
    global $errors;
    $errors[$name] = $value;
}

/**
 * get error, if isset
 *
 * @param string $name name of error
 * @return void
 * @author Seyed Mahmoud Mousavi
 * @version 1.0.0
 * @since 1.0.1
 */
function get_error(string $name)
{

    global $errors;
    if (isset($errors[$name])) {

        return $errors[$name];
    }
}
