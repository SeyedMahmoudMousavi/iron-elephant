<?php

/**
 * This is heart of IRON Library ( helper functions )
 */

if (!function_exists('hr')) {
    /**
     * Drop a horizontal line
     *
     * @return string
     */
    function hr(): void
    {
        echo "<hr/>";
    }
}

if (!function_exists('br')) {
    /**
     * Drop a break line
     *
     * @return void 
     */
    function br(): void
    {
        echo "<br/>";
    }
}

if (!function_exists('d')) {
    /**
     * Drop a varible for showing value
     *
     * @param $data
     * @param int|null $line_number
     * @param int|null $file_name
     * @example d($data, __LINE__, __FILE__);
     * @return void  
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
}

if (!function_exists('dd')) {
    /**
     * Drop and die a variable for showing value
     *
     * @param $data
     * @param int|null $line_number
     * @param int|null $file_name
     * @example dd($data, __LINE__, __FILE__); frop and die
     * @return void 
     */
    function dd($data = "d function stop", int|null $line_number = null, int|string $file_name = null): void
    {
        d($data, $line_number, $file_name);
        die();
    }
}

if (!function_exists('js')) {
    /**
     * Add javaScript code to HTML page
     *
     * @param string $input
     * @example js(' alert("hello"); ');
     * @return void 
     */
    function js(string $input): void
    {
        echo "<script>";
        echo $input;
        echo "</script>";
    }
}

if (!function_exists('redirect')) {
    /**
     * Change URL path with PHP
     *
     * @param string $url
     * @param integer $statusCode
     * @example redirect("https://google.com"); change page locatian to google.com
     * @return void 
     */
    function redirect(string $url = "/", int $statusCode = 303): void
    {
        header('Location: ' . $url, true, $statusCode);
        die;
    }
}

if (!function_exists('is_post')) {
    /**
     * Check request method is POST?
     *
     * @return boolean
     */
    function is_post(): bool
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method === "post") {
            return true;
        }
        return false;
    }
}

if (!function_exists('is_get')) {
    /**
     * Check request method is GET?
     *
     * @return boolean 
     */
    function is_get(): bool
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method === "get") {
            return true;
        }
        return false;
    }
}

if (!function_exists('session')) {
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
            if (isset($_SESSION["$name"])) {
                return $_SESSION["$name"];
            } else {
                return null;
            }
        } else {
            $_SESSION["$name"] = $value;
        }
    }
}

if (!function_exists('e_session')) {
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
}

if (!function_exists('randomatic')) {
    /**
     * Creare a random string with your pattern and length
     *
     * @param string $case Deafault is 'A' all option : "A|N|L|U|NL|NU|LU" 
     * @param integer $length Length of string default is '1' 
     *  
     * @return bool | string Return false or string pattern
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
}

if (!function_exists('check_cookie')) {
    /**
     * Chck cookie on ro off ?
     *
     * @return boolean 
     */
    function check_cookie(): bool
    {
        if (count($_COOKIE) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('cookie')) {
    /**
     * Return Cookie value if it's set
     *
     * @param string $cookie_name Name of cookie
     * @return void
     */
    function cookie(string $cookie_name)
    {
        if (isset($_COOKIE["$cookie_name"])) {
            return $_COOKIE["$cookie_name"];
        }
    }
}

if (!function_exists('my_address')) {
    /**
     * Get url 
     *
     * @param boolean $full True : full URL, False : web address default is 'false'
     * @return string
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
}

if (!function_exists('error')) {
    /**
     * set and get error session 
     * 
     * @param $value
     * @return mixed
     */
    function error($value = null)
    {
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = null;
        }
        if (is_null($value)) {
            return $_SESSION['error'];
        } else {
            $_SESSION["error"] = $value;
        }
    }
}

if (!function_exists('request')) {
    /**
     * get Request data
     *
     * @param $name
     * @return mixed
     */
    function request(string $name)
    {
        if (isset($_REQUEST["$name"])) {
            return $_REQUEST["$name"];
        }
    }
}

if (!function_exists('post')) {
    /**
     * get Post data 
     *
     * @param $name
     * @return mixed
     */
    function post(string $name)
    {
        if (isset($_POST["$name"])) {
            return $_POST["$name"];
        }
    }
}

if (!function_exists('get')) {
    /**
     * get Get data 
     *
     * @param $name
     * @return mixed
     */
    function get(string $name)
    {
        if (isset($_GET["$name"])) {
            return $_GET["$name"];
        }
    }
}

if (!function_exists('encrypt')) {
    /**
     * Hash a string
     *
     * @param string $str String input
     * @param integer $cost Your cost default is '10'
     * @return string 
     */
    function encrypt(string $str, int $cost = 10): string
    {
        # Encrypt string varible
        $options = [
            'cost' => $cost,
        ];

        return password_hash($str, PASSWORD_ARGON2ID, $options);
    }
}

if (!function_exists('decrypt')) {
    /**
     * Decrypt pass and compare with hashed str and return result
     *
     * @param string $str Original str
     * @param string $hash Hashed str
     * @return boolean     
     */
    function decrypt(string $str, string $hash): bool
    {
        # Decode and compare with original string 
        return password_verify($str, $hash);
    }
}
