<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit process</title>
</head>
<body>
	<?php include('header.php')?>

<?php
	if(isset($_POST['submit'])){
				include("dbconnect.php");
				$userid = $_POST['userid'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$profilename = $_FILES['profile']['name'];
				$tempName = $_FILES['profile']['tmp_name'];
	$profilepath = mysqli_real_escape_string($connection,"profile/".$username."_".$profilename);
				copy($tempName, $profilepath);
				$hashedPw = password_hash($password, PASSWORD_DEFAULT);
				
				$sql = "update user 
						set firstname = '$fname', 
						lastname = '$lname', 
						email = '$email', 
						username = '$username', 
						password = '$hashedPw',
						profile = '$profilepath' 
						where userid = $userid;";

				if (mysqli_query($connection,$sql)) {
					echo "<script>alert('Saved Successfully!');
					window.location.href = 'userprofile.php?userid=$userid';
					</script>";
				}
				else{
					echo "<script>alert('There was a problem saving your information. Please try again');
					window.location.href = 'useredit.php?userid=$userid';</script>";
				}
			}
		
	else{
		echo "Session failed";
	}
	?>
<?php include('footer.php')?>
</body>
</html>