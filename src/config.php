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
define("TIME_ZONE", "asia/tehran");

/**
 * @var string LOWERCHARS Define const lower char free to use
 */
define("LOWERCHARS", "abcdefghijklmnopqrstuvwxyz");
/**
 * @var string UPPERCHARS Define const upper char free to use
 */
define("UPPERCHARS", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
/**
 * @var string NUMBERCHARS Define const number char free to use
 */
define("NUMBERCHARS", "0123456789");
/**
 * @var string OTHERCHARS Define const other char free to use
 */
define("OTHERCHARS", " .-_");
/**
 * @var string BASICCHARS Define const basic char free to use
 */
define("BASICCHARS", LOWERCHARS . UPPERCHARS . NUMBERCHARS);
/**
 * @var string ALLCHARS Define const all char free to use
 */
define("ALLCHARS", BASICCHARS . OTHERCHARS);


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
