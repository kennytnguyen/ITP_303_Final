<?php 

require_once 'php/init.php';

// form is submitted

  $rfid = $_POST['rfid'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pin = $_POST['pin'];
  $phone = $_POST['phone'];

  if(userExists($email) === TRUE || rfidExists($rfid) === TRUE) {
    header('Location: 1a_errorExist.php');
  } else {
    if(registerUser() === TRUE) {

      $userdata = userdata($email);
      $_SESSION['id'] = $userdata['id'];
      
      header('Location: 1a_success.php');
    } else {
      header('Location: 1a_error.php');
    }
  }
?>