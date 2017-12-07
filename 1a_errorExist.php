<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Success Modal with Animation</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'>
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/feedback_style.css">

  
</head>

<body>
  <div class="background"></div>
<div class="container">
		<!--/.row-->
		<div class="row">
				<div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-thumbs-down"></span>
						</div>
						<!--/.icon-->
						<h1>Oh no!</h1>
						<p>Email Account Exists or RFID Already Registered
								<br></p>
						<button type="button" id="back">Try again</button>
				</div>
				<!--/.success-->
		</div>
		<!--/.row-->
</div>
<!--/.container-->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script type="text/javascript">
    document.getElementById("back").onclick = function () {
        location.href = 'index.php';
    };
</script>

</body>
</html>
