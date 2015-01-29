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
 
    <title>Add note to last task</title>
  	
   </head>
  
  <body>

  	<?php include('includes/navbar.php'); ?>

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
			<div class="col-lg-6 col-md-offset-3">
			<h3>Add note</h3>
			<?php
			$utilisator = $_SESSION['user']['id'];

			$query1 = "SELECT max(task_id) as last FROM tasks WHERE user_id = $utilisator";
			$resultTask = mysql_query($query1) or die(mysql_error()); 
			$rowTask = mysql_fetch_assoc($resultTask);
			$taskId = $rowTask['last'];
			
			include('includes/queryNote.php'); ?>
			<br>
			
			<p>Click <a href="addtask.php">here</a> to go back to add a new task.</p>

			</div>
			</div>
		</div>	
	</div>
 
<?php include('includes/footer.php'); ?>

</body>
</html>



