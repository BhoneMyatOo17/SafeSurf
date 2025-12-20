<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Contact Form Responses</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
</head>
<body>
	<?php include('adminheader.php')?>
	<?php if (isset($_SESSION['role'])) {

	if ($_SESSION['role'] == "admin") {
	include('dbconnect.php');

	$sql = "select * from contactform";

	$result = mysqli_query($connection,$sql);

	$numRows = mysqli_num_rows($result);
	
	echo "<div class='formresponse'>";

	for ($i=0; $i < $numRows; $i++) { 
		$form= mysqli_fetch_assoc($result);
		$formid = $form['cid'];
	echo "<div class='response'>
		<div class='userinfo'>
			<label>Name</label>
			<p>".$form['firstname']." ".$form['lastname']."</p>
			<label>Email</label>
			<p>".$form['email']."</p>
			<label>Reason</label>
			<p>".$form['reason']."</p>
			<label>Message</label>
			<p>".$form['message']."</p>
			<label>Status</label>
			<p>".$form['status']."</p>
			<br>
			<p><a href='chagestatuss.php?cid=$formid'>Respond</a></p>
		</div>
	</div>";
		
	}
	echo"</div>";
}
	else{
		echo "Administrator only!<br>";
	}
}
	
		include('footer.php');
			?>
<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Contact Form Response Page</b></p>";
</script>
</body>
</html>