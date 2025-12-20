<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Your Profile</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>
	<?php
	include('header.php');?>
	<div id="cancel"></div>
	<?php
	include('dbconnect.php');

	$userid = $_GET['userid'];
	$sql = "select * from user where userid = $userid";

	$result = mysqli_query($connection,$sql);

	$user = mysqli_fetch_assoc($result);

	echo"<div class='userback'>
	<div class='usercard'>
		<div class='pfp'>
			<img src=".$user['profile'].">
			
		</div>
			<div class='userinform'>
				<label>Name</label>
				<p>".$user['firstname'].' '.$user['lastname']."</p>
				<label>Username</label>
				<p>".$user['username']."</p>
				<label>Email</label>
				<p>".$user['email']."</p>
				<label>Username</label>
				<p>".$user['username']."</p>
				<label>Role</label>
				<p>".$user['role']."</p><br>
				<a href = 'useredit.php?userid=$userid'>Edit proifle </a><br>
				<a href='#' onclick='confirmDel(".$userid.")'> Delete Profile</a>
			</div>
	</div>
</div>"
?>
<div>
	
</div>
<div class="userin">
	<div class="useri1">
		<div class="usericontent">Join us for our upcoming social media awareness seminar.<br>
				Seminar by our director and CEO
			<br><br>
			<a href="#" class="btna">Sign up</a>
		</div>
	</div>
	<div class="useri2">
		<div class="usericontent">Attend UNICEF's upcoming social legislation seminar event.<br>
				Sign up using our link. Exclusively for members<br><br>
				<a href="#" class="btna">Register</a>
		</div>
	</div>
	<div class="useri3">
		<div class="usericontent">Check out our upcoming event schedule from SafeSurf.<br>
				You can also <a href="support.php">subscribe to our newsletter.</a><br><br>
				<a href="#" class="btna">Event Schedule</a></div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>User Profile Page</b></p>";
</script>
<script type="text/javascript">
			function confirmDel(userid){
				if(confirm("Are you sure you want to delete the user?")) {

					window.location.href="deleteuser.php?userid=" + userid;

				}else{
					document.getElementById('cancel').innerHTML="<i>Action Cancelled</i>";
				}
			}
		</script>
</body>
</html>