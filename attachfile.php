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
 
    <title>Attach file</title>
  	
   </head>
  
  <body>
  	<?php include('includes/navbar.php'); ?>

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-offset-3">
					<h3>Attach file to last task </h3>

					<?php
					if(isset($_FILES['uploaded_file'])) {
					    if($_FILES['uploaded_file']['error'] == 0) {
					        
					        $utilisator = $_SESSION['user']['id'];
					        $query1 = "SELECT max(task_id) as last FROM tasks WHERE user_id = $utilisator";
					        $resultTask = mysql_query($query1) or die(mysql_error()); 
					        $rowTask = mysql_fetch_assoc($resultTask);
					        $taskId = $rowTask['last'];

					       include('includes/queryFile.php');
					    }
					    else {
					        echo 'An error accured while the file was being uploaded. '
					           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
					    }

					}
					else {
					    echo 'Please upload a file or a photo.';
					}

					echo '<br>';
					?>
					<form action = "" method="post" enctype="multipart/form-data">
						<div class="input-group input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-file"></span>
							</span>					
						    <input type="file" name="uploaded_file" class="form-control" id="uploaded_file">
						</div>
						<br>
				    	<input type="submit" value="Upload file" class="btn btn-success">
					</form>

				<br>

				<p>Click <a href="addtask.php">here</a> to go back to add a new task.</p>

				</div>
			</div>
		</div>	
	</div>
 
	<?php include('includes/footer.php'); ?>

</body>
</html>
