<?php 

require_once 'php/init.php';

// form is submitted
  $card_num = $_POST['card_num'];
  $exp_month = $_POST['exp_month'];
  $exp_year = $_POST['exp_year'];
  $cvc = $_POST['cvc'];

  if(addCard() === TRUE) {
    header('Location: 1d_completeReg.php');
  } else {
    header('Location: 1d_invalidCard.php');
  }

?>