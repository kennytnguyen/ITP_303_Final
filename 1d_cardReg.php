<?php 

require_once 'php/init.php';

// form is submitted
  $card_num = $_POST['cardNumber'];
  $exp_month = $_POST['cardExpiryMo'];
  $exp_year = $_POST['cardExpiryYr'];
  $cvc = $_POST['cardCVC'];

  if(addCard() === TRUE) {
    header('Location: 1d_completeReg.php');
  } else 
    echo ($_SESSION['id']);
    //header('Location: 1d_completeReg.php');{
  }

?>