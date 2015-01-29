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
    <title>Add tag</title>
  </head>
  
   </head>
  
  <body>

	<?php include('includes/navbar.php'); ?>

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="bla">
						<?php include('includes/menu.php'); ?>
					</div>
			</div>
		</div>
		<div class="row">
			
				<div class="col-lg-6 col-md-offset-3">
					<h3>Add new tag</h3>

				
						<?php 

						$project1 = '';
						$utilisator = $_SESSION['user']['id'];

						if(isset($_POST['tag'])&&(isset($_POST['project1']))&&(!empty($_POST['project1']))){
							$project1 = $_POST['project1'];
						
							$cerere = "INSERT INTO projects (project_id, project, user_id)
							VALUES ('', '$project1', '$utilisator')";
							
							$rezultat = mysql_query($cerere) or die(mysql_error());

						    echo "Tag added!";
						    echo "<script>setTimeout(\"location.href = 'alltags.php';\",1500);</script>";

						} 

						echo '<br>';
						
						$form = '<form method="post" action="" class="signgroup">	
							<div class="input-group input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-plus"></span>
								</span>'; 

						$form .= '<input type="text" name="project1" placeholder="New tag" class="form-control"
						value="'.$project1.'"></div><br>';
						
						$form .= '<input type="submit" class="btn btn-primary" value="Add tag" name="tag">
						</form>';
						echo $form;

						?>

					


				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>

</body>
</html>
