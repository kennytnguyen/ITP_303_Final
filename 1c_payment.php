<?php

require_once 'php/init.php';
$userdata = getUserDataByUserId(($_SESSION['id']));
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Enter Payment Info</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/setup.css">

  
</head>
<body>
<header>
  <div class="text-vcenter">
    Enter Payment Info
  </div>
</header>
<div class = "creditBody">
  <div class="container">
<div class="row">
<!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
<div class="col-xs-12 col-md-4">


<div class="login-page">
      <!-- CREDIT CARD FORM STARTS HERE -->
      <div class="panel panel-default credit-card-box">
        <div class="panel-heading display-table" >
          <div class="row display-tr" >
            <h3 class="panel-title display-td" >Payment Details</h3>
            <div class="display-td" >                            
            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
            </div>
          </div>                    
        </div>
      <div class="panel-body">

      <form role="form" id="payment-form">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="emailAddress">EMAIL ADDRESS</label>
                <div class="input-group">
                  <input 
                    type="text"
                    class="form-control"
                    name="email"
                    value=<?php echo $userdata['email'] ?> 
                    required autofocus 
                  />
                </div>
              </div>                            
            </div>
          </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="emailAddress">FULL NAME</label>
                <div class="input-group">
                  <input 
                    type="text"
                    class="form-control"
                    name="full_name"
                    value=<?php echo $userdata['full_name'] ?>
                    required autofocus 
                  />
                </div>
              </div>                            
            </div>
          </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="cardNumber">CARD NUMBER</label>
                <div class="input-group">
                  <input 
                    type="tel"
                    class="form-control"
                    name="cardNumber"
                    placeholder="Valid Card Number"
                    autocomplete="cc-number"
                    required autofocus 
                  />
                  <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                </div>
              </div>                            
            </div>
          </div>

        <div class="row">
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              <label for="cardExpiry"><span class="hidden-xs">EXP </span><span class="visible-xs-inline">EXP</span> MONTH</label>
                <input 
                  type="tel" 
                  class="form-control" 
                  name="cardExpiryMo"
                  placeholder="MM"
                  autocomplete="cc-exp"
                  required 
                />
            </div>
          </div>

        <div class="row">
          <div class="col-xs-4 col-md-4">
            <div class="form-group">
              <label for="cardExpiry"><span class="hidden-xs">EXP</span><span class="visible-xs-inline">EXP</span> YEAR</label>
                <input 
                  type="tel" 
                  class="form-control" 
                  name="cardExpiryYr"
                  placeholder="YYYY"
                  autocomplete="cc-exp"
                  required 
                />
            </div>
          </div>

        <div class="col-xs-3 col-md-3">
          <div class="form-group">
            <label for="cardCVC">CV CODE</label>
              <input 
                type="tel" 
                class="form-control"
                name="cardCVC"
                placeholder="CVC"
                autocomplete="cc-csc"
                required
              />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <button class="btn btn-success btn-lg btn-block" type="submit" id="finish">Finish</button>
          </div>
        </div>

        <div class="row" style="display:none;">
          <div class="col-xs-12">
            <p class="payment-errors"></p>
          </div>
        </div>
    </form>
  </div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->
</div>

</div>            



</div>
</div>
</div>
  <!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
</body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js'></script>
  <script  src="js/payment.js"></script>

  <script type="text/javascript">
    document.getElementById("finish").onclick = function () {
        location.href = '1d_cardReg.php';
    };
</script>


</body>
</html>