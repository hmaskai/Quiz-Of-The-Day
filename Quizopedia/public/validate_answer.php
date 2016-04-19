<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

$u_id = $session->user_id;
$q = "INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES ('".$u_id."', '".$_POST["question_id"]."', '".$_POST["radio"]."')";
echo $q;
echo "<br>";
$database->query($q);
header("Location: homepage.php");
exit();


?>