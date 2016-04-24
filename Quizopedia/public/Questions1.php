<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
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
<div class="container">
<form class="quizsettings" id="editexamquestionformmodel" action="" method="post">
<fieldset>
<div class="form-group">
	<h3><label for="EditExamQuestionFormModel_question">What is the question?</label></h3>
	<input placeholder="What is the question?" type="text" class="form-control" id="EditExamQuestionFormModel_question" name="EditExamQuestionFormModel[question]">
	<div class="errorMessage hide" id="EditExamQuestionFormModel_question_em_"></div>
</div>
</fieldset>
<fieldset class="createanswers">
<div class="fieldgroup">
	<div class="form-group">	
	
		<label for="EditExamQuestionFormModel_answer_1">Correct answer</label>
		<input placeholder="Correct answer" class="form-control" id="EditExamQuestionFormModel_answer_1" name="EditExamQuestionFormModel[answer_1]" type="text" />
		<div class="errorMessage hide" id="EditExamQuestionFormModel_answer_1_em_"></div>
	
	</div>
</div>
<div class="fieldgroup">
	<div class="form-group">
			<label for="EditExamQuestionFormModel_answer_2">Wrong answer 1</label>
			<input placeholder="Wrong answer 1" class="form-control" id="EditExamQuestionFormModel_answer_2" name="EditExamQuestionFormModel[answer_2]" type="text" />
			<div class="errorMessage hide" id="EditExamQuestionFormModel_answer_2_em_"></div>
		
	</div>
</div>
<div class="fieldgroup">
	
	<div class="form-group">
	<label for="EditExamQuestionFormModel_answer_3">Wrong answer 2</label>
	<input placeholder="Wrong answer 2" id="EditExamQuestionFormModel_answer_3" class="form-control" name="EditExamQuestionFormModel[answer_3]" type="text" />
	<div class="errorMessage hide" id="EditExamQuestionFormModel_answer_3_em_"></div>
	</div>
</div>
<div class="fieldgroup">
	
	<div class="form-group">
	<label for="EditExamQuestionFormModel_answer_4">Wrong answer 3</label>
	<input placeholder="Wrong answer 3" class="form-control" id="EditExamQuestionFormModel_answer_4" name="EditExamQuestionFormModel[answer_4]" type="text" />
	<div class="errorMessage hide" id="EditExamQuestionFormModel_answer_4_em_"></div>
	</div>
</div>
</fieldset>
<fieldset class="explainquestion">

	<div class="fieldgroup">
		<div>
			<div class="errorMessage hide" id="EditExamQuestionFormModel_explanation_em_"></div>
		</div>
		<div class="form-group">
			<label for="EditExamQuestionFormModel_explanation_url">Explanation link</label>
			<input placeholder="Explanation link" class="form-control" id="EditExamQuestionFormModel_explanation_url" name="EditExamQuestionFormModel[explanation_url]" type="text" />
			<div class="errorMessage hide" id="EditExamQuestionFormModel_explanation_url_em_"></div>
		</div>
	</div>
</fieldset>		
<div class="button-container">
	<div class="clearfix row">
		
	<center><input type="submit" class="btn btn-success" value="Submit"/></center>	
	</div>
</div>
</form>	
<h2>Tags</h2>
<div class="text">
	<input type="text" placeholder="Type & Enter" id="tag_list"/>
</div>
</div>
</body>
</html>
