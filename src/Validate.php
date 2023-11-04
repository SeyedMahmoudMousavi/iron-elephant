<?php

declare(strict_types=1);

namespace Codecrafted\IronElephant;

/**
 * Validate class have many method for sanitizing validating and 
 * increase seafety of your inputs
 * 
 * @author Seyed Mahmoud Mousavi
 */
class Validate
{
	protected $input = null;

	public function __construct($var = null)
	{
		$this->input = $var;
	}


	/**
	 * htmlspecialchars + check length limit and 
	 * use a callback function for validatin with 
	 * another method return safe string
	 *
	 * @param string $str Input string 
	 * @return object
	 * 
	 */
	public function inputTest(string $str = null, bool $trimSpace = true): object
	{

		if (is_null($str)) {
			$str = $this->input;
		}

		if ($trimSpace) {
			$str = trim($str);
		}

		$str = htmlspecialchars($str);

		$this->input = $str;

		return $this;
	}

	/**
	 * Validate inreger
	 *
	 * @param integer $int Integer input
	 * @return object
	 */
	public function validateInt($var = null): object
	{

		if (is_null($var)) {
			$var = $this->input;
		}
		if (
			filter_var($var, FILTER_VALIDATE_INT) === 0 ||
			!filter_var($var, FILTER_VALIDATE_INT) === false
		) {
			$this->input = $var;
		} else {
			$this->input = null;
		}
		return $this;
	}

	/**
	 * Vaklidating ip
	 *
	 * @param string $ip IP address
	 * @return object
	 */
	public function validateIp(string $ip = null): object
	{

		if (is_null($ip)) {
			$ip = $this->input;
		}
		$ip = $this->inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$this->input = $ip;
		} else {
			$this->input = null;
		}

		return $this;
	}

	/**
	 * Validating IPv6
	 *
	 * @param string $ip IPv6 address
	 * @return object
	 */
	public function validateIpv6(string $ip = null): object
	{

		if (is_null($ip)) {
			$ip = $this->input;
		}

		$ip = $this->inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
			$this->input = $ip;
		} else {
			$this->input = null;
		}

		return $this;
	}

	/**
	 * Validating email address
	 *
	 * @param string $email Email adress
	 * @return object
	 */
	public function validateEmail(string $email = null): object
	{

		if (is_null($email)) {
			$email = $this->input;
		}

		$email = $this->inputTest($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->input = $email;
		} else {
			$this->input = null;
		}
		return $this;
	}

	/**
	 * Validating URL
	 *
	 * @param string $url Input URL
	 * @return object
	 */
	public function validateUrl(string $url = null): object
	{

		if (is_null($url)) {
			$url = $this->input;
		}

		$url = (string)$this->inputTest($url);
		if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
			$this->input = $url;
		} elseif (strpos($url, "http") !== 0 || !(strpos($url, '://') >= 4)) {
			$this->input = null;
		} else {
			$this->input = null;
		}
		return $this;
	}

	/**
	 * Validating web address
	 *
	 * @param string $url Web address
	 * @return object
	 */
	public function webAddressValidate(string $url = null): object
	{

		if (is_null($url)) {
			$url = $this->input;
		}

		$url = (string)$this->inputTest($url);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)" .
			"[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
			$this->input = null;
		} elseif (strpos($url, "http") !== 0 || !(strpos($url, '://') >= 4)) {
			$this->input = null;
		} else {
			$this->input = $url;
		}
		return $this;
	}

	/**
	 * Sanitize email address
	 *
	 * @param string $email Email address
	 * @return object
	 */
	public function sanitizeEmail(string $email = null): object
	{

		if (is_null($email)) {
			$email = $this->input;
		}
		$email = $this->inputTest($email);
		$this->input = filter_var($email, FILTER_SANITIZE_EMAIL);
		return $this;
	}


	/**
	 * Sanitizing URL
	 *
	 * @param string $url Input URL
	 * @return object
	 */
	public function sanitizeUrl(string $url = null): object
	{

		if (is_null($url)) {
			$url = $this->input;
		}

		$url = $this->inputTest($url);
		$this->input = filter_var($url, FILTER_SANITIZE_URL);

		return $this;
	}
}
