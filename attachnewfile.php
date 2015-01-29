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
 
    <title>Add new file</title>
  	
   </head>
  
  <body>

  	<?php include('includes/navbar.php'); ?>

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-offset-3">
				<h3>Add file</h3>
				<?php
				$utilisator = $_SESSION['user']['id'];
				$taskId = $_GET['task_id'];

				if(isset($_FILES['uploaded_file'])) {
			   		if($_FILES['uploaded_file']['error'] == 0) {
			        
			        $utilisator = $_SESSION['user']['id'];
			       
			        $taskId = $_GET['task_id'];
			         

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

			echo '<form action="" method="post" enctype="multipart/form-data">
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

			<p>Click <a href="displaytasks.php">here</a> to go back to all your tasks.</p>'; ?>

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
</html>




