<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: User List</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>
	<?php include('adminheader.php')?>
<br>
<div id="cancel"></div>
<hr>

	<?php
	
	if (isset($_SESSION['role'])) {

	if ($_SESSION['role'] == "admin") {
	include('dbconnect.php');

	$sql = "select * from user where role != 'admin'";

	$result = mysqli_query($connection,$sql);

	$numRows = mysqli_num_rows($result);

	
	echo "<div class='ULbody'>";

	for ($i=0; $i < $numRows; $i++) { 
		$user = mysqli_fetch_assoc($result);
		$userid = $user['userid'];

	if ($user['newsletter']==1) {
		$news = "Yes";
	}
	else{
		$news = "No";
	}
	echo "<div class='profilecard'>
		<div class='profilepic'><img src=".$user['profile']."></div>
		<div class='info'>
			<div class='userinfo'>
			<label>Name</label>
			<p>".$user['firstname']." ".$user['lastname']."</p>
			<label>Username</label>
			<p>".$user['username']."</p>
			<label>Email</label>
			<p>".$user['email']."</p>
			<label>Newsletter</label>
			<p>$news</p>
			<div class='useredit'>
				<a href='useredit.php?userid=$userid'>Edit</a>
				<a href='#' onclick='confirmDel(".$userid.")'>Delete</a>
			</div>
		</div>
	</div>
</div>";
		
	}
	echo"</div>";
}
	else{
		echo "Administrator only!<br>";
	}
}
	else{
		echo "<div class='logout'>
	<div class='logouts'>
		<h2 class='color'>You can't access this content.</h2>
		<a href='index.php' class='underline'>>Go back to Home Page<</a>
	</div></div>";
	}
	?>
		<?php include('footer.php');?>
		<script type="text/javascript">
			function confirmDel(userid){
				if(confirm("Are you sure you want to delete the user?")) {

					window.location.href="deleteuser.php?userid=" + userid;

				}else{
					document.getElementById('cancel').innerHTML="<i>Action Cancelled</i>";
				}
			}
		</script>
		<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>User list Page</b></p>";
</script>
</body>
</html>