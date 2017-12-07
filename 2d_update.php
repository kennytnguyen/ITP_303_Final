<?php 

require_once 'php/init.php';

// form is submitted

	$pin = $_POST['pin'];
	$phone = $_POST['phone'];

  	if(updateInfo() === TRUE) {
	  header('Location: 2d_success.php');
	} else {
	  header('Location: 2d_error.php');
	}

?>