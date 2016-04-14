<html>
<body>


<?php

include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

/* $servername = "localhost";
$username = "quizopedia_admin";
$password = "admin";
$dbname ="quizopedia"; */
$email = trim($_POST["email"]);
$l_name = trim($_POST["lname"]);
$f_name = trim($_POST["fname"]);
$gender = trim($_POST["genradio"]);
$pass = trim($_POST["register-password"]);
$cpass = trim($_POST["confirm-password"]);


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
/* if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);	
} 
 */
if($pass != $cpass)
{
echo "passwords mismatch";	
}
else{
$sql = "INSERT INTO login (username, fname, lname, gender, password) VALUES ('$email', '$f_name', '$l_name', '$gender', '$pass')";

if ($database->query($sql) === TRUE) {
    echo "New record created successfully";
	$_SESSION['username'] = $f_name." ". $l_name;
	$q = 'SELECT * FROM login WHERE username="'.$email.'" AND password="'.$pass.'" LIMIT 1';
	$found_user = $database->query($q);
//	$u = $found_user->fetch_array();
	$u = $database->fetch_array($found_user);
	$_SESSION['user_id'] = $u['user_id'];
	header('Location: homepage.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//$conn->close();
?>
</body>
</html>