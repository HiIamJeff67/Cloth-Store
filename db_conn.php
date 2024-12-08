<?php
	$localhost = 'localhost';
	$user = 'root';
	$password = '123456789';
	$database = 'clothstore';
	
	$db = mysqli_connect($localhost, $user, $password, $database);
	if(mysqli_connect_errno()){
		print "Connect failed: ".mysqli_connect_error();
		exit();
	}

	mysqli_set_charset($db,"utf8");
	mysqli_select_db($db,"clothStore");
?>