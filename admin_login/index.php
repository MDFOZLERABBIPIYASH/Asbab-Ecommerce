<?php 
	
?>


<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">
	
		<h1>Admin Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="logvf.php" method="POST">
					<input class="text" type="text" name="username" placeholder="Username" required="Username Required">
					<input class="text" type="password" name="password" placeholder="Password" required="Password Requied">
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="LOGIN">
					
					<div class="error"><b>
						<?php if(isset($_GET['error'])){ ?>
            			<p class="error"><?php echo $_GET['error']; ?></p>
        				<?php } ?></b>
						
					</div>
				</form>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>