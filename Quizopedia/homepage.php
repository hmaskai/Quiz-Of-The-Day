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
	session_start();
	if (!isset($_SESSION['username'])) {
    header('Location: loginPHP.php');
    exit();
}
	?>
	
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Quezopedia</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			
			<form "method="post" action="logout.php">
			
				<text style="font-size:16px;"><?php echo $_SESSION['username']?></text>
				<button  type="submit" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Log Out</a></button>
			</form>
			
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
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		  <form role="form">
			<div class="form-group">
			  <label for="comment">Question:</label>
			  <textarea class="form-control" rows="5" id="comment"></textarea>
			</div>
		  </form>
		
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