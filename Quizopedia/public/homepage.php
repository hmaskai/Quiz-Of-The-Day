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
  <script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
  <script src="js/liquidFillGauge.js" language="JavaScript"></script>
  <script src="js/sunBurst.js" language="JavaScript"></script>
  <script src="js/groupedBarChart.js" language="JavaScript"></script>
   <script src="js/dashboard.js" language="JavaScript"></script>
  <style>
        .liquidFillGaugeText { font-family: Helvetica; font-weight: bold; }
   </style>
<<<<<<< HEAD
=======

>>>>>>> 02409fdc724eb069a2075873d6c89630a854646e
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
  
  
  <div style="float:right;">
  
 
  
  </div>
  
  <div style="clear: left;">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Quiz Of The Day</a></li>
    <li><a data-toggle="pill" href="#menu1">Progress</a></li>
    <li><a data-toggle="pill" href="#menu2">Class Performance</a></li>
    <li><a data-toggle="pill" href="#menu3">Recommendations</a></li>
	<li><a data-toggle="pill" href="#menu4">Top Reads</a></li>
  </ul>
  </div>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
      
		  
			<div class="form-group">
				
				<div>
				
					<?php 
					$q = "select * from questions where type = 'Q' order by question_id desc LIMIT 1";
					$result = $database->query($q);
					
					$question = $database->fetch_array($result);
					$GLOBALS['q'] = $question;
					$q_validate = "select * from student_questions where user_id = '".$session->user_id."' and question_id = '".$question["question_id"]."' and answer<>-1";
					$result_validate = $database->query($q_validate);
					echo $result_validate["answer"];
					//$validation = $database->fetch_array($result_validate);
					$num_rows = $database->num_rows($result_validate);
					//echo $num_rows;
					$GLOBALS['attempted'] = "";
					
					if($num_rows == 0){
					
					echo "<h2 class='question'>Quiz #".$question["question_id"]."<br/>".$question["question_text"]."</h2>";
					?>
					
					<form action="validate_answer.php" method="post" >
						<input type="hidden" name="question_id" value="<?php echo $GLOBALS["q"]["question_id"];?>" />
						<div class="radionew">
						<input type="radio" name="radio" id="radio1" class="radio" value="1"/>
						<label for="radio1"><?php echo $GLOBALS["q"]["option_1"];?></label>
						</div>
						<div class="radionew">
						<input type="radio" name="radio" id="radio2" class="radio" value="2"/>
						<label for="radio2"><?php echo $GLOBALS["q"]["option_2"];?></label>
						</div>
						<div class="radionew">	
						<input type="radio" name="radio" id="radio3" class="radio" value="3"/>
						<label for="radio3"><?php echo $GLOBALS["q"]["option_3"];?></label>
						</div>
						<div class="radionew">	
						<input type="radio" name="radio" id="radio4" class="radio" value="4"/>
						<label for="radio4"><?php echo $GLOBALS["q"]["option_4"];?></label>
						</div>
						<div class="submit">
						<input type="submit" class="btn btn-success" value="Submit"/>
						</div>
					</form>
					<?php
					}
					else{
						?>
						<h2 class="question"><span class="glyphicon glyphicon-thumbs-up" ></span> You have finished today's challenge</h2>
						<?php echo "<h2 class='answered_question'>Quiz #".$GLOBALS['q']["question_id"]."<br/>".$GLOBALS['q']["question_text"]."</h2>";?>
						<div style="margin-left:45%">
							
							<div class="radionew">
							<label for="radio1" ><?php echo $GLOBALS["q"]["option_1"];?></label>
							</div>
							<div class="radionew">
							<label for="radio2"><?php echo $GLOBALS["q"]["option_2"];?></label>
							</div>
							<div class="radionew">	
							<label for="radio3"><?php echo $GLOBALS["q"]["option_3"];?></label>
							</div>
							<div class="radionew">	
							<label for="radio4"><?php echo $GLOBALS["q"]["option_4"];?></label>
							</div>
							
						</div>			
					<?php		
					}
					?>
				</div>	  
			</div>
    </div>
    <div id="menu1" class="tab-pane fade" style="width:100%;">
		
      
     <br/><br/>
	 <h4 style="text-align:center;"><b>Performance measures</b></h4>
	  <div style="margin-left:25%;">
		<div style= "float:left; margin:20px">
		  <svg id="fillgauge1" width="150" height="150" ></svg>
		  <p style="text-align: center;">Total Quizes</p>
		</div>
		<div style="float:left; margin:20px">
		  <svg id="fillgauge2" width="150" height="150" ></svg>
		  <p style="text-align:center; ">Correct Answers</p>
		</div>
		<div style="float:left; margin:20px">
		  <svg id="fillgauge3" width="150" height="150" ></svg>
		  <p style="text-align:center;">Accuracy</p>
		</div>
	  </div>
	   <?php 
		$q="select count(question_id) from questions where type='Q'";
		$total_questions = $database->fetch_array($database->query($q));
		$_GLOBAL["total questions"] = $total_questions[0];
		
		$q="select count(q.question_id) from questions q LEFT JOIN student_questions s ON q.question_id=s.question_id where q.correct_answer=s.answer and type='Q' and s.user_id=".$session->user_id;
		$correct_answers = $database->fetch_array($database->query($q));
		$_GLOBAL["correct answers"] = $correct_answers[0];
		?>
		<script language="JavaScript">
    
		var config1 = liquidFillGaugeDefaultSettings();
		config1.circleColor = "#FF7777";
		config1.textColor = "#FF4444";
		config1.waveTextColor = "#FFAAAA";
		config1.waveColor = "#FFDDDD";
		config1.circleThickness = 0.2;
		config1.textVertPosition = 0.2;
		config1.waveAnimateTime = 1000;
		config1.displayPercent = false;
		config1.maxValue = 30;
		loadLiquidFillGauge("fillgauge1", <?php echo $_GLOBAL["total questions"]?>, config1);
		var config2 = liquidFillGaugeDefaultSettings();
		config2.circleColor = "#178BCA";
		config2.textColor = "#178BCA";
		config2.waveTextColor = "#178BCA";
		config2.waveColor = "#b3ffff";
		config2.circleThickness = 0.2;
		config2.textVertPosition = 0.2;
		config2.waveAnimateTime = 1000;
		config2.displayPercent = false;
		config2.maxValue = 30;
		loadLiquidFillGauge("fillgauge2", <?php echo $_GLOBAL["correct answers"]?>, config2);
		var config3 = liquidFillGaugeDefaultSettings();
		config3.circleColor = "#ff4d4d";
		config3.textColor = "#ff4d4d";
		config3.waveTextColor = "#ff4d4d";
		config3.waveColor = "#ffe6e6";
		config3.circleThickness = 0.2;
		config3.textVertPosition = 0.2;
		config3.waveAnimateTime = 1000;
		loadLiquidFillGauge("fillgauge3", <?php echo ($_GLOBAL["correct answers"]/$_GLOBAL["total questions"])*100?>, config3);
		
		
		</script>	  
	   <?php
		 include_once("../includes/functions.php");
<<<<<<< HEAD
		 $_GLOBAL['sunBurstJson']=$functions->json_convert("select lower(tags) as tags from questions");
		 
=======
<<<<<<< HEAD
		 $_GLOBAL['sunBurstJson']=$functions->json_convert("select lower(tags) as tags from questions where type = 'Q'");
		 echo "Hi I am here";
=======
		 $_GLOBAL['sunBurstJson']=$functions->json_convert("select lower(tags) as tags from questions");
		 
>>>>>>> 98218067f5f62bdde967ad9d330c5b695e21aa6a
>>>>>>> 02409fdc724eb069a2075873d6c89630a854646e
		 ?>
		 
	<div>
	
	<h4 style="clear:left;margin-left:13%"><b>Topic-wise Performance</b></h4>
	<div id="sunBurst" style="clear:left;"></div>
	</div>
	 <script>
	 
	 
	 loadSunBurst(<?php echo $_GLOBAL['sunBurstJson'];?>);
	 
	 </script>
    </div>
    <div id="menu2" class="tab-pane fade">
      
      <br/>
	   <?php
		 include_once("../includes/functions.php");
		 $_GLOBAL['correct_incorrect']=$functions->csv_correct_incorrect_unattempted();
		 $q="select count(user_id) as count from login" ;
		 $_GLOBAL['numberOfStudents'] = $database->fetch_array($database->query($q));
		 ?>
	<div style="width:50%;text-align:center;float:left;">	 
	<text style="font-size:20px;"><b>Class Performance(Quiz-wise)</b></text>
	</div>
	<div style="width:50%;text-align:center;float:left;">	 
	<text style="font-size:20px;"><b>Leaderboard</b></text>
	</div>
	<div id="groupedBarChart" style="clear:left; float:left"></div>
	
	 <script>
	 loadGroupedBarChart(<?php echo $_GLOBAL['correct_incorrect'];echo ","; echo $_GLOBAL['numberOfStudents']['count'];?>);
	 </script>
	 
	 
	 
	 <div>
	 <div id="topPerformers" style="font-size:20px;width:40%;float:left;">
	 
<<<<<<< HEAD
	 <?php  $q= "select l.user_id, CONCAT(l.fname, ' ', l.lname) as name, round(count(*)*100/(select COUNT(*) from questions),2) accuracy from login l left outer JOIN student_questions s on l.user_id = s.user_id left outer join questions q on s.question_id = q.question_id and s.answer = q.correct_answer GROUP BY s.user_id, l.fname, l.lname ORDER BY accuracy DESC limit 10";
=======
	 <?php  $q= "select l.user_id, CONCAT(l.fname, ' ', l.lname) as name, round(count(*)*100/(select COUNT(*) from questions),2) accuracy from login l left outer JOIN student_questions s on l.user_id = s.user_id left outer join questions q on s.question_id = q.question_id and s.answer = q.correct_answer and q.type = 'Q' GROUP BY s.user_id, l.fname, l.lname ORDER BY accuracy DESC limit 10";
>>>>>>> 02409fdc724eb069a2075873d6c89630a854646e
	 
	 $toppers = $database->query($q);
	  echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Student</th>";
      echo "<th>Score</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      
      
     
	 while($row=mysql_fetch_array($toppers)){
		 echo "<tr>";
         echo "<td>". $row["name"]."</td>";
         echo "<td>". $row["accuracy"]."</td>";
         echo "</tr>";
		 
	 }
	  echo "</tbody>";
      echo "</table>";
	 ?>
	 
	 </div>
	 </div>
	 <?php include_once("../includes/functions.php");?>
	 <div id="dashboard" style="clear:left; float:left"></div>
	 <script>
	 dashboard('#dashboard',<?php echo $functions->student_accuracy();?>);
	 </script>
	 
	 
    </div>
    
	
	
	
	
    <div id="menu3" class="tab-pane fade">
      
      <p>Click on individual rows below to view the details.</p>
	  <table id="table" class="table table-hover">
		<thead>
		  <tr>
			<th>Date</th>
			<th>Quiz Number</th>
			<th>Result</th>
		  </tr>
		</thead>
		<tbody>
		<?php
		  $q="select s.answer, s.user_id, q.correct_answer, q.question_id, q.date from questions q LEFT JOIN student_questions s ON s.question_id=q.question_id where q.type='Q' and s.user_id=".$session->user_id." Order by q.date desc";
		  $student_answer = $database->query($q);
		  while ($row = mysql_fetch_assoc($student_answer))
			{
				/* if($row["answer"]!=$row["correct_answer"]){
					if($row["answer"]==-1)
						print_r("<tr class='info clickable-row' data-href='recommendation.php'> \n");
					else
						print_r("<tr class='danger clickable-row' data-href='recommendation.php'> \n");
					}
				else{
					print_r("<tr class='clickable-row' data-href='recommendation.php'> \n");
				} */
				print_r("<tr>");
				print_r("<td>".$row["date"]."</td>");
				print_r("<td>Quiz ".$row["question_id"]."</td>\n");
				if($row["answer"]==$row["correct_answer"]){
					print_r("<td><span class='glyphicon glyphicon-ok'></span></td>\n");
				}
				else{
					if($row["answer"]==-1)
						print_r("<td><span class='glyphicon glyphicon-minus'></span></td>\n");
					else
						print_r("<td><span class='glyphicon glyphicon-remove'></span></td>\n");
				}
				print_r('<td><form action="recommendation.php" method="post"><input type="hidden" name="question_id" value='.$row["question_id"].'><input type="submit" class="btn btn-success" value="Recommend"/></form></td>');
				//print_r('');
				print_r("</tr> \n");
			}	
		?>
		</tbody>
	  </table>
    </div>
	
	
	
	<div id="menu4" class="tab-pane fade">
      
      <p>Recommendations based on your strengths and weaknesses</p>
	  
    </div>
  </div>
</div>
</body>
</html>