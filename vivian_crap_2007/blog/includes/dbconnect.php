<?php

	$host = "localhost";
	$username = "lingihua_admin";
	$password = "admin";
	$database = "lingihua_vivianblog";
	
	$link = mysql_connect($host, $username, $password);
	if (!$link) {
		die("Unable to connect the database because ". mysql_error());
	};
	
	mysql_select_db($database);
	
?>