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
					<a href="dashboard.php">
						<span class="glyphicon glyphicon-bell"></span>
					</a>
					</li>

					<li class="nume"><a href="editprofile.php">Hello, '.$user['name'] . '</a></li>';
					
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