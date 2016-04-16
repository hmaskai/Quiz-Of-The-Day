<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
   <style>
.center{
	
	font-size:40px;
	font-family: "Times New Roman", Times, serif;
}

</style>
</head>
<body>
<?php 
	//session_start();
	include_once("../includes/session.php");
	include_once("../includes/config.php");
	include_once("../includes/database.php");
	/*if(isset($_SESSION['user_id'])){
	header("Location: homepage.php");
	echo $_SESSION['user_id'];
	echo $_SESSION['username'];
	}
	else{
		echo "unset";
	}*/
	if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
	?>
	
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
			  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	

<div class="container">


  <div><h1 class="center" >Quizopedia</h1></div>
  
  <div style="float:right;">
  
 
  
  </div>
  
  <div style="clear: left;">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Quiz Of The Day</a></li>
    <li><a data-toggle="pill" href="#menu1">Progress</a></li>
    <li><a data-toggle="pill" href="#menu2">Class Performance</a></li>
    <li><a data-toggle="pill" href="#menu3">Recommendations</a></li>
  </ul>
  </div>
  
  <div class="tab-content" style="float:left;">
    <div id="home" class="tab-pane fade in active">
      <h3>Quiz Of The Day</h3>
      <p>Try to solve the question below</p>
		  
			<div class="form-group">
				<label for="comment">Question:</label>
				<div>
				<text>
					<?php 
					$q = "select * from questions order by question_id desc LIMIT 1";
					$result = $database->query($q);

					
					$question = $database->fetch_array($result);
					$GLOBALS['q'] = $question;

					$q_validate = "select * from student_questions where user_id = '".$session->user_id."' and question_id = '".$question["question_id"]."'";
					$result_validate = $database->query($q_validate);
					//$validation = $database->fetch_array($result_validate);
					$num_rows = $database->num_rows($result_validate);
					//echo $num_rows;
					$GLOBALS['attempted'] = "";
					if($num_rows != 0)
						$GLOBALS['attempted'] = "disabled";
					echo $question["question_text"];
	
					?>
					
					<form action="validate_answer.php" method="post" >
						<input type="hidden" name="question_id" value="<?php echo $GLOBALS["q"]["question_id"];?>" />
						<div class='radio'>
							<label><input type="radio" name="optradio" value="1" <?php echo $GLOBALS['attempted']; ?>><?php echo $GLOBALS["q"]["option_1"];?></label>
						</div>
						<div class="radio">
							<label><input type="radio" name="optradio" value="2" <?php echo $GLOBALS['attempted']; ?>><?php echo $GLOBALS["q"]["option_2"];?></label>
						</div>
						<div class="radio">
							<label><input type="radio" name="optradio" value="3" <?php echo $GLOBALS['attempted']; ?>><?php echo $GLOBALS["q"]["option_3"];?></label>
						</div>
						<div class="radio">
							<label><input type="radio" name="optradio" value="4" <?php echo $GLOBALS['attempted']; ?>><?php echo $GLOBALS["q"]["option_4"];?></label>
						</div>
						
						<input type="submit" class="btn btn-success" value="Submit"/>
					</form>
				</text>


				</div>
			  
			</div>
		  
		
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Progress</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Class Performance</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Recommendations</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
</body>
</html>