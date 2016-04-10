
<?php   
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

$session->logout();
session_unset(); //unset variables

session_destroy(); //destroy the session
header("location: login.php"); //to redirect back to "index.php" after logging out
exit();
?>