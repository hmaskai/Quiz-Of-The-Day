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
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <link rel="stylesheet" href="../css/homepage.css">
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
			  <li><a href="#"><span class="glyphicon glyphicon-user"></span>Professor</a></li>
			  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span>Log Out</a></li>
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
	
	<input placeholder="Wrong answer 3" id="EditExamQuestionFormModel_answer_4" name="op4" type="text" class="form-control"/>
	
	</div>

<br>
<h2>Correct answer</h2>

	<select name = "correctAns" class="form-control">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select>

</fieldset>
<br>
<fieldset class="explainquestion">

<div class="fieldgroup">

<div>
	
    <div style="float:left; width:20%; "><ul type="none">
		<li>
		  <input type="checkbox" name="BasicConcept[]" id="option" value="Basic Concepts"><label for="option"> Basic Concepts</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="BasicConcept[]" class="subOption" value="Class"> Class</label></li>
			<li><label><input type="checkbox" name="BasicConcept[]" class="subOption" value="Object"> Object</label></li>
			<li><label><input type="checkbox" name="BasicConcept[]" class="subOption" value="Variables"> Variables</label></li>
		  </ul>
		</li>
	</ul></div>
    <div style="float:left; width:24%; "><ul type="none">
		<li>
		  <input type="checkbox" name="DataTypes[]" id="option1" value="Data Types"><label for="option1"> Data Types</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="DataTypes[]" class="Data_Types" value="Wapper Classes"> Wrapper Classes</label></li>
			<li><label><input type="checkbox" name="DataTypes[]" class="Data_Types" value="String"> String</label></li>
			<li><label><input type="checkbox" name="DataTypes[]" class="Data_Types" value="Constants"> Constants</label></li>
			<li><label><input type="checkbox" name="DataTypes[]" class="Data_Types" value="Primitive Data Type"> Primitive Data Type</label></li>
		  </ul>
		</li>
	</ul></div>		
    <div style="float:left; width:27%; "><ul type="none">
		<li>
		  <input type="checkbox" name="Operation[]" id="option2" value="Operations"><label for="option2"> Operations</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="Operation[]" class="Operations" value="Boolean Expressions"> Boolean Expressions</label></li>
			<li><label><input type="checkbox" name="Operation[]" class="Operations" value="Arithmetic Expressions"> Arithmetic Expressions</label></li>
		  </ul>
		</li>
	</ul></div>
	<div style="float:left; width:27%; "><ul type="none">
		<li>
		  <input type="checkbox" id="option3" name="Array[]" value="Arrays"><label for="option3"> Arrays</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="Array[]" class="Arrays" value="Two Dimensional Array"> Two Dimensional Array</label></li>
			<li><label><input type="checkbox" name="Array[]" class="Arrays" value="ArrayList"> ArrayList</label></li>
		  </ul>
		</li>
	</ul></div>
	<div style="float:left; width:20%; clear:left; "><ul type="none">
		<li>
		  <input type="checkbox" id="option4" name="ControlStructure[]" value="ControlStructures"><label for="option4"> Control Structures</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="Exceptions"> Exceptions</label></li>
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="Nested Loops"> Nested Loops</label></li>
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="For Loop"> For Loop</label></li>
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="Do-While Loop"> Do-While Loop</label></li>
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="Switch Statement"> Switch Statement</label></li>
			<li><label><input type="checkbox" name="ControlStructure[]" class="Control_Structures" value="Decision Types"> Decision Types</label></li>
		  </ul>
		</li>
	</ul></div>
		<div style="float:left; width:27%; "><ul type="none">
		<li>
		  <input type="checkbox" id="option5" name="InterfaceInheritance[]" value="InterfaceInheritances"><label for="option5"> Interface & Inheritance</label>
		  <ul type="none">
			<li><label><input type="checkbox" name="InterfaceInheritance[]" class="Interface_Inheritance" value="Interface"> Interface</label></li>
			<li><label><input type="checkbox" name="InterfaceInheritance[]" class="Interface_Inheritance" value="Inheritance"> Inheritance</label></li>
		  </ul>
		</li>
	</ul></div>	


	
	</div>
  
  
	
	
	

	<script language="javascript">
		var checkboxes = document.querySelectorAll('input.subOption'),
		checkall = document.getElementById('option');

		for(var i=0; i<checkboxes.length; i++) {
		  checkboxes[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.subOption:checked').length;

			checkall.checked = checkedCount > 0;
			checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
		  }
		}

		checkall.onclick = function() {
		  for(var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = this.checked;
		  }
		}


		var checkboxes1 = document.querySelectorAll('input.Data_Types'),
		checkall1 = document.getElementById('option1');

		for(var i=0; i<checkboxes1.length; i++) {
		  checkboxes1[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.Data_Types:checked').length;

			checkall1.checked = checkedCount > 0;
			checkall1.indeterminate = checkedCount > 0 && checkedCount < checkboxes1.length;
		  }
		}

		checkall1.onclick = function() {
		  for(var i=0; i<checkboxes1.length; i++) {
			checkboxes1[i].checked = this.checked;
		  }
		}
		
		
		var checkboxes2 = document.querySelectorAll('input.Operations'),
		checkall2 = document.getElementById('option2');

		for(var i=0; i<checkboxes2.length; i++) {
		  checkboxes2[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.Operations:checked').length;

			checkall2.checked = checkedCount > 0;
			checkall2.indeterminate = checkedCount > 0 && checkedCount < checkboxes2.length;
		  }
		}

		checkall2.onclick = function() {
		  for(var i=0; i<checkboxes2.length; i++) {
			checkboxes2[i].checked = this.checked;
		  }
		}
		
		var checkboxes3 = document.querySelectorAll('input.Arrays'),
		checkall3 = document.getElementById('option3');

		for(var i=0; i<checkboxes3.length; i++) {
		  checkboxes3[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.Arrays:checked').length;

			checkall3.checked = checkedCount > 0;
			checkall3.indeterminate = checkedCount > 0 && checkedCount < checkboxes3.length;
		  }
		}

		checkall3.onclick = function() {
		  for(var i=0; i<checkboxes3.length; i++) {
			checkboxes3[i].checked = this.checked;
		  }
		}
		
		var checkboxes4 = document.querySelectorAll('input.Control_Structures'),
		checkall4 = document.getElementById('option4');

		for(var i=0; i<checkboxes4.length; i++) {
		  checkboxes4[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.Control_Structures:checked').length;

			checkall4.checked = checkedCount > 0;
			checkall4.indeterminate = checkedCount > 0 && checkedCount < checkboxes4.length;
		  }
		}

		checkall4.onclick = function() {
		  for(var i=0; i<checkboxes4.length; i++) {
			checkboxes4[i].checked = this.checked;
		  }
		}
		
		var checkboxes5 = document.querySelectorAll('input.Interface_Inheritance'),
		checkall5 = document.getElementById('option5');

		for(var i=0; i<checkboxes5.length; i++) {
		  checkboxes5[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.Interface_Inheritance:checked').length;

			checkall5.checked = checkedCount > 0;
			checkall5.indeterminate = checkedCount > 0 && checkedCount < checkboxes5.length;
		  }
		}

		checkall5.onclick = function() {
		  for(var i=0; i<checkboxes5.length; i++) {
			checkboxes5[i].checked = this.checked;
		  }
		}

	</script>


</div>


<!--new code for tag
<div class="fieldgroup">

	
	<h2>Tags</h2>
	<fieldset id="tag_choice">
        <h4>Please select a topic</h4>
        <select name="tag" id="tag_list" size="1" onchange="javascript:SetRegionBytag(this);">
			<option value="00">Select topic First</option>
            <option value="Object-Oriented Programming Concepts" >Object-Oriented Programming Concepts</option>
			<option value="Language Basics">Language Basics</option>
			
			<option value="00">Select tag First</option>
        </select>
    </fieldset>

    <fieldset id="tag_choice">
        <h4>Please select a tag</h4>
        <select name="region" id="region_list" size="1">
            <option value="00">Select tag First</option>
        </select>
    </fieldset>		
		
	
	<script language="javascript">
	function SetRegionBytag(tag){
    var dropdown = document.getElementById("region_list");

    switch (tag.value){
        case 'Object-Oriented Programming Concepts':{
            dropdown.options.length = 0;
            dropdown.options[dropdown.options.length] = new Option('Select One','0');
            dropdown.options[dropdown.options.length] = new Option('Object','Object');
            dropdown.options[dropdown.options.length] = new Option('Class','Class');
            dropdown.options[dropdown.options.length] = new Option('Inheritance','Inheritance');
            dropdown.options[dropdown.options.length] = new Option('Interface','Interface');
			dropdown.options[dropdown.options.length] = new Option('Package','Package');
            break;
        }
		 case 'Language Basics':{
            dropdown.options.length = 0;
            dropdown.options[dropdown.options.length] = new Option('Select One','0');
            dropdown.options[dropdown.options.length] = new Option('Variables','Variables');
            dropdown.options[dropdown.options.length] = new Option('Operators','Operators');
            dropdown.options[dropdown.options.length] = new Option('Inheritance','Inheritance');
            dropdown.options[dropdown.options.length] = new Option('Interface','Interface');
			dropdown.options[dropdown.options.length] = new Option('Package','Package');
            break;
        }
        default:{
            alert(tag.value + ' is not yet supported');
            dropdown.options.length = 0;
            dropdown.options[dropdown.options.length] = new Option('Select tag First','00');
            document.form1.capital_city.value = '';
            break;
        }
    }
}
	</script>
	
	
			
		
		
	
	
</div>-->
</fieldset>	
<br>	
<div class="button-container">
	<div class="clearfix row">
		<div class="col6 floatright prevnext">
		<center><input class="btn btn-success" name="new" type="submit" value="Submit" /></center>
		</div>
		
	</div>
</div>
<button onclick="myButton()">Click me</button>
<script>
function myButton()
{
window.location="http://www.siteforinfotech.com";
}
</script>
</form>



</div>

</body>
</html>
