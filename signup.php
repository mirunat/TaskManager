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
	<title>Sign Up</title>
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
				<a href="test.php">
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
			
			<?php
		include('database.php');
		include('signupform.php');

		if(count($_POST))
		{
			$mesaj = new SignUp($_POST);
			$saved = $mesaj->save();
			
			if($saved)
			{
				echo 'Registered. You can login now.'; exit;
			}
			else
			{
				$errors = $mesaj->getErrors();
			}
		}	

			echo '<h3>Sign Up</h3>';
			//var_dump($_POST);
			
			$name = '';
			if(isset($_POST['name'])){
				$name = $_POST['name'];
				//echo $name;
			}
			
			$email='';
			if(isset($_POST['email'])){
				$email = $_POST['email'];
				//echo $email;
			}
			
			$password='';
			if(isset($_POST['password'])){
				$password = $_POST['password'];
				//echo $password;
			}
			
			//creezi formular de inregistrare
		$form = '<form method="POST" class="signgroup">
		<div class="input-group input-group">
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-user"></span>
				</span>';
	
		$form .= '<input type="text" name="name" placeholder="Name" class="form-control '.(isset($errors['name'])?'error':'').'" value="'.$name.'"></div><br>';
		if(isset($errors['name']))
		{
			$form .= '<div class="error">'.$errors['name'].'</div>'; //pun border: 1px solid red si color: red pt invalid name -- repet asta pentru fiecare
		}	
		
		$form .= '<div class="input-group input-group">
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-envelope"></span>
				</span>
				<input type="text" name="email" placeholder="Email address" class="form-control '.(isset($errors['email'])?'error':'').'" value="'.$email.'"></div><br>'; 
		if(isset($errors['email']))
		{
			$form .= '<div class="error">'.$errors['email'].'</div>'; 
		}		
		
		$form .= '<div class="input-group input-group">
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-lock"></span>
				</span>
				<input type="password" name="password" placeholder="Password" class="form-control '.(isset($errors['password'])?'error':'').'" value="'.$password.'"></div><br>';
		if(isset($errors['password']))
		{
			$form .= '<div class="error">'.$errors['password'].'</div>'; 
		}	
		
		$form .= '<input type="submit" class="btn btn-primary" value="Sign Up">
				</form>';
			echo $form;
		
		if (!empty($errors)) {
			$form .= '<p class="error">';
			foreach($errors as $e) {
				$form .= $e.'<br />';
			}
			$form .= '</p>';
	    }
		
		//TO DO : daca emailul exista in baza de date - mesaj pentru utilizator - email already registered
		?>
			<br>
			<p class="goodtext">By signing up, you are agreeing to our <a href="termsofservice.php">Terms of Service.</a></p>
			<p><a href="login.php">Already have an account? Login</a></p>
			</div>
			</div>
		</div>
	</div>
	
<?php include('includes/footer.php'); ?>
	
  </body>
</html>