<?php

require_once 'php/init.php';
$userdata = getUserDataByUserId(($_SESSION['id']));
?>

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
      <form action="2d_update.php" method="POST">
        <input type="text" name="full_name" value=<?php echo $userdata['full_name'] ?> required/>
        <input type="text" name="pin" placeholder="1234"  maxlength="4" required/>
        <input type="tel" name="phone" placeholder="(000)-000-0000" required/>
        <button>Update</button>
      </form>

    </div>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script  src="js/setup.js"></script>

  
</body>
</html>