<?php

declare(strict_types=1);

namespace IronElephant;

require_once __DIR__ . '/../main.php';

/**
 * Security class have many method for sanitizing validating and 
 * increase seafety of your inputs
 */
class Security
{

	/**
	 * htmlspecialchars + check length limit and 
	 * use a callback function for validatin with 
	 * another method return safe string
	 *
	 * @param string $str Input string 
	 * @return string|false
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.1
	 * @since 1.0.0
	 */
	static public function inputTest(string $str, int $length_limit = 0, callable $validate = null): string|false
	{

		$str = htmlspecialchars($str);

		if ($validate !== null) {
			# check argu for pass a function variable?

			if ($validate($str) === false) {
				# validate whith another functions ard return result
				return false;
			}
		}

		if ($length_limit > 0) {
			# check string length

			if (strlen($str) > $length_limit) {
				return false;
			}
		}

		return $str;
	}

	/**
	 * Validate inreger
	 *
	 * @param integer $int Integer input
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function validateInt($var): bool
	{

		if (
			filter_var($var, FILTER_VALIDATE_INT) === 0 ||
			!filter_var($var, FILTER_VALIDATE_INT) === false
		) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Vaklidating ip
	 *
	 * @param string $ip IP address
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function validateIp(string $ip): bool
	{

		$ip = Security::inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Validating IPv6
	 *
	 * @param string $ip IPv6 address
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function validateIpv6(string $ip): bool
	{

		$ip = Security::inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Validating email address
	 *
	 * @param string $email Email adress
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function validateEmail(string $email): bool
	{

		$email = Security::inputTest($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Validating URL
	 *
	 * @param string $url Input URL
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.1
	 * @since 1.0.0
	 */
	static public function validateUrl(string $url): bool
	{

		$url = Security::inputTest($url);
		if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
			return true;
		} elseif (strpos($url, "http") !== 0 || !(strpos($url, '://') >= 4)) {

			return false;
		} else {
			return false;
		}
	}

	/**
	 * Validating web address
	 *
	 * @param string $url Web address
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.1
	 * @since 1.0.0
	 */
	static public function webAddressValidate(string $url): bool
	{

		$url = Security::inputTest($url);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)" .
			"[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
			return false;
		} elseif (strpos($url, "http") !== 0 || !(strpos($url, '://') >= 4)) {

			return false;
		} else {
			return true;
		}
	}

	/**
	 * Sanitize email address
	 *
	 * @param string $email Email address
	 * @return string
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function sanitizeEmail(string $email): string
	{

		$email = Security::inputTest($email);
		return filter_var($email, FILTER_SANITIZE_EMAIL);
	}


	/**
	 * Sanitizing URL
	 *
	 * @param string $url Input URL
	 * @return string
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function sanitizeUrl(string $url): string
	{

		$url = Security::inputTest($url);
		return filter_var($url, FILTER_SANITIZE_URL);
	}

	/**
	 * compare and matches string with your pattern
	 *
	 * @param string $str String input
	 * @param string $pattern Your ppattern
	 * @example  patternString("Hello","ehlo"); => Return false beacouse 'H' not in pattern
	 * patternString("Hello","eHlo"); => Return true beacouse 'H' is in pattern
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function patternString(
		string $str,
		string $pattern
	): bool {

		$str_len = strlen($str);
		$patt_len = strlen($pattern);
		$ok = false;

		for ($s = 0; $s < $str_len; $s++) {

			for ($p = 0; $p < $patt_len; $p++) {
				if ($str[$s] === $pattern[$p]) {
					$ok = true;
				}
			}
			if ($ok === true) {
				$ok = false;
			} else {
				return false;
			}
		}

		return true;
	}

	/**
	 * Hash a string
	 *
	 * @param string $str String input
	 * @param integer $cost Your cost default is '10'
	 * @return string
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function encrypt(string $str, int $cost = 10): string
	{
		# Encrypt string varible
		$options = [
			'cost' => $cost,
		];

		return password_hash($str, PASSWORD_ARGON2ID, $options);
	}

	/**
	 * Decrypt pass and compare with hashed str and return result
	 *
	 * @param string $str Original str
	 * @param string $hash Hashed str
	 * @return boolean
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function decrypt(string $str, string $hash): bool
	{
		# Decode and compare with original string 
		return password_verify($str, $hash);
	}

	/**
	 * Add salt to your string
	 *
	 * @param string $str string
	 * @param string $salt Your salt, default is 'SALT' in your config.php file
	 * @return void
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function addSalt(string $str, string $salt = SALT)
	{
		# Add salt to string
		$str .= $salt;
		return $str;
	}

	/**
	 * Removing salt from your string
	 *
	 * @param string $str Your string
	 * @param string $salt Your salt, default is 'SALT' in config.php file
	 * @return void
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static public function removeSalt(string $str, string $salt = SALT)
	{
		# Remove salt of a string
		$str = str_replace($salt, "", $str);
		return $str;
	}
}
