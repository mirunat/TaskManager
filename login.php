<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.0.js"></script>
	<link href="css/test.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>
  </head>

  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		</div>
	
	 <div class="collapse navbar-collapse">
		<ul class="nav nav-pills">
			<li>
				<a href="index.php">
					<span class="glyphicon glyphicon-home"></span> Home
				</a>
			</li>
			<li>
				<a href="info.html">
					<span class="glyphicon glyphicon-info-sign"></span> About
				</a>
			</li>
			<ul class="nav nav-pills navbar-right">
				<li>
					<a href="signup.php">
						<span class="glyphicon glyphicon-chevron-right"></span> Sign Up
					</a>
				</li>
				<li>
					<a href="login.php">
						<span class="glyphicon glyphicon-log-in"></span> Login
					</a>
				</li>
			</ul>
		</ul>
	</div>
	</div>
	</nav>
		
	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-offset-3">
					<h3>Login</h3>
					<form method="post" action="loginform.php" class="logingroup">
						<div class="input-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope"></span>
					</span>
					<input class="form-control" type="text" placeholder="Email address" name="email" required>
					</div>
					<br>
					<div class="input-group input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</span>
						<input class="form-control" type="password" placeholder="Password" name="password" required>
					</div>
					<br>
					<button class="btn btn-primary" type="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	 
	<?php include('includes/footer.php'); ?>
	
  </body>