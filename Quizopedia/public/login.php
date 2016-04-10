<html>
<head>
<link rel="stylesheet" href="css/loginStyle.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
	$(function() {

		$('#login-form-link').click(function(e) {
			$("#login-form").delay(100).fadeIn(100);
			$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$("#register-form").delay(100).fadeIn(100);
			$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

	});
	
	
	
function validateForm() {
	var fname = document.getElementById('fname').value; 
	var lname = document.getElementById('lname').value; 
	var email = document.getElementById('email').value; 
    var pass = document.getElementById('register-password').value; 
	var cpass = document.getElementById('confirm-password').value; 
    var n = pass.localeCompare(cpass);
    if (n!=0)
	{
	alert("mismatch pwd");
	return false;
	}
	if(fname == "")
	{
	alert("enter first name");
	return false;
	}
	if(lname == "")
	{
	alert("enter last name");
	return false;
	}
	if(pass == "")
	{
	alert("enter password");
	return false;
	}
	if(cpass == "")
	{
	alert("enter confirm password");
	return false;
	}
}


	
</script>
</head>
<body>

<?php
//session_start();
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");
if($session->is_logged_in()){
	header("Location: homepage.php");
	echo "set";
	exit();
}
else{
	echo "unset";
}
if(!isset($_SESSION["user_id"])&&!isset($_POST["username"])){
	?>
	<div class="container">
		<div class="row">
		 <h1 class="center">Quizopedia</h1>
		</div>
    	<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
				<div class=" panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="login-password" id="login-password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
												
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="register.php" method="post" role="form" style="display: none;" onSubmit="return validateForm()">
									<div class="form-group" style="float:left;width:49%;margin-right:1%">
										<input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="First name" value="">
									</div>
									<div class="form-group"style="float:left;width:49%">
										<input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Last name" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									
									<div class="form-group">
										<input type="password" name="register-password" id="register-password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="radio">Gender<br>
									  <label><input type="radio" name="genradio" value="male" checked>Male</label>
									</div>
									<div class="radio">
									  <label><input type="radio" name="genradio" value="female" >Female</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
												
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
else{

	$name = $_POST["username"];
	$pass = $_POST["login-password"];

	$_SESSION["username"] = '$_POST["username"]'.'$_POST["login-password"]';

	$q = 'SELECT * FROM login WHERE username="'.$name.'" AND password="'.$pass.'" LIMIT 1';
	

	//$found_user = mysql_query($q);
	$found_user = mysql_query($q);
	$u = mysql_fetch_array($found_user);
	//if (mysqli_num_rows($result) > 0) {
	if ($u) {
			$session->login($u);
			//echo "firstname: " . $u["fname"]. " - last name: " . $u["lname"];
			$_SESSION['username'] = $u["fname"]." ". $u["lname"];
			$_SESSION['user_id'] = $u['user_id'];
			//print_r(session_id());
			header('Location: homepage.php');
		//}
	} else {
		$message = "Username and/or Password incorrect.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: login.php');
		//session_unset(); //unset variables
		//session_destroy(); //destroy the session
		

	}

	//$database->connection->close();



}


?>



</body>
</html>