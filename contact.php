<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Contact Form</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
	<script src='https://www.google.com/recaptcha/api.js' async defer></script>

</head>
<body>
	<?php include('header.php');?>
	<div class="cformback">
		<div class="cform">
			<div class="txtalign">
			<label class="size">Contact Form</label>
			<p class="color" id="siza">Send us your message or request. We'll get back to you soon!</p></div><hr>
			<div class="cimg">
				<img src="image/contact.png">
			</div>
			<div class="contactform">
	<form action="contact_save.php" method="post" class="form">
					<div class="nametxt">
		<div class="txtbox" id ='space'>
		<label>First Name*</label>
		<input type="text" name="fname" placeholder="First Name" >
		</div>

		<div class="txtbox">
		<label>Last Name</label>
		<input type="text" name="lname" placeholder="Last Name"><br>
		</div>
		</div>
		<div class="txtbox">
		<label>Email Address*</label>
		<input type="email" name="email" placeholder="Your email Address" required><br>
		</div>

		<div class="txtbox">
		<label>Reason of contact*</label><br>
		<?php
			$country = array("General inquiries about the campaign or its mission",
							    "Feedback or suggestions",
							    "Reporting technical issues or bugs",
							    "Clarification on terms of use or privacy policies",
							    "Submitting content to be featured on the site",
							    "Inquiring about volunteer contributor opportunities",
							    "Reporting inappropriate or harmful content",
							    "Requesting removal of personal data from the website",
							    "Questions about upcoming events or webinars hosted by the SMC",
							    "Other: Please specify in your message");

				echo "<select name='reason' class='select'>
				<option>Choose your reason of contact</option>";

						for ($i=0; $i < count($country); $i++) { 
						echo"<option> $country[$i]</option>";
						}
						
				echo"</select>";
		?><br>
		</div>

		<div class="txtbox">
		<label>Your Message*</label><br>
		<textarea name="message" class="txtarea"></textarea><br>
		</div>
		<div class="g-recaptcha" data-sitekey="6LegYVAqAAAAADgTQjHi1mp1-qmNTFE9E3ypPLP2"></div>
      <br/>
		<h5 class="color2">By submitting this form, you agree to our <a href="privacypolicy.php">Privacy Policy</a> regarding how your information will be used. </h5>
		<div class="formbuttons2">
			<div class="txtbox">
			<input type="submit" name="submit" value="Submit" class="btnsubmit">
			</div>
			<div class="txtbox">
			<input type="reset" name="clear" value="Clear" class="btnsubmit">
		</div>
		    </div>
	</form>
			</div>
		</div>
	</div>
<?php include('footer.php');?>
<script type="text/javascript">
    document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Contact Page</b></p>";
</script>
</body>
</html>