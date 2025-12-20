<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Join our community</title>
	<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
</head>
<body>
<body>
	<?php include('header.php')?>
	<div class="formBody">
<div class="registerForm">
	<div class="formImg">
		<img src= "image/register.jpg">
	</div>
	<div class="mainform">
		<img src="image/logo.png">
 		<p id="tag">Join us on our journey towards the safer future</p>
		<form action="register_process.php" class="form" method="post">
		
		<div class="nametxt">
		<div class="txtbox">
		<label>First Name</label>
		<input type="text" name="fname" placeholder="First Name" >
		</div>

		<div class="txtbox">
		<label>Last Name</label>
		<input type="text" name="lname" placeholder="Last Name"><br>
		</div>
		</div>
		<div class="txtbox">
		<label>Email Address</label>
		<input type="email" name="email" placeholder="Enter your email Address"><br>
		</div>

		<div class="txtbox">
		<label>Username</label><br>
		<input type="text" name="username" placeholder="Choose a username"><br>
		</div>

		<div class="txtbox">
		<label>Password</label><br>
		<input type="password" name="password" placeholder="At least 6 characters"><br>
		</div>
		
		<div class="check">
		<input type="checkbox" name="news" value="newsaccept"><label>Do you wish to receive our newsletters?</label>
		</div>
		<div class="check">
		<input type="checkbox" name="policy" value="policyaccept"><label>I agree to SafeSurf's <a href="termsofuse.php" class="reglink">Terms of use </a>and <a href="privacypolicy.php" class="reglink">Privacy Policy</a> </label>
		</div>
		<div class="g-recaptcha" data-sitekey="6LegYVAqAAAAADgTQjHi1mp1-qmNTFE9E3ypPLP2"></div>
      <br/>
		<div class="formbuttons">
			<div class="regi">
				<input type="submit" name="submit" value="Register" class="btnsubmit">
		</div>
			<div class="loginask">
				<h5 class="redu">Already have an account? <a href="login.php" id="line">Login</a> instead</h5>
		</div>
	    </div>

		</form>
		</div>
	</div>
	</div> 
	<?php include('footer.php');?>
	<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Register Page</b></p>";
</script>
</body>
</body>
</html>