<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

$u_id = $session->user_id;
$i = 1;


if(isset($_POST['submit'])){
	while($i <= $_POST["num_rows"]){
		$q_id = "question_id".$i;
		$a_id = "answer".$i;
		echo $q_id."  ".$a_id."</br>";
		$q = "INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES ('".$u_id."', '".$_POST[$q_id]."', '".$_POST[$a_id]."')";
		$database->query($q);
		$q = "update login set pretest = 1 where user_id=".$session->user_id;
		$database->query($q);
		$i++;
	}
}


header("Location: homepage.php");
exit();


?>