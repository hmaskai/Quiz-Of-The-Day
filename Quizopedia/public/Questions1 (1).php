<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Quizopedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/homepage.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).on('keydown', '#tag_list', function (e) {
    if (e.keyCode == 13) {
        createTag($(this).val());
    }
});
$(document).on('click', '.delete', function () {
    $(this).parent().remove();
});

function createTag(text) {
    if (text != '') {
        var tag = $('<div class="tags">' + text + '<a class="delete"></a></div>');
        tag.insertBefore($('#tag_list'), $('#tag_list'));
        $('#tag_list').val('');
    }
}
</script>
</head>

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


<div class= "container">
<form class="quizsettings" id="editexamquestionformmodel" action="questionDB.php" method="post">
<fieldset>
	<h3>Question??</h3>
	<br>
	<textarea rows="4" cols="50" name="question" class="form-control">
	</textarea>
</fieldset>
<fieldset class="createanswers">
<div class="fieldgroup">
	<h2>Option 1</h2>
	<div>
		
		<input placeholder="Correct answer" id="EditExamQuestionFormModel_answer_1" name="op1" type="text" class="form-control"/>
		
	</div>
</div>
<div class="fieldgroup">
	<h2>Option 2</h2>
	<div>
		
		<input placeholder="Wrong answer 1" id="EditExamQuestionFormModel_answer_2" name="op2" type="text" class="form-control"/>
		
	</div>
</div>
<div class="fieldgroup">
	<h2>Option 3</h2>
	<div>
	
	<input placeholder="Wrong answer 2" id="EditExamQuestionFormModel_answer_3" name="op3" type="text" class="form-control"/>
	
	</div>
	</div>

<div class="fieldgroup">
	<h2>Option 4</h2>
	<div>
	<input placeholder="Wrong answer 3" id="EditExamQuestionFormModel_answer_4" name="op4" type="text" class="form-control"/>
	
	</div>
</div>
<br>
<h2>Correct answer</h2>
<div>
	<select name = "correctAns" class="form-control">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select>

</div>

</fieldset>
<fieldset class="explainquestion">

<div class="fieldgroup">

		<h2>Tags</h2>
		<textarea  id= "tagsID" rows="4" cols="50" name="tags" class="form-control">
		</textarea>
	
</div>
</fieldset>	
<br>	
<div class="button-container">
	<div class="clearfix row">
		<div class="col6 floatright prevnext">
		<center><input class="btn btn-success" name="new" type="submit" value="Submit" /></center>
		</div>
		
	</div>
</div>
</form>



</div>

</body>
</html>
