<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete User</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>
	<?php
		
				include("dbconnect.php");
				$userid=$_GET['userid'];
				$sql = "delete from user where userid=$userid";
				
				if (mysqli_query($connection,$sql)) {
					echo "<script>alert('User deleted successfully.');
						window.location.href = 'userlist.php';
					</script>";
					
				}
				else{
					echo "<script>alert('Account Deletion failed');
						window.location.href = 'userlist.php';
					</script>";
				}
			
		
		
	?>
</body>
</html>