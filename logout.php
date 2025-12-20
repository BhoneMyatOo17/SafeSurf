<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<title>Logout</title>
	<link rel="stylesheet" href="css/ssstyle.css">
</head>
<body>
	<?php include('header.php');?>
<?php
	session_destroy();
	unset($_SESSION['role']);
?>
<div class="logout">
	<div class="logouts">
		<h2 class="color">Logged out successfully!</h2>
		<a href="index.php" class="underline">>Go back to Home Page<</a>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Logout Page</b></p>";
</script>
</body>
</html>