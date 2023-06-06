# Welcome to iron-elephants library

## Work with php easier

This library is working with php **_7.4_** or higher

## How to use this library

1.  Just add this to your own code :

        /**
        * Add IRON ELEPHANT library to project
        */
        require_once __DIR__ . "/main.php";
        require_once 'vendor/autoload.php';

        // load iron elephant modules
        // use IronElephant/ [Connection,File,Security]

2.  Edit and customize [config](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/config.php) file :

        <?php

        /**
        * Set minimum php version to run
        * @var int MINIMUM_PHP_VERSION Set minimum php version to run
        */
        define("MINIMUM_PHP_VERSION",7.4);

        /**
        * Set your default time zone
        *  @var string TIME_ZONE Set default time zone
        */
        define("TIME_ZONE", "");

        /**
        * @var string SALT Create salt for password hashing create salt by call createSalt() function
        * @example createSalt(16) "a5d4ASDA132asdsa"
        */
        define("SALT","6XBsxJGk3cPONBz3vArHS5jzjKwh2T55");

        /**
        * Database config variable
        * @var string HOST_NAME Database server(host) name
        */
        define("HOST_NAME", 'localhost');

        /**
        * Database config variable
        * @var string USER_NAME User name
        */
        define("USER_NAME", 'root');

        /**
        * Database config variable
        * @var string USER_PASSWORD User pass
        *
        */
        define("USER_PASSWORD", '');

        /**
        * Database config variable
        * @var string DB_NAME Database name
        */
        define("DB_NAME", '');

## You can add your own codes and functions to [alternative_func.php](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/alternative_func.php)

## For using all feature visit [**docs**](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/api/index.html) directory

[help/](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs) :

1. [ajax.md](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/ajax.md)
2. [main.md](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/main.md)
3. [file.md](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/file.md)
4. [connection.md](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/connection.md)
5. [security.md](https://github.com/SeyedMahmoudMousavi/iron-elephant/blob/master/docs/security.md)
