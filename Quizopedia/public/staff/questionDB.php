
<?php
    include_once("../../includes/config.php");
	include_once("../../includes/database.php");
	
    $question=$_POST['question'];
    $correctAns=$_POST['correctAns'];
	$op1=$_POST['op1'];
	$op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	
	
/*	
	echo $question;
	echo $op1;
	echo $op2;
	echo $op3;
	echo $op4;
	echo $correctAns;
	*/
	$tags="";
if(!empty($_POST['BasicConcept'])) {
	foreach($_POST['BasicConcept'] as $check1)
	$tags .=$check1." ,";
}
if(!empty($_POST['DataTypes'])) {
	foreach($_POST['DataTypes'] as $check2)
	$tags .=$check2." ,";
}	
if(!empty($_POST['Operation'])) {
	foreach($_POST['Operation'] as $check3)
	$tags .=$check3." ,";
}
if(!empty($_POST['Array'])) {
	foreach($_POST['Array'] as $check4)
	$tags .=$check4." ,";
}
if(!empty($_POST['ControlStructure'])) {
	foreach($_POST['ControlStructure'] as $check5)
	$tags .=$check5." ,";
}
if(!empty($_POST['InterfaceInheritance'])) {
	foreach($_POST['InterfaceInheritance'] as $check6)
	$tags .=$check6." ,";
}

//echo $tags;

	$sql = "INSERT INTO questions (question_text,option_1,option_2,option_3,option_4,correct_answer,tags,date,type)
			VALUES ('$question','$op1','$op2','$op3','$op4','$correctAns','$tags','".$_POST['quizDate']."','Q')";
//echo $sql;
	$database->query($sql);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<title>Done</title>
</head>
<body>

<div class="container">
  <br>
  <br>
  <div class="alert alert-success">
    <strong>Success!</strong> The quiz is now ready and available to the students.
  </div>
  <a href="homepage_prof.php">Enter a new quiz</a>
</div>
</body>




