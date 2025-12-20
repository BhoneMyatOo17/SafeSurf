<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="image/weblogo.png">
	<link rel="stylesheet" type="text/css" href="css/ssstyle.css?<?php echo time();?>">
</head>
<body>
	<header>
		<div class="nav">
			<div class="Logo"><a href="index.php"><img src="image/logo.png"></a></div>

			<div class="items">
				<ul>
					<li><a href="userlist.php">User List</a></li>
					<li><a href="contactresponse.php">Contact form responses</a></li>
					<li><a href="userregister.php">Register</a></li>
					<li><a href="logout.php" class="active">Logout</a></li>
				</ul>

			</div>
<div class="search">
	<form action="search_process.php" method="post" class="flex">
		<input type="text" placeholder="Search..." name="keyword">
		<button type="submit" name="search" class="searchbtn">
			<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
			  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
			</svg>
		</button>
	</form>
</div>
		</div>

	</div>
			
</div>
</header>
</body>
</html>