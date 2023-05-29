<?php

declare(strict_types=1);

namespace IronElephant;
use Exception,TypeError,Throwable,Error;

require_once __DIR__ . '/../main.php';

class File
{

	protected $file;

	function __construct($dir = ".")
	{
		// dd($dir,__LINE__,__FILE__);
		$this->file = $dir;
		// dd($this->file,__LINE__,__FILE__);
	}

	function changeFile(string $new_file)
	{
		$this->file = $new_file;
	}

	function currentFile()
	{
		return $this->file;
	}

	function read(string $file_path = ".")
	{
		try {

			if ($file_path === ".") {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === ".") {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} elseif (!file_exists($file_path)) {
				echo "Function " . __FUNCTION__ .
					" : File not exist." . PHP_EOL;
				return false;
			} else {


				$my_file = fopen($file_path, "r") or
					die("Unable to open file!");

				$read = fread($my_file, filesize($file_path));

				fclose($my_file);

				return $read;
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	function write(string $text = "",string $file_path = "."): bool
	{
		try {


			if ($file_path === ".") {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === ".") {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} else {
				$file = fopen($file_path, "w") or
					die("Unable to open file!");
				fwrite($file, $text);
				fclose($file);
				return true;
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	function append(string $text = "",string $file_path = ".",): bool
	{
		try {

			if ($file_path === ".") {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === ".") {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} else {
				$file = fopen($file_path, "a") or
					die("Unable to open file!");
				fwrite($file, $text);
				fclose($file);
				return true;
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	function delete(string $file_path = "."): bool
	{
		try {

			if ($file_path === ".") {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === ".") {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} elseif (!file_exists($file_path)) {
				echo "Function " . __FUNCTION__ .
					" : File not exist." . PHP_EOL;
				return false;
			} else {
				return unlink($file_path);
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	/*
	static function bToKB(int $byte, $round = false): float
	{
		$kb = $byte / 1024;
		if ($round) {
			$kb = round($kb, 2, PHP_ROUND_HALF_UP);
		}
		return $kb;
	}

	static function bToMB(int $byte, $round = false): float
	{
		$kb = $byte / 1024;
		$mb = $kb / 1024;
		if ($round) {
			$mb = round($mb, 2, PHP_ROUND_HALF_UP);
		}
		return $mb;
	}

	static function bToGB(int $byte, $round = false): float
	{
		$kb = $byte / 1024;
		$mb = $kb / 1024;
		$gb = $mb / 1024;
		if ($round) {
			$gb = round($gb, 2, PHP_ROUND_HALF_UP);
		}
		return $gb;
	}

	static function kbToB(float $kb): int
	{
		return (int)($kb * 1024);
	}

	static function mbToB(float $mb): int
	{
		return (int)($mb * 1024 * 1024);
	}

	static function gbToB(float $gb): int
	{

		return (int)($gb * 1024 * 1024 * 1024);
	}
*/

	static function upload(
		string $form_name,
		string $target_dir,
		int $max_upload_size = 0,
		int $size_limit = 0,
		bool $is_null = true,
		array $type = ["*"],
		array $target_name = [],
		string $write_method = "o",
		bool $log = true
	) {
		try {

			$file_count = count($_FILES["$form_name"]["name"]); // $file_count

			$upload_log["file_count"] = $file_count;
			$upload_log["Success"] = [];
			$upload_log["Failed"] = [];

			for ($i = 0; $i < $file_count; $i++) {

				$all_file_temp_names[] = $_FILES[$form_name]["tmp_name"][$i];
				// $all_file_temp_names get all tmp_name from php folder
			}

			$target_dir = trim($target_dir);
			$target_dir = trim($target_dir, '/');
			$target_dir = trim($target_dir, '\\');

			if (
				!empty($target_dir)
			) {

				File::makeDir($target_dir);
			} else {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty."
					. PHP_EOL;
				return false;
			}


			# $target_dir test
			#
			# $max_upload_size test

			if ($max_upload_size > 0) {

				$max_upload_size_temp = 0;

				for ($i = 0; $i < $file_count; $i++) {

					$max_upload_size_temp += $_FILES["$form_name"]['size'][$i];
				}

				if ($max_upload_size < $max_upload_size_temp) {
					echo "Function " . __FUNCTION__ .
						" : Sorry your files has large than max upload size limit."
						. PHP_EOL;
					return false;
				}
			}

			# $max_upload_size test
			#
			# $size_limit test

			if ($size_limit > 0) {

				for ($i = 0; $i < $file_count; $i++) {

					$size_limit_temp = $_FILES["$form_name"]['size'][$i];
					$size_limit_temp_name = $_FILES["$form_name"]['name'][$i];

					if ($size_limit_temp > $size_limit) {
						echo "Function " . __FUNCTION__ .
							" : this -> sorry $size_limit_temp_name is large than" .
							" your limits please check the argumants and file size."
							. PHP_EOL;
						return false;
					}
				}
			}

			# $size_limit test
			#
			# $is_null test

			if ($is_null === false) {

				for ($i = 0; $i < $file_count; $i++) {

					$is_null_temp_size = $_FILES["$form_name"]['size'][$i];
					$is_null_temp_name = $_FILES["$form_name"]['name'][$i];

					if ($is_null_temp_size <= 0) {
						echo "Function " . __FUNCTION__ .
							" : this -> $is_null_temp_name is a null file " .
							"please check the argumants and file size."
							. PHP_EOL;
						return false;
					}
				}
			}

			# $is_null test
			#
			# $type test

			if ($type !== ['*']) {

				for ($i = 0; $i < $file_count; $i++) {

					$type_is_ok = false;

					$file_type = pathinfo(
						basename($_FILES[$form_name]["name"][$i]),
						PATHINFO_EXTENSION
					);

					$file_type = strtolower($file_type);

					foreach ($type as $value) {

						if (strtolower($value) === $file_type) {

							$type_is_ok = true;
						}
					}

					if ($type_is_ok === false) {
						echo "Function " . __FUNCTION__ .
							" : Type is not match --> " .
							basename($_FILES[$form_name]["name"][$i]) .
							"<br>Supported type : <br>" .
							PHP_EOL;
						print_r($type);
						return false;
					}
				}
			}

			# $type test
			#
			# $file_name test

			if (count($target_name) === 1) {

				for ($i = 0; $i < $file_count; $i++) {

					$target_name_temp_number = $i + 1;

					if ($i === 0) {

						$target_files[] = $target_dir . "/" . $target_name[0] .
							"." .
							pathinfo(
								basename($_FILES[$form_name]["name"][$i]),
								PATHINFO_EXTENSION
							);
						continue;
					}

					$target_files[] = $target_dir . "/" . $target_name[0] .
						" ($target_name_temp_number)." .
						pathinfo(
							basename($_FILES[$form_name]["name"][$i]),
							PATHINFO_EXTENSION
						);
				}
			} else {

				for ($i = 0; $i < $file_count; $i++) {

					if (count($target_name) > $i) {

						$target_name_temp_number = $i + 1;
						$target_files[] = $target_dir . "/" . $target_name[$i] .
							"." .
							pathinfo(
								basename($_FILES[$form_name]["name"][$i]),
								PATHINFO_EXTENSION
							);
					} else {

						$file_name = basename($_FILES[$form_name]["name"][$i]);
						$target_files[] = $target_dir . "/" . $file_name;
					}
				}
			}

			# $file_name test
			#
			# upload file



			for ($i = 0; $i < $file_count; $i++) {



				# skip method
				#
				#

				if (strtolower($write_method) === "s") {

					$upload_log['Skiped'][] = $_FILES["$form_name"]['name'][$i];
					continue;
				}

				#
				# 
				# skip method

				# duplicate method
				#
				# 

				if (strtolower($write_method) === "d") {

					while (file_exists($target_files[$i])) {

						$name = pathinfo(basename($target_files[$i]), PATHINFO_FILENAME);
						$ext = pathinfo(basename($target_files[$i]), PATHINFO_EXTENSION);
						$number = $i + 2;

						$target_files[$i] = "$target_dir/$name ($number).$ext";

						$upload_log['Renamed'][$_FILES["$form_name"]['name'][$i]] =
							$target_files[$i];
					}
				}

				#
				# 
				# duplicate method



				if (
					move_uploaded_file(
						$all_file_temp_names[$i],
						($target_files[$i])
					)
				) {

					$upload_log['Success'][] = $_FILES["$form_name"]['name'][$i];
					$upload_log['Path'][] = $target_files[$i];
				} else {

					$upload_log['Failed'][] = $_FILES["$form_name"]['name'][$i];
				}
			}


			if ($log === true) {

				return $upload_log;
			} else {

				if (count($upload_log['Success']) > 0) {
					return true;
				} else {
					return false;
				}
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	static function arrayToJsonFile(
		array $json,
		string $file_name,
		bool $overwrite = false
	): bool {

		try {
			$file_name = trim($file_name);

			if (
				empty($file_name)
			) {
				echo "Function " . __FUNCTION__ .
					" : Incorrect argumant or value." . PHP_EOL;
				return false;
			}
			if (
				file_exists($file_name . ".json") &&
				$overwrite === false
			) {
				echo "Function " . __FUNCTION__ .
					" : File is exists." . PHP_EOL;
				return false;
			}

			$json = json_encode($json);
			if (File::write($file_name . ".json", $json)) {
				return true;
			} else {
				echo "Function " . __FUNCTION__ .
					" : can't create file." . PHP_EOL;
				return false;
			}
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	static function jsonFileToArray(
		string $file_name
	) {

		try {
			$file_name = trim($file_name);

			if (empty($file_name)) {
				echo "Function " . __FUNCTION__ .
					" : Incorrect argumant or value." . PHP_EOL;
				return false;
			}
			if (!file_exists($file_name)) {
				echo "Function " . __FUNCTION__ .
					" : File is not exists." . PHP_EOL;
				return false;
			}

			$file = File::read($file_name);

			if ($file === false) {
				echo "Function " . __FUNCTION__ .
					" : can't read file." . PHP_EOL;
				return false;
			}

			$json = json_decode($file);

			if ($json === null) {
				return false;
			}

			return $json;
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	function makeDir(string $target_dir = "."): bool
	{
		try {

			if ($target_dir === ".") {
				$target_dir = $this->file;
			}

			if (empty($target_dir) || $target_dir === ".") {
				echo "Function " . __FUNCTION__ .
					" : Incorrect argumant or value." . PHP_EOL;
				return false;
			}

			$target_dir = str_replace('\\', '/', $target_dir);

			$dirs = explode("/", $target_dir);
			$temp_dir = "";
			foreach ($dirs as $value) {

				if ($value === "") {
					continue;
				}
				$temp_dir .= $value . "/";
				if (!is_dir($temp_dir)) {
					if (!mkdir($temp_dir)) {
						echo "Function " . __FUNCTION__ .
							" : a problem happens when making directory."
							. PHP_EOL;
						return false;
					}
				}
			}

			return true;
		} catch (Throwable | Error | Exception | TypeError $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}	
}