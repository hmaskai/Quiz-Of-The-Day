<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");
$q="select * from login where user_id =".$session->user_id;
$pretest = $database->fetch_array($database->query($q));
$name = $pretest["fname"]." ".$pretest["lname"];
$_GLOBAL["name"] = $name;
?>
<div class="container">
  <h2>Questionnaire - Part 2</h2>
  <p>Welcome <b><?php echo $_GLOBAL["name"];?></b>. Answer the questions to the best of your knowledge below</p>
  
  <!--Pre Questionnaire Form -->
  <form role="form" action="validate_prereq.php" method="post">
 <?php
	
	
	if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
	}
	
	$q = "select * from questions where type = 'P' order by question_id";
	$result = $database->query($q);
	$num_rows = $database->num_rows($result);
	echo'	<div class="radio">';
	echo '<input type="hidden" name="num_rows" value="'.$num_rows.' />';
	echo'		</div>';
	//$question = $database->fetch_array($result);
	//$GLOBALS['q'] = $question;
	$i = 1;
	while ($row = mysql_fetch_array($result)) {
		
		echo '	<div class="form-group">';
		echo '<h3>Question '.$i.'</h3>';
		echo $row["question_text"];
		echo'	<div class="radio">';
		echo '<input type="hidden" name="question_id'.$i.'" value="'.$row["question_id"].'" />';
		
		echo'		</div>';
		echo'	<div class="radio">';
		echo'		  <label><input type="radio" name="answer'.$i.'" value = "1">'.$row["option_1"].'</label>';
		echo'		</div>';
		echo'		<div class="radio">';
		echo'		  <label><input type="radio" name="answer'.$i.'" value = "2">'.$row["option_2"].'</label>';
		echo'		</div>';
		echo'		<div class="radio">';
		echo'		  <label><input type="radio" name="answer'.$i.'" value = "3">'.$row["option_3"].'</label>';
		echo'		</div>';
		echo'		<div class="radio">';
		echo'		  <label><input type="radio" name="answer'.$i.'" value = "4">'.$row["option_4"].'</label>';
		echo'		</div>';
		echo'	</div>';
		echo'	<hr></hr>';
		$i++;
	}
	echo'	';
	echo'		';
	echo''; 
	 
?>
	<button type="submit" value = "submit" name = "submit" class="btn btn-default">Submit</button>
	<hr></hr>
   <!--Pre Questionnaire Form Ends Here-->
   </form>


   </div>

</body>
</html>