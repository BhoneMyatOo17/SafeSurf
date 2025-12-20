<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Edit your profile</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
</head>
<body>
	<?php include('header.php');?>
		
		<?php
	 
				include("dbconnect.php");

				$userid=$_GET['userid'];
				$sql ="select* from user where userid=$userid";
				$result = mysqli_query($connection, $sql);

				$user = mysqli_fetch_assoc($result);
				$fname = $user['firstname'];
				$lname = $user['lastname'];
				$email = $user['email'];
				$username = $user['username'];
				$password = $user['password'];

				echo "<div class='edit'>
			<div class='editform'>
			<h2 class='color'>User Edit Form</h2>
				<form action='edit_process.php' method='post' class='form' enctype='multipart/form-data'>
				<input type='hidden' name='userid' value = '$userid'>
					<div class='nametxt'>
					<br>
		<div class='txtbox' id ='space'>
		<label>First Name</label>
		<input type='text' name='fname' placeholder='Edit First Name' value='$fname'>
		</div>

		<div class='txtbox'>
		<label>Last Name</label>
		<input type='text' name='lname' placeholder='Edit Last Name' value='$lname'><br>
		</div>
		</div>
		<div class='txtbox'>
		<label>Email Address</label>
		<input type='email' name='email' placeholder='Edit Email Address' value='$email'><br>
		</div>

		<div class='txtbox'>
		<label>Username</label><br>
		<input type='text' name='username' placeholder='Edit User Name' value='$username'><br>
		</div>

		<div class='txtbox'>
		<label>Password</label><br>
		<input type='password' name='password' placeholder='Enter your new Password'><br>
		</div>
		<div class = 'uploadp'>
		<input type='file' name='profile'>
				<label id='upload'><svg class=' svgc w-6 h-6 text-gray-800 dark:text-white' id='colw' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>
  <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01'/>
</svg>
Upload profile picture</label></div>
		<div class='formbuttons2'>
			<div class='txtbox'>
			<input type='submit' name='submit' value='Save' class='btnsubmit'>
			</div>
			<div class='txtbox'>
			<input type='reset' name='clear' value='Reset' class='btnsubmit'>
		</div>
		    </div>
				</form>
			</div>
		</div>";
			
		
		
	?>
		<?php include('footer.php');?>
</body>
</html>