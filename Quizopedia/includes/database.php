<?php

class MySQLDatabase {
	
	private $connection;
	public $last_querry;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	public $servername = "localhost";
	private $username = "quizopedia_admin";
	private $password = "admin";
	private $dbname ="quizopedia";
	
  function __construct() {
    //$this->open_connection();
	$this->connection = mysql_connect("localhost", "quizopedia_admin", "admin");
	if (!$this->connection) {
		die("Database connection failed: " . mysql_error());
	} else {
		$db_select = mysql_select_db("quizopedia", $this->connection);
		if (!$db_select) {
			die("Database selection failed: " . mysql_error());
		}
		}
	$this->magic_quotes_active = get_magic_quotes_gpc(); // inbuilt function
	$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0

  }

	public function open_connection() {
		$this->connection = mysql_connect("localhost", "quizopedia_admin", "admin");
		if (!$this->connection) {
			die("Database connection failed: " . mysql_error());
		} else {
			$db_select = mysql_select_db("quizopedia", $this->connection);
			if (!$db_select) {
				die("Database selection failed: " . mysql_error());
			}
		}
	}
	
	public function close_connection() { //function to close connection
		if(isset($this->connection)) {
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql) { 	// function to process querry
		$this->last_query = $sql;
		$result = mysql_query($sql, $this->connection);
		$this->confirm_query($result);
		return $result;
	}
	
	public function escape_value( $value ) { //															DOUBT HAI ISME :p
			if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	// "database-neutral" methods
  public function fetch_array($result_set) {
    return mysql_fetch_array($result_set);
  }
  
  public function num_rows($result_set) {
   return mysql_num_rows($result_set);
  }
  
  public function insert_id() { // FUNCTION TO GET THE ID OF THE LAST INSERT 
    // get the last id inserted over the current db connection
    return mysql_insert_id($this->connection);
  }
  
  public function affected_rows() { // FUNCTION TO FIND THE NUMBER OF ROWS AFFECTED. EG. 6ROWS UPDATED
    return mysql_affected_rows($this->connection);
  }

  
	
	private function confirm_query($result) { // FUNCTION TO CHECK QUERRY IS RIGHT OR NOT. IT IS USED IN QUERRY() ABOVE
		if (!$result) {
			$output = "Database query failed: " . mysql_error()."<br /><br />" . "Last SQL query: " . $this->last_query;
			die($output);
		}
	}
	
}

$database = new MySQLDatabase();
$db =& $database;


?>