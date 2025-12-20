<?php
	$adminpsw = "bmo1989";

	$hashedPw = password_hash($adminpsw, PASSWORD_DEFAULT);
	echo $hashedPw;
	//$2y$10$5tIdoGCmlvlqfRGUgMk1U.sjZP4fosExJ3/KnPkHxmcXEZf8l4PgS

?>