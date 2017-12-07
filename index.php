<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Log-In</title>
      <link rel="stylesheet" href="css/setup.css">
</head>

<body>

  <header>
    <div class="text-vcenter">
      Begin Setup
    </div>
  </header>
  <div class="login-page">

    <div class="form">
      <form class="register-form" action="1_register.php" method="POST">
        <input type="text" name="rfid" placeholder="RFID Tag Number" required/>
        <br><br>
        <input type="text" name="full_name" placeholder="Full Name" required/>
        <input type="text" name="email" placeholder="Email Address" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="text" name="pin" placeholder="1234" maxlength="4" required/>
        <input type="tel" name="phone" placeholder="(000)-000-0000" required/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>

      <form class="login-form" action="2_login.php" method="POST">
        <input type="text" name="email" placeholder="email address" required/>
        <input type="password" name="password" placeholder="password" required/>
        <button>login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>

    </div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script  src="js/setup.js"></script>

  
</body>
</html>
