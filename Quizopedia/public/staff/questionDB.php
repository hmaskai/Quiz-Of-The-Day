
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
	//$tags=$_POST['tags'];
	
	if(!empty($_POST['BasicConcept[]'])) {
		
    foreach($_POST['BasicConcept'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
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


