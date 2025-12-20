<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Log in to your account</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php include('header.php');

	if (!isset($_COOKIE['login_count'])) {
			
	?>
<div class="logback">
	<div class="loginForm">
		<h2 class="color">Log in to your account.</h2>
		<form action = 'login_process.php' method="post" class="form">
			<div class="txtbox">
			<label>Username</label><br>
			<input type="text" name="username" placeholder="Enter your username"><br>
			</div>
			<div class="txtbox">
			<label>Password</label><br>
			<input type="password" name="password" placeholder="Enter password"><br>
			</div>
			<div class="g-recaptcha" data-sitekey="6LegYVAqAAAAADgTQjHi1mp1-qmNTFE9E3ypPLP2"></div>
      <br/>
			<div class="formbuttons2">
			<div class="txtbox">
			<input type="submit" name="submit" value="Login" class="btnsubmit">
			</div>
			<div class="txtbox">
			<input type="reset" name="clear" value="Clear" class="btnsubmit">
		</div>
		    </div>
		    <p id="reg">Doesn't have an account?<a href="userregister.php"> Register here</a></p>
		</form>
	</div>
</div>
	<?php
		}
		else{
			echo"<div class='logout'>
	<div class='logouts'>
		<h2 class='color'>Login Access is blocked</h2>
		<a href='index.php' class='underline'>>Go back to Home Page<</a>
	</div>
</div>";
		}
include('footer.php');
	?>
	<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Login Page</b></p>";
</script>

</body>
</html>