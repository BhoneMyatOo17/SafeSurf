<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact request responded</title>
</head>
<body>
	<?php
		include('dbconnect.php');

		$formid=$_GET['cid'];
		$sql = "update contactform
				set status = 'Responded'
				where cid = $formid;
		";
		if (mysqli_query($connection,$sql)) {
					echo "<script>alert('Contact request responded successfully.');
					window.location.href = 'contactresponse.php';
					</script>";
				}
				else{
					echo "<script>alert('Contact request respond failed.');
					window.location.href = 'contactresponse.php';
					</script>";
				}
	?>

</body>
</html>