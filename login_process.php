<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logging in....</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>

<?php
if (isset($_SESSION['login_count'])) {
		$counter = $_SESSION['login_count'];
	}else{
		$counter = 0;
	}
	
	include("dbconnect.php");
if(isset($_POST['submit'])){
 
      if(isset($_POST['g-recaptcha-response'])){
 
          $captcha=$_POST['g-recaptcha-response'];
 
      }
        if(!$captcha){
 
         echo "<script type='text/javascript'>alert('Please check the the captcha form.')
        	    window.location.href = 'login.php';</script>";
 
          exit;
 
        }
        $secretKey = "6LegYVAqAAAAANUWHtpQiZKrz4cE5ouBhWwDSn54";
        $ip = $_SERVER['REMOTE_ADDR'];
 
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
 
        $responseKeys = json_decode($response,true);

 
        if($responseKeys["success"]) {
 
                

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "select * from user where username ='$username'";

	$result = mysqli_query($connection,$sql);
	$numRows = mysqli_num_rows($result);

	if ($numRows==1) {
		$record = mysqli_fetch_assoc($result);
		$hashedPw = $record['password'];
	
		if (password_verify($password, $hashedPw)) {
			$userid = $record['userid'];
			if ($username =="admin" && $record['role']=="admin") {
				$_SESSION['role'] = "admin";
				echo "<script type='text/javascript'>
				window.location.href = 'userlist.php';
			</script>";
			}
			else{
				echo "<script type='text/javascript'>
				window.location.href = 'userprofile.php?userid=$userid';
			</script>";
			}
		}
		else{
			
				$counter++;
				$_SESSION['login_count'] = $counter;
				if ($counter==3) {
					echo "<script type='text/javascript'>
					
					window.location.href = 'loginTimer.php';
				</script>";
				setcookie("login_count", "c", time()+10*60);
				}
				else{
					echo "<script type='text/javascript'>
					alert('Incorrect password. Please try again.');
					window.location.href = 'login.php';
				</script>";
				}
		}
}
		else{
			echo "<script type='text/javascript'>
					alert('Username doesn\'t exist. Try again');
					window.location.href = 'login.php';
				</script>";
		}
 
        }
         else {
 
               echo "<script>alert('reCaptcha verification failed').</script>";
 
        }
  }

	
?>
<hr><a href="login.php">Go back</a>
</body>
</html>