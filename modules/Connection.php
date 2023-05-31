<?php

declare(strict_types=1);

namespace IronElephant;

use mysqli, ErrorException, Exception, TypeError, Throwable, Error;

require_once __DIR__ . '/../main.php';

// Set error handler for try catch
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});
/**
 * Connection class use for CRUD opration and work with MySQL database
 */
class Connection
{
	/**
	 * Keep query and data for functions
	 *
	 * @var mixed
	 */
	private $db;

	/**
	 * Create a database connection object for CRUD operatian
	 *
	 * @param string $server_name Server name
	 * @param string $user_name User name
	 * @param string $password User pass
	 * @param string $database_name Database name, default is 'null' and only connect to server
	 * @example $database = new Connection->connectToDatabase("server_name", "user_name", "password"[, "database_name"]);
	 */
	function __construct(string $server_name, string $user_name, string $password, string $database_name = "")
	{
		try {
			// Connecting to DATABASE
			if ($this->connectToDatabase($server_name, $user_name, $password, $database_name)) {
				# Check can connect to server ? and return result
				return true;
			} else {
				return false;
			}

			return false;
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}
	/**
	 * Connect to database
	 *
	 * @param string $server_name Server Name
	 * @param string $user_name User name
	 * @param string $password User pass
	 * @param string $database_name Database name, defaul is 'null' and only connect to server	 
	 * @example connectToDatabase("server_name", "user_name", "password"[, "database_name"]);
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function connectToDatabase(string $server_name, string $user_name, string $password, string $database_name = ""): bool
	{
		try {

			if (empty($database)) {

				// Connect only to SQL server(host)
				$this->db = new mysqli(
					$server_name,
					$user_name,
					$password
				);
			} else {

				// Connect to DATABASE				
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
			} else {
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

	/**
	 * echo connection error and die
	 *
	 * @return void
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
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
	/**
	 * Create new data base
	 *
	 * @param string $database_name Name of new database
	 * @example createDatabase("database_name");
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function createDatabase(string $database_name): bool
	{
		try {

			// Check argu 
			if (empty($database_name)) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			// Generating SQL code
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
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	/**
	 * Drop a database
	 *
	 * @param string $database_name Name of database
	 * @param string $confirm For confirm proccess fill secound param with 'yes' default is 'no'
	 * @example dropDatabase("name_of_database","yes");
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function dropDatabase(string $database_name, string $confirm = "no"): bool
	{
		try {
			// Check params

			$confirm = trim($confirm);

			if (empty($database_name) || empty($confirm)) {

				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			// Confirm proccess
			if (strtolower($confirm) !== "yes") {
				echo "Function " . __FUNCTION__ .
					" : Please fill the secound argu with \"YES\"." . PHP_EOL;
				return false;
			}

			// Generating SQL code
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
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	/**
	 * Find a single data in database
	 *
	 * @param string $column Column name
	 * @param string $table Table name
	 * @param string $where Contition, default is '1=1'
	 * @example find("column_name", "table_name", "id=1")
	 * @return mixed false|string
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function find(
		string $column,
		string $table,
		string $where = "1=1"
	): mixed {
		try {

			// Check params
			if (
				empty($column) ||
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			// Generating SQL code
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
	/**
	 * Select data from database
	 *
	 * @param array $columns Columns name
	 * @param string $table Table name
	 * @param string $where Where?, default is '1=1'
	 * @example select(["column_1", "column_2"], "table_name", "id=1") 
	 * @return mixed
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function select(
		array $columns,
		string $table,
		string $where = "1=1"
	): mixed {
		try {
			// test params
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

			// Start generating SQL code
			$sql = "SELECT ";

			// Seperate columns
			foreach ($columns as $value) {
				$sql .= $value . ',';
			}

			$sql = rtrim($sql, ",");
			$sql .= " FROM $table WHERE $where;";
			// End of generating SQL code

			$collected_data = $this->db->query($sql);
			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$data = [];

			// Collecet data
			if ($collected_data->num_rows > 0) {
				foreach ($columns as $value) {
					while ($row = $collected_data->fetch_assoc()) {
						$data[] = $row;
					}
				}
			}

			return $data;
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}

	/**
	 * insert data to table
	 *
	 * @param string $table Table name
	 * @param array $columns Columns Name
	 * @param array $values Values
	 * @example insert("table_name", ["column_1", "column_2"],["value_1", "value_2"]);
	 * @return boolean 
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function insert(
		string $table,
		array $columns,
		array $values
	): bool {

		try {
			// Test params
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

			// Generate SLQ code
			$sql = "INSERT INTO $table (";
			// Seperate columns
			foreach ($columns as $value) {
				$sql .= $value . ',';
			}

			$sql = rtrim($sql, ",");
			$sql .= ") VALUES (";

			// Seperate values
			foreach ($values as $value) {
				if (gettype($value) === "string") {
					// Detect var type and add quotation '' for string
					$sql .= "'" . $value . "'" . ',';
				} else {
					$sql .= $value . ',';
				}
			}

			$sql = rtrim($sql, ",");
			$sql .= ");";
			// End of generation SQL code

			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}
			$collected_data->execute();
			$collected_data->close();

			return true;
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}
	/**
	 * Update values in database
	 *
	 * @param string $table Table name
	 * @param array $set which columns must be update
	 * @param string $where add a where condition, default is '1=1'
	 * @example update("table_name",["column_1"=>"value_1", "column_2"=>"value_2"],"id=1");
	 * @return boolean 
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function update(
		string $table,
		array $set,
		string $where = "1=1"
	): bool {
		try {
			// Check params
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

			// Start generating SQL code
			$sql = "UPDATE $table SET ";

			// Seperate set array
			foreach ($set as $key => $value) {
				if (gettype($value) === "string") {
					$sql .= $key . "='" . $value . "',";
				} else {
					$sql .= $key . "=" . $value . ",";
				}
			}

			$sql = rtrim($sql, ",");
			$sql .= " WHERE $where;";
			// End of generating SQL code

			$collected_data = $this->db->prepare($sql);

			if ($collected_data === false) {
				echo "Function " . __FUNCTION__ .
					' : proccess failed';
				return false;
			}

			$collected_data->execute();
			$collected_data->close();
			return true;
		} catch (Exception | TypeError | Throwable | Error $e) {
			$file = $e->getFile();
			$line = $e->getLine();
			$message = $e->getMessage();
			echo "<h1>File : $file</h1><h2>Line : $line</h2><h2>Error : $message</h2>";
			die();
		}
	}
	/**
	 * Delete a value from your db 
	 *
	 * @param string $table Table name
	 * @param string $where which data you need to delete, default is '1=1'
	 * @example delete("table_name","id=1");  description
	 * @return boolean
	 * 
	 * @author Seyed Mahmoud Mousavi
 	 * @version 1.0.0
	 * @since 1.0.0
	 */
	public function delete(
		string $table,
		string $where
	): bool {
		try {

			// Check params
			if (
				empty($table) ||
				empty($where)
			) {
				echo "Function " . __FUNCTION__ .
					" : Argumant is empty." . PHP_EOL;
				return false;
			}

			// Generating SQL code
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
			// Check params
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

	/**
	 * Close database work
	 */
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
}
