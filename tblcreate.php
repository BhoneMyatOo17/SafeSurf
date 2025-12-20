<?php

	$host = "localhost";
	$username = "root";
	$password = "";

	$dbname = "safesurfdb";

	$connection = mysqli_connect($host,$username,$password,$dbname);

	if ($connection) {
		echo "Database connected successfully<br>";
	}
	else{
		echo "Database connection failed<br>";
	}
	$tblname = "user";

	$sql = "create table $tblname (userid int auto_increment primary key,firstname varchar(80) not null,lastname varchar(80),email varchar(80) not null,username varchar(80) not null,password text not null, profile text,newsletter boolean, accept boolean not null,role varchar(50),remark text)";

	if (mysqli_query($connection,$sql)) {
		echo "$tblname Table is created!<br>";
	}
	else{
		echo "$tblname creation error!<br>";
	}
?>