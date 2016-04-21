<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

$u_id = $session->user_id;
$i = 1;
echo $_POST["question_id3"];
echo "</br>";
echo $_POST["answer4"];
echo "</br>";

if(isset($_POST['submit'])){
	while($i <= $_POST["num_rows"]){
		$q_id = "question_id".$i;
		$a_id = "answer".$i;
		echo $q_id."  ".$a_id."</br>";
		$q = "INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES ('".$u_id."', '".$_POST[$q_id]."', '".$_POST[$a_id]."')";
		echo $q;
		echo "</br></br>";
		$i++;
	}
}


echo "<br>";
//$database->query($q);
//header("Location: homepage.php");
//exit();


?>