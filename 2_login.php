<?php 

require_once 'php/init.php';

if(logged_in() === TRUE) {
  header('Location: 2c_update_info.php');
}

// form submiited
if($_POST) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pin = $_POST['pin'];


  if(userExists($username) == TRUE) {
    $login = login($username, $password);
    if($login) {
      $userdata = userdata($email);

      header('location: 2c_update_info.php');
      exit();
        
    } else {
      header('Location: 2a_errorWrong.php');
    }
  } else{
    header('Location: 2a_errorDNE.php');
  }

} // /if


?>