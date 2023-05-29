<?php

declare(strict_types=1);

namespace IronElephant;

require_once __DIR__ . '/../main.php';

class Security
{

	static public function inputTest(string $data): string
	{

		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	static public function validateInt(int $int): bool
	{

		$int = Security::inputTest((string)$int);
		if (
			filter_var($int, FILTER_VALIDATE_INT) === 0 ||
			!filter_var($int, FILTER_VALIDATE_INT) === false
		) {
			return true;
		} else {
			return false;
		}
	}

	static public function validateIp(string $ip): bool
	{

		$ip = Security::inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
			return true;
		} else {
			return false;
		}
	}

	static public function validateIpv6(string $ip): bool
	{

		$ip = Security::inputTest($ip);
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
			return true;
		} else {
			return false;
		}
	}

	static public function validateEmail(string $email): bool
	{

		$email = Security::inputTest($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return true;
		} else {
			return false;
		}
	}

	static public function validateUrl(string $url): bool
	{

		$url = Security::inputTest($url);
		if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
			return true;
		} else {
			return false;
		}
	}

	static public function webAddressValidate(string $str): bool
	{

		$str = Security::inputTest($str);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)" .
			"[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $str)) {
			return false;
		}
		return true;
	}

	static public function sanitizeEmail(string $email): string
	{

		$email = Security::inputTest($email);
		return filter_var($email, FILTER_SANITIZE_EMAIL);
	}


	static public function sanitizeUrl(string $url): string
	{

		$url = Security::inputTest($url);
		return filter_var($url, FILTER_SANITIZE_URL);
	}

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

	static public function encrypt(string $str, int $cost = 10): string
	{
		# Encrypt string varible
		$options = [
			'cost' => $cost,
		];

		return password_hash($str, PASSWORD_ARGON2ID, $options);
	}

	static public function decrypt(string $str, string $hash): bool
	{
		# dexode and comare with original string 
		return password_verify($str, $hash);
	}

	static public function addSalt(string $str, string $salt = SALT)
	{
		# add salt to string
		$str .= $salt;
		return $str;
	}

	static public function removeSalt(string $str, string $salt = SALT)
	{
		# remove salt of a string
		$str = str_replace($salt, "", $str);
		return $str;
	}
}
