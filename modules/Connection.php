<?php

declare(strict_types=1);

namespace IronElephant;

use mysqli,ErrorException,Exception,TypeError,Throwable,Error;

require_once __DIR__ . '/../main.php';

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});

// require_once 'iron_tools.php';


class Connection
{
	private $server_name;
	private $user_name;
	private $password;
	private $database_name;
	private $db;



	function __construct(string $server_name, string $user_name, string $password, string $database_name = "")
	{
		try {

			// connecting to DATABASE
			$this->connectToDatabase($server_name, $user_name, $password, $database_name);
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
		
	}

	public function connectToDatabase(string $server_name, string $user_name, string $password, string $database_name = "") : bool
	{
		try {

			// Create a connection from DATABASE 

			$this->server_name = $server_name;
			$this->user_name = $user_name;
			$this->password = $password;
			$this->database_name = $database_name;

			if (empty($database)) {

				// connect only to SQL HOST
				$this->db = new mysqli(
					$server_name,
					$user_name,
					$password
				);
			} else {

				// connect to DATABASE				
				$this->db = new mysqli(
					$server_name,
					$user_name,
					$password,
					$database
				);
			}

			// Return connection errors
			if ($this->db->connect_error) {
				$this->connectionFailed();
				return false;
			}else{
				return true;
			}
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	private function connectionFailed()
	{
		// Return connection error 
		try {
			echo "Connection failed : " .
				$this->db->connect_error;
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	public function createDatabase(string $database_name): bool
	{
		// Create a data base
		try {

			if (empty($database_name)) {

				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			$sql = "CREATE DATABASE $database_name";


			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$collected_data->execute();
			$collected_data->close();

			return true;
			//

		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}


	public function dropDatabase(string $database_name, string $sure = "no"): bool
	{
		try {

			$sure = trim($sure);

			if (empty($database_name) || empty($sure)) {

				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			if (strtolower($sure) !== "yes") {
				echo "Function " . __FUNCTION__ .
					" : Please fill the secound argu with \"YES\"." . PHP_EOL;
				return false;
			}

			$sql = "DROP DATABASE $database_name";


			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$collected_data->execute();
			$collected_data->close();

			return true;
			//

		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}


	public function find(
		string $column,
		string $table,
		string $where = "1=1"
	) {
		try {

						if (
				empty($column) ||
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			$sql = "SELECT $column FROM $table WHERE $where;";


			$collected_data = $this->db->query($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}
			if ($collected_data->num_rows > 0) {
				while ($row = $collected_data->fetch_assoc()) {
					return $row["$column"];
				}
			}
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	public function select(
		array $columns,
		string $table,
		string $where = "1=1"
	) {
		try {
			if (
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			foreach ($columns as $value) {
				if (empty($value)) {
					echo "Function " . __FUNCTION__ .
						' : incorrect arguments type or value';
					return false;
				}
			}

			$sql = "SELECT ";

			foreach ($columns as $value) {
				$sql .= $value . ',';
			}

			$sql = rtrim($sql, ",");
			$sql .= " FROM $table WHERE $where;";

			$collected_data = $this->db->query($sql);
			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$data = [];

			if ($collected_data->num_rows > 0) {
				foreach ($columns as $value) {
					while ($row = $collected_data->fetch_assoc()) {
						$data[] = $row;
					}
				}
			}

			return $data;
			// 
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}


	public function insert(
		string $table,
		array $columns,
		array $values
	): bool {

		try {
			if (
				empty($table)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			foreach ($columns as $value) {
				if (empty($value)) {
					echo "Function " . __FUNCTION__ .
						' : incorrect arguments type or value';
					return false;
				}
			}

			$sql = "INSERT INTO $table (";

			foreach ($columns as $value) {
				$sql .= $value . ',';
			}

			$sql = rtrim($sql, ",");
			$sql .= ") VALUES (";

			foreach ($values as $value) {
				if (gettype($value) === "string") {
					$sql .= "'" . $value . "'" . ',';
				} else {
					$sql .= $value . ',';
				}
			}

			$sql = rtrim($sql, ",");
			$sql .= ");";

			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}
			$collected_data->execute();
			$collected_data->close();

			return true;
			//
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	public function update(
		string $table,
		array $set,
		string $where = "1=1"
	): bool {
		try {
			if (
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			foreach ($set as $key => $value) {
				if (empty($key)) {
					echo "Function " . __FUNCTION__ .
						' : incorrect arguments type or value';
					return false;
				}
			}

			$sql = "UPDATE $table SET ";

			foreach ($set as $key => $value) {
				if (gettype($value) === "string") {
					$sql .= $key . "='" . $value . "',";
				} else {
					$sql .= $key . "=" . $value . ",";
				}
			}

			$sql = rtrim($sql, ",");
			$sql .= " WHERE $where;";

			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$collected_data->execute();
			$collected_data->close();
			return true;
			//

		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}
	public function delete(
		string $table,
		string $where
	): bool {
		try {

			if (
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}


			$sql = "DELETE FROM $table WHERE $where;";
			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$collected_data->execute();
			$collected_data->close();

			return true;
			//

		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}
	public function query(string $SQL)
	{
		try {

			if (empty($SQL)) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			$collected_data = $this->db->query($SQL);
			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}
			if ($collected_data->num_rows > 0) {
				return $collected_data;
			} else {
				return false;
			}
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	function __destruct()
	{
		try {
			$this->db->close();
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	// public function insert_p($LONG_URL, $SHORT_URL, $DATE)
	// {
	// 	if (is_string($LONG_URL) && is_string($SHORT_URL) && is_string($DATE)) {
	// 		$sql = "INSERT INTO link (long_url,short_url,create_date) VALUES(?,?,?);";
	// 		$collected_data =  $this->db->prepare($sql);
	// 		$collected_data->bind_param("sss", $long_url, $short_url, $date);
	// 		$long_url = $LONG_URL;
	// 		$short_url = $SHORT_URL;
	// 		$date = $DATE;
	// 		if ($collected_data !== false) {
	// 			$collected_data->execute();
	// 			$collected_data->close();
	// 		} else {
	// 			dd('a trouble in the insert_p method');
	// 		}
	// 	} else {
	// 		dd('incorrect arguments type');
	// 	}
	//
	// }

}
