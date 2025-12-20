<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
 
          echo "<script type='text/javascript'>alert('Please check the the captcha form.');
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
			
			$reason = $_POST['reason'];
			$messageinput = $_POST['message'];
			$status = 'Pending';
			
			$message = mysqli_real_escape_string($connection,$messageinput);

			if (empty($fname)) {
					echo "<script type='text/javascript'>
						alert('Enter your First Name');
						window.location.href = 'contact.php';
						</script>";
				}
				else if (empty($email)) {
					echo "<script type='text/javascript'>
						alert('Enter your Email Address');
						window.location.href = 'contact.php';
						</script>";
				}else if (empty($username)) {
					echo "<script type='text/javascript'>
						alert('Enter your Username');
						window.location.href = 'contact.php';
						</script>";
				}else if ($reason == "Choose your reson of contact") {
					echo "<script type='text/javascript'>
						alert('Choose a reason for contact');
						window.location.href = 'contact.php';
						</script>";
					}else if (empty($message)) {
					echo "<script type='text/javascript'>
						alert('Please Enter the messaeg you are trying to submit.');
						window.location.href = 'contact.php';
						</script>";
					}else{
						$sql="Insert into contactform (firstname,lastname,email,reason,message,status)
						values('$fname','$lname','$email','$reason','$message','$status');";
					
						if(mysqli_query($connection,$sql)){
					echo "<script type='text/javascript'>
						alert('Your message is sent successfully. SafeSurf will get back to you soon.');
						window.location.href = 'contact.php';
						</script>";
				}
				else{
					
					echo "<script type='text/javascript'>
						alert('There was a problem submitting your message. Please try again.');
						window.location.href = 'contact.php';
						</script>";
				}
			}
			}else{
				echo"<script type='text/javascript'>
						alert('Captcha failed. try again');
						window.location.href = 'contact.php';
						</script>";
			}
		}


			
?>
</body>
</html>

