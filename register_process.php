<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Registration</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>

<?php 
include('dbconnect.php');
if(isset($_POST['submit'])){
 
      if(isset($_POST['g-recaptcha-response'])){
 
          $captcha=$_POST['g-recaptcha-response'];
 
      }
        if(!$captcha){
 
          echo "<script type='text/javascript'>alert('Please check the the captcha form.')
        	    window.location.href = 'userregister.php';</script>";
 
          exit;
 
        }
        $secretKey = "6LegYVAqAAAAANUWHtpQiZKrz4cE5ouBhWwDSn54";
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
 
        $responseKeys = json_decode($response,true);

        if($responseKeys["success"]) {
 
      $fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$newsletter = isset($_POST['news']) ? 1 : 0;

			$sqlsearch = "select * from user where username = '$username'";

			$result = mysqli_query($connection,$sqlsearch);

			$num_rows = mysqli_num_rows($result);

			if($num_rows<1){

				$hashed_pw = password_hash($password, PASSWORD_DEFAULT);
				
				if (empty($fname)) {
					echo "<script type='text/javascript'>
						alert('Enter your First Name');
						window.location.href = 'userregister.php';
						</script>";
				}
				else if (empty($email)) {
					echo "<script type='text/javascript'>
						alert('Enter your Email Address');
						window.location.href = 'userregister.php';
						</script>";
				}else if (empty($username)) {
					echo "<script type='text/javascript'>
						alert('Enter your Username');
						window.location.href = 'userregister.php';
						</script>";
				}else if (empty($password)) {
					echo "<script type='text/javascript'>
						alert('Enter a Password');
						window.location.href = 'userregister.php';
						</script>";
				}else  if (!isset($_POST['policy'])) {
					echo "<script type='text/javascript'>
						alert('You can only register if you accept Terms of Use and Privacy Policy');
						window.location.href = 'userregister.php';
						</script>";
				}
				else{
				$sql = "insert into user(firstname, lastname, email, username, password, profile, newsletter, accept, role, remark) 
			  		values('$fname','$lname','$email','$username','$hashed_pw','profile/profile.jpg',$newsletter, true,'User','no remark')";


				if(mysqli_query($connection,$sql)){
					echo "<script type='text/javascript'>
						alert('Registered Successfully! Log in to your account.');
						window.location.href = 'login.php';
						</script>";
				}
				else{
					
					echo "<script type='text/javascript'>
						alert('There was a problem creating your account. Please try again.');
						window.location.href = 'userregister.php';
						</script>";
				}
			}
			}else{
				echo "Username already exist.";
			}
 
        }
         else {
 
                echo "<script>alert('reCaptcha verification failed').</script>";
 
        }
  }
			

?>
</body>
</html>