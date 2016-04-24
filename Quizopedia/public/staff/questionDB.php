
<?php
    $servername = "localhost";
	$username = "quizopedia_admin";
	$password = "admin";
	$dbname = "quizopedia";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	
    $question=$_POST['question'];
    $correctAns=$_POST['correctAns'];
	$op1=$_POST['op1'];
	$op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	
	
	
	echo $question;
	echo $op1;
	echo $op2;
	echo $op3;
	echo $op4;
	echo $correctAns;
if(!empty($_POST['BasicConcept'])) {
	foreach($_POST['BasicConcept'] as $check1)
	echo $check1;
}
if(!empty($_POST['DataTypes'])) {
	foreach($_POST['DataTypes'] as $check2)
	echo $check2;
}	
if(!empty($_POST['Operation'])) {
	foreach($_POST['Operation'] as $check3)
	echo $check3;
}
if(!empty($_POST['Array'])) {
	foreach($_POST['Array'] as $check4)
	echo $check4;
}
if(!empty($_POST['ControlStructure'])) {
	foreach($_POST['ControlStructure'] as $check4)
	echo $check4;
}
if(!empty($_POST['InterfaceInheritance'])) {
	foreach($_POST['InterfaceInheritance'] as $check5)
	echo $check5;
}

	
	
	/*$sql = "INSERT INTO questions (question_text,option_1,option_2,option_3,option_4,correct_answer,tags)
			VALUES ('$question','$op1','$op2','$op3','$op4','$correctAns','$tags')";

	if ($conn->query($sql) === TRUE) 
	{
		echo "New record created successfully";
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
*/
$conn->close();

?>


