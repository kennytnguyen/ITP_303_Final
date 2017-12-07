<?php 

require_once 'php/init.php';

// form is submitted

  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(userExists($email) === TRUE) {
    header('Location: 1a_error.php');
  } else {
    if(registerUser() === TRUE) {
      header('Location: 1a_success.php');
    } else {
      header('Location: 1a_error.php');
    }
  }
?>