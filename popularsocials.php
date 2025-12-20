<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Most Popular Social Media Apps</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
</head>
<body>
<?php include('sheader.php');
include('dbconnect.php');

		$sql = "select * from popularsocials";
		$result = mysqli_query($connection,$sql);
		$numRows = mysqli_num_rows($result);
		echo "
		<h1 id = 'push'class='color'>Most Popular Social Media Apps</h1><div class='socialback'>
		";

		for ($i=0; $i < $numRows ; $i++) { 
			$soc = mysqli_fetch_assoc($result);
				$sid = $soc['sid'];
				$sname = $soc['smname'];
				$slink = mysqli_real_escape_string($connection,$soc['smlink']);
				$sinfolink = mysqli_real_escape_string($connection,$soc['sminfolink']);
				$sinfo = mysqli_real_escape_string($connection,$soc['sminfo']);
				$slogo = mysqli_real_escape_string($connection,$soc['smlogo']);
				$safe = mysqli_real_escape_string($connection,$soc['staysafe']);
				$safety = mysqli_real_escape_string($connection,$soc['safetylink']);

				echo"	<div class='socialcard'>
				<div class='socside'>
				<div class = 'soc'><img src='image/$slogo' class= 'slogo'></div>
				<div class = 'soc1'><h1 class='color'>$sname</h1>
					
					Go to <a href='$slink' target = '_blank'>$sname's official site</a><br></div></div><br>
				<p>$sinfo<a href='$sinfolink' target = '_blank' class='color'> ...Read more</a></p><br>
					<h3 class='color'>Techniques to stay safe on $sname</h3>
					<p>$safe
					<a href='$safety' target = '_blank' class='color'> ...Read more</a></p>
			
	</div>";
		};
		echo"</div>";
?>

<?php include('footer.php');?>
<script type="text/javascript">
	document.getElementById('youarehere').innerHTML="<br><p>You are currently at <b>Most Popular Social Media Apps Page</b></p>";
</script>
</body>
</html>