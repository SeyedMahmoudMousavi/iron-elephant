<?php

declare(strict_types=1);

namespace IronElephant;

use Exception, TypeError, Throwable, Error;

require_once __DIR__ . '/../main.php';


/**
 * Byte to Kilobyte
 * @var string BYTE_TO_KIB
 */
define("BYTE_TO_KIB", -1);
/**
 * Byte to Megabyte
 * @var string BYTE_TO_MIB
 */
define("BYTE_TO_MIB", -2);
/**
 * Byte to Gigabyte
 * @var string BYTE_TO_GIB
 */
define("BYTE_TO_GIB", -3);
/**
 * Kilobyte to byte
 * @var string KIB_TO_BYTE
 */
define("KIB_TO_BYTE", 1);
/**
 * Kilobyte to Megabyte
 * @var string KIB_TO_MIB
 */
define("KIB_TO_MIB", -1);
/**
 * Kilobyte to Gigabyte
 * @var string KIB_TO_GIB
 */
define("KIB_TO_GIB", -2);
/**
 * Megabyte to byte
 * @var string MIB_TO_BYTE
 */
define("MIB_TO_BYTE", 2);
/**
 * Megabyte to Kilobyte
 * @var string MIB_TO_KIB
 */
define("MIB_TO_KIB", 1);
/**
 * Megabyte to Gigabyte
 * @var string MIB_TO_GIB
 */
define("MIB_TO_GIB", -1);
/**
 * Gigabyte to byte
 * @var string GIB_TO_BYTE
 */
define("GIB_TO_BYTE", 3);
/**
 * Gigabyte to Kilobyte
 * @var string GIB_TO_KIB
 */
define("GIB_TO_KIB", 2);
/**
 * Gigabyte to Megabyte
 * @var string GIB_TO_MIB
 */
define("GIB_TO_MIB", 1);

/**
 * File class for work with files and folders
 */
class File
{

	/**
	 * File path
	 *
	 * @var string $file
	 */
	protected $file;

	/**
	 * Create a object 
	 *
	 * @param string $dir 
	 */
	function __construct($dir = null)
	{
		// Check params
		if (!empty($dir)) {
			$this->file = $dir;
		}
	}

	/**
	 * Change file path
	 *
	 * @param string $new_file New file path
	 * @example changeFile("new/path/file.ext");
	 * @return void
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function changeFile(string $new_file)
	{
		$this->file = $new_file;
	}

	/**
	 * Return current file path
	 *
	 * @return string
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function currentFile(): string
	{
		return (string)$this->file;
	}

	/**
	 * Reading a file
	 *
	 * @param string $file_path File path
	 * @return void
	 * @example read(["file_path"]); or
	 * read(); Read file path from object data
	 * $f = new File("file_path"); 
	 * %f->read();
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function read(string $file_path = null): mixed
	{
		try {

			// Get file path from object
			if ($file_path === null) {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === null) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} elseif (!file_exists($file_path)) {
				echo "Function " . __FUNCTION__ .
					" : File not exist." . PHP_EOL;
				return false;
			} else {

				// Start reading file
				$my_file = fopen($file_path, "r");

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
	/**
	 * Write a file with your data
	 *
	 * @param string $text data for writing
	 * @param string|null $file_path
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function write(string $text = "", string $file_path = null): bool
	{
		try {

			// Get file path from object
			if ($file_path === null) {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === null) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} else {

				// Start writing file
				$file = fopen($file_path, "w");
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
	/**
	 * Append data to a file
	 * 
	 * @param string $text data to append end of file
	 * @param string|null $file_path
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function append(string $text = "", string $file_path = null,): bool
	{
		try {

			// Get file path from object
			if ($file_path === null) {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === null) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} else {

				// Start append file
				$file = fopen($file_path, "a");
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

	/**
	 * delete a file
	 *
	 * @param string|null $file_path path of file to delete
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function delete(string $file_path = null): bool
	{
		try {

			// Get file path from object
			if ($file_path === null) {
				$file_path = $this->file;
			}

			if (empty($file_path) || $file_path === null) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			} elseif (!file_exists($file_path)) {
				echo "Function " . __FUNCTION__ .
					" : File not exist." . PHP_EOL;
				return false;
			} else {

				// Delete file
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


	/**
	 * upload your files
	 *
	 * @param string $form_name Name of form in HTML set
	 * @param string $target_dir Target path for uploading
	 * @param integer $max_upload_size Max of all file sizes byte, default is '0' for no limitation
	 * @param integer $size_limit Max every file size byte, default is '0' for no limitation
	 * @param boolean $is_null Can upload null file ? default is 'true'
	 * @param array $type Which file extention can upload ? default is ["*"] for no limitation
	 * @param array $target_name Insert target name of uploaded file, default is [] for no renaming and set original name
	 * @param string $write_method If file exist, function must what to do OVERWRITE, SKIPPING, Rename.
	 * default method is 'o',
	 * all option 'o|s|r'
	 * @param boolean $log Are want to get summery log of uploaded files,
	 * default is 'true'
	 * @return void string|boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
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

			// $file_count
			$file_count = count($_FILES["$form_name"]["name"]);


			$upload_log["file_count"] = $file_count;
			$upload_log["Success"] = [];
			$upload_log["Failed"] = [];

			for ($i = 0; $i < $file_count; $i++) {

				// Get all tmp_name from php folder
				$all_file_temp_names[] = $_FILES[$form_name]["tmp_name"][$i];
			}

			$target_dir = trim($target_dir);
			$target_dir = trim($target_dir, '/');
			$target_dir = trim($target_dir, '\\');

			// Make target path folder
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


			# $max_upload_size test

			// Get sum of all files size
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

			# $size_limit test

			// Get every file size
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

			// Check file for null or not
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

			// check file extentions 
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

			/**
			 * if user only add one name this name set for all files
			 * @example $target_name == ["test"]
			 */
			if (count($target_name) === 1) {
				/**
				 * Add number to end of file 
				 * exclude first file
				 */

				for ($i = 0; $i < $file_count; $i++) {

					// file ($i).ext
					$target_name_temp_number = $i + 1;

					/**
					 * Skip first file ande leave him with original
					 * file.ext
					 */
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

				/**
				 * If user only two name or more 
				 * @example $target_name == ["test",["test_2"]]
				 */
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
			# Upload file


			/**
			 * If file exist what to do? 
			 */
			for ($i = 0; $i < $file_count; $i++) {

				# Skip method
				#
				#

				/**
				 * If file exist skip them
				 */
				if (strtolower($write_method) === "s") {

					$upload_log['Skiped'][] = $_FILES["$form_name"]['name'][$i];
					continue;
				}

				#
				# 
				# Skip method

				# Rename method
				#
				# 

				/**
				 * If file exist rename them
				 */
				if (strtolower($write_method) === "r") {

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
				# Rename method


				/**
				 * Spload file and save log
				 */
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

			/**
			 * Return log or return boolean
			 */
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

	/**
	 * Conver array to a json file
	 *
	 * @param array $json Array data
	 * @param string $file_name File name for saving .JSON
	 * @param boolean $overwrite If this file exist overwrite?
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static function arrayToJsonFile(
		array $json,
		string $file_name,
		bool $overwrite = false
	): bool {

		try {

			//Check params
			$file_name = trim($file_name);

			if (
				empty($file_name)
			) {
				echo "Function " . __FUNCTION__ .
					" : Incorrect argumant or value." . PHP_EOL;
				return false;
			}

			// Check file exist
			if (
				file_exists($file_name . ".json") &&
				$overwrite === false
			) {
				echo "Function " . __FUNCTION__ .
					" : File is exists." . PHP_EOL;
				return false;
			}

			// Conver array to json
			$json = json_encode($json);

			// Write json file
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
	/**
	 * Read json file and convert to array
	 *
	 * @param string $file_name Name of json file
	 * @return mixed false|Array
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	static function jsonFileToArray(
		string $file_name
	): mixed {

		try {

			// Check param
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

			// Read json file
			$file = File::read($file_name);

			if ($file === false) {
				echo "Function " . __FUNCTION__ .
					" : can't read file." . PHP_EOL;
				return false;
			}

			// Convert to array
			$json = json_decode((string)$file);

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
	/**
	 * Make direction folder and path
	 *
	 * @param string|null $target_dir Path to make
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
	 * @version 1.0.0
	 * @since 1.0.0
	 */
	function makeDir(string $target_dir = null): bool
	{
		try {

			// Get path from object
			if ($target_dir === null) {
				$target_dir = $this->file;
			}

			if (empty($target_dir) || $target_dir === null) {
				echo "Function " . __FUNCTION__ .
					" : Incorrect argumant or value." . PHP_EOL;
				return false;
			}

			// Start create path and directory
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

	/**
	 * convert file size 
	 *
	 * @param float $number Input number
	 * @param int $type 
	 * BYTE_TO_KIB | BYTE_TO_GIB | BYTE_TO_MIB | 
	 * KIB_TO_BYTE | KIB_TO_MIB | KIB_TO_GIB | 
	 * MIB_TO_BYTE | MIB_TO_KIB | MIB_TO_GIB | 
	 * GIB_TO_BYTE | GIB_TO_KIB | GIB_TO_MIB
	 * @param integer $precision
	 * @param int $mode
	 * @return float
	 */
	static public function sizeConverter(float $number, int $type, int $precision = 2, int $mode = \PHP_ROUND_HALF_UP): float
	{

		switch ($type) {
			case 1:
				$number *= (1024);
				break;
			case 2:
				$number *= (1024 * 1024);
				break;
			case 3:
				$number *= (1024 * 1024 * 1024);
				break;
			case -1:
				$number /= (1024);
				break;
			case -2:
				$number /= (1024 * 1024);
				break;
			case -3:
				$number /= (1024 * 1024 * 1024);
				break;
		}
		$number = round($number, $precision, $mode);
		return $number;
	}
}
