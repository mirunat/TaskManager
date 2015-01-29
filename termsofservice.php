
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
    <title>Contact</title>
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
				<a href="info.php">
					<span class="glyphicon glyphicon-info-sign"></span> About
				</a>
			</li>

			<ul class="nav nav-pills pull-right">
			<?php 
			session_start();
			include('dbconnection.php');
			include('functions.php');
			
			$formSign = '
			<li>
				<a href="signup.php">
					<span class="glyphicon glyphicon-chevron-right"></span> Sign Up
				</a>
			</li>';

			$form = '
				<li>
					<a href="login.php">
						<span class="glyphicon glyphicon-log-in"></span> Login
					</a>
				</li>';

			if (isLoggedIn()) { 
						$user = getCurrentUserFromSession();

						echo '
						<li>
						<a href="addtask.php">
							<span class="glyphicon glyphicon-plus"></span>
						</a>
						</li>

						<li class="nume"><a href="pagina.php">Hello, '.$user['name'] . '</a></li>';
						
						$logoutForm = '
						<li>
						<a href="logout.php">
							<span class="glyphicon glyphicon-log-out"></span>
						</a>
						</li>';
						
						echo $logoutForm;
				}
				else {
					echo $form; echo $formSign;
				}
				
			?>
			
			
		 </ul>
		
	</div>
	</div>
	</nav>
	
	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
			Terms of service
			</div>
			</div>
		</div>
	</div>
	
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
				
                    <ul class="list-inline">
                        <li>
                            <a href="contact.php">
								<span class="glyphicon glyphicon-question-sign"></span> Contact
							</a>
                        </li>
						<li>
                            <a href="termsofservice.php">
								<span class="glyphicon glyphicon-list-alt"></span> Terms of Service
							</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">&#169; All Rights Reserved to TASK MANAGER 24.</p>
                </div>
            </div>
        </div>
    </footer>
	
	
  </body>