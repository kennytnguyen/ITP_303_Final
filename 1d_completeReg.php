<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Completed Registration</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'>
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/feedback_style.css">

  
</head>

<body>
  <div class="background"></div>
<div class="container">
		<div class="row">
				<div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
						<div class="icon">
								<span class="glyphicon glyphicon-ok"></span>
						</div>
						<!--/.icon-->
						<h1>Completed Registration</h1>
						<p>Listen to Music!</p>
						
						<iframe src="https://open.spotify.com/embed/user/axcelaration/playlist/3UUB6N9Mg02mK2lTpuZJ39" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>

						<button type="button" id="ok">Ok</button>

				</div>




				<!--/.success-->
		</div>
</div>
<!--/.container-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

 <script type="text/javascript">
    document.getElementById("ok").onclick = function () {
		location.href = 'index.php';
    };
</script>

</body>
</html>
