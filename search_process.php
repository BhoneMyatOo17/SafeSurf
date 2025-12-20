<?php
session_start();
include('dbconnect.php');
include('adminheader.php'); 
$keyword = mysqli_real_escape_string($connection,$_POST['keyword']);
$sql = "select * from user where firstname LIKE '%$keyword%' OR lastname LIKE '%$keyword%' OR username LIKE '%$keyword%' OR email LIKE '%$keyword%' OR role LIKE '%$keyword%';";

if(mysqli_query($connection,$sql)){
	
	$result = mysqli_query($connection,$sql);

	$numRows = mysqli_num_rows($result);
	if ($numRows>0) {
		echo "<div class='ULbody'>";

	for ($i=0; $i < $numRows; $i++) { 
		$user = mysqli_fetch_assoc($result);
		$userid = $user['userid'];
	echo "<div class='profilecard'>
		<div class='profilepic'><img src=".$user['profile']."></div>
		<div class='info'>
			<div class='userinfo'>
			<label>Name</label>
			<p>".$user['firstname']." ".$user['lastname']."</p>
			<label>Username</label>
			<p>".$user['username']."</p>
			<label>Email</label>
			<p>".$user['email']."</p>
			<label>Role</label>
			<p>".$user['role']."</p>
			<div class='useredit'>
				<a href='useredit.php?userid=$userid'>Edit</a>
				<a href='deleteuser.php?userid=$userid' onclick='confirmDel(".$userid.")'>Delete</a>
			</div>
		</div>
	</div>
</div>";
		
	}
	echo"</div>";
}	
	else{
		echo"<div class='logout'>
	<div class='logouts'>
		<h2 class='color'>No users found</h2>
		<a href='userlist.php' class='underline'>>Go back to User List<</a>
	</div>
</div>";
	}

}
	include('footer.php');

?>