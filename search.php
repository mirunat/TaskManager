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
    <title>Search</title>
  </head>
  
  <body>

	<?php include('includes/navbar.php'); ?>		

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="row">
					<div class="col-lg-12">
						<div class="bla">
							<?php include('includes/menu.php'); ?>
						</div>
					</div>
				</div>

			<div class="row">
				<div class="col-lg-6 col-md-offset-3">
					<h3>Search tasks</h3>
					<form method="post" action="sresult.php">

					    <label>Name</label>
					    <input class="form-control" type="text" name="search" required> 
										
						<br>

						<button class="btn btn-primary" type="submit" name="btnsubmit" >Search</button>

						</form>

				
					    
						</div>

	  				</div>					  
				</div>
			</div>
		</div>
	

	<?php include('includes/footer.php'); ?>
	
</body>
</html>