<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SafeSurf: Results for</title>
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" href="css/ssstyle.css">
</head>
<body>
<div>
	<?php
		include('homeheader.php');
		include('dbconnect.php');
		$keyword = mysqli_real_escape_string($connection,$_POST['keyword']);
		$sql = "select *
				from articles
				where title LIKE '%$keyword%'
				   OR content LIKE '%$keyword%'
				   OR url LIKE '%$keyword%';
				   ";
	if(mysqli_query($connection,$sql)){
	
	$result = mysqli_query($connection,$sql);

	$numRows = mysqli_num_rows($result);
	if ($numRows>0) {
		echo "<h1 id = 'push'class='color'>Search for '$keyword' in SafeSurf's Articles</h1><div class='socialback'>";

	for ($i=0; $i < $numRows; $i++) { 
		$arid = mysqli_fetch_assoc($result);
				$cid = $arid['articleid'];
				$title = mysqli_real_escape_string($connection,$arid['title']);
				$content = mysqli_real_escape_string($connection,$arid['content']);
				$url = mysqli_real_escape_string($connection,$arid['url']);

				echo"	<div class='socialcard'>
				<div class='socside1'>
				<div class = 'soc2'><h1 class='color'>$title</h1>
					
					<p>$content
					<a href='$url' target = '_blank' class='color'> ...Read more</a></p>
				</div>
				</div>
				</div>";
		};
		echo"</div>";
}else{
	echo"
	<h1 id = 'push'class='color'>Search for '$keyword' in SafeSurf's Articles</h1><div class='socialback'><div class='logout'>
	<div class='logouts'>
		<h2 class='color'>No Info found</h2>
		<a href='index.php' class='underline'>>Go back to Home page<</a>
	</div>
</div>";
	};
}
include('footer.php');
?>
</div>
</body>
</html>