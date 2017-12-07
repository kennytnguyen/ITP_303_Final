<?php

	$host = "303.itpwebdev.com";
	$user = "kennyngu_test";
	$pass = "#TestPassword2018";
	$db = "kennyngu_final";
	

	// 1. Establish DB Connection.
	$connect = new mysqli($host, $user, $pass, $db);

	// check connection
	if($connect->connect_error) {
		die("Connection Failed : " . $connect->error);
	} else {
		// echo "Successfully Connected";	
	}

?>