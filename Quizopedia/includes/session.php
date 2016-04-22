<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally 
// inadvisable to store DB-related objects in sessions

class Session {
	
	private $logged_in=false;
	public $user_id;
	public $message;
	
	function __construct() {
		session_start();
		$this->check_login();
		if($this->logged_in) {
		  // actions to take right away if user is logged in
		} else {
		  // actions to take right away if user is not logged in
		}
	}
	
  public function is_logged_in() {
    return $this->logged_in;
  }

	public function login($user) {
    // database should find user based on username/password
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
	  $_SESSION['user_id'] = $user->fname." ". $user->lname;
      $this->logged_in = true;
	  //$this->prem = 0;
    }
  }
  
  public function log_in($user) {
    // database should find user based on username/password
    if($user){
      $u = mysql_fetch_array($user);
	  //$this->user_id = 
	  $_SESSION['user_id'] = $u['u_id'];
	  
	  $_SESSION["username"] = $u['fname']." ".$u['lname'];
      //$this->logged_in = true;
	  //$this->prem = 0;
    }
  }
  
  
  public function logout() {
//    unset($_SESSION['user_id']);
//    unset($this->user_id);
//    $this->logged_in = false;
	session_unset(); //unset variables
	session_destroy(); //destroy the session
	header("location: login.php"); //to redirect back to "index.php" after logging out
	exit();
  }

	public function message($msg="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	  } else {
	    // then this is "get message"
			return $this->message;
	  }
	}

	private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }
  
}

$session = new Session();

?>