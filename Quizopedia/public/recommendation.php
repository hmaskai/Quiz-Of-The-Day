<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/homepage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php 
	//session_start();
	include_once("../includes/session.php");
	include_once("../includes/config.php");
	include_once("../includes/database.php");

	if (!isset($session->user_id)) {
    header('Location: login.php');
    exit();
}

	$q="select * from login where user_id =".$session->user_id;
	$pretest = $database->fetch_array($database->query($q));
	
	if(!$pretest["pretest"]){
		
		header('Location: pre_questionnaire.php');
		
	}
	?>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		</button>
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Quizopedia</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="myNavbar">
		  
		  <ul class="nav navbar-nav navbar-right">
			  <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]?></a></li>
			  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
	<h3>Question:</h3>
	<?php 
					$q = "select * from questions where question_id =".$_POST['question_id'];
					$result = $database->query($q);

					
					$question = $database->fetch_array($result);
					//$GLOBALS['q'] = $question;

					$q_validate = "select * from student_questions where user_id = '".$session->user_id."' and question_id = '".$question["question_id"]."' and answer<>-1";
					$result_validate = $database->query($q_validate);
					echo $result_validate["answer"];
					//$validation = $database->fetch_array($result_validate);
					$num_rows = $database->num_rows($result_validate);
					//echo $num_rows;
				
					
					if($num_rows != 0){
					
					
					echo "<h2 class='answered_question'>Quiz #".$question["question_id"]."<br/>".$question["question_text"]."</h2>";
					?>
					
					
						<div style="margin-left:45%">
							
							<div class="radionew">
							<label for="radio1" ><?php echo $question["option_1"];?></label>
							</div>

							<div class="radionew">
							<label for="radio2"><?php echo $question["option_2"];?></label>
							</div>

							<div class="radionew">	
							<label for="radio3"><?php echo $question["option_3"];?></label>
							</div>

							<div class="radionew">	
							<label for="radio4"><?php echo $question["option_4"];?></label>
							</div>
							
						</div>
						
					<?php }?>
	<h3 style="clear:left;">Recommendations for this question:</h3>
<?php

/*echo "This page will have all the recommendations";
$_GLOBAL['date']=$_POST['str'];
echo $_GLOBAL['date'];

echo "Hello it's me----------------------";
include_once("../includes/database.php");
//chdir("E:\solr\solr-5.5.0\bin");

//shell_exec("solr start -p 8983");
 
 
//chdir("C:\\xampp\\htdocs\\Quiz-Of-The-Day\\Quizopedia\\public");
$q = "select question_text from questions where question_id =".$_POST['question_id'];
$question = $database->fetch_array($database->query($q));
//echo $question["question_text"];
echo $question["question_text"];
 $output = shell_exec("java -jar solrJarCommandLine1.jar ".$question["question_text"]);
 $recoArray = (explode(",",$output));
 
// string shell_exec ( string $cmd )
 
 echo $recoArray[0];
 */
?>
	
	<h3>What your peers have to say:</h3>
	</div>
</body>