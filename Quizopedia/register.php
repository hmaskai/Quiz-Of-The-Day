<html>
<body>


<?php
$servername = "localhost";
$username = "quizopedia_admin";
$password = "admin";
$dbname ="quizopedia";
$email = $_POST["email"];
$l_name = $_POST["lname"];
$f_name = $_POST["fname"];
$gender = $_POST["genradio"];
$pass = $_POST["register-password"];
$cpass = $_POST["confirm-password"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);	
} 

if($pass != $cpass)
{
echo "passwords mismatch";	
}
else{
$sql = "INSERT INTO login (username, fname, lname, gender, password) VALUES ('$email', '$f_name', '$l_name', '$gender', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
</body>
</html>