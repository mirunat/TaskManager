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
 
    <title>Add task</title>
  	
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
			<h3>Add new task</h3>

			

				<?php
						$task1 = '';
						$utilisator = $_SESSION['user']['id'];

						if(isset($_POST['task'])&&(isset($_POST['task1']))&&(!empty($_POST['task1']))&&(isset($_POST['priority1']))&&(!empty($_POST['priority1']))&&(isset($_POST['project']))&&(!empty($_POST['project']))){
							$task1 = $_POST['task1'];
							$project1 = $_POST['project'];
							$priority1 = $_POST['priority1'];
							$deadline = $_POST['deadline'];
							$time = $_POST['time']; 
						
							$cerere = "INSERT INTO tasks (task_id, task, priority, project_id, user_id, deadline, time)
							VALUES ('', '$task1', '$priority1', '$project1', '$utilisator', '$deadline', '$time')";
							
							$rezultat = mysql_query($cerere) or die(mysql_error());

						    echo "<p>Task added! 
						    You can 
						    <a href='addcollaborator.php'> add collaborator</a>, 
						    <a href='addnote.php'> add note</a> or 
						    <a href='attachfile.php'> attach files</a> to this task 
						    or add a new task below.</p>";
						 
							}
				echo '<form method="post" action="" class="signgroup">	
					<div class="input-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-star"></span>
					</span>

					<input class="form-control" type="text" name="task1" placeholder="New task"
							value="'.$task1.'"></div><br>';
	
				echo '<div class="btn-group btn-group-justified" role="group" aria-label="...">
					<div class="btn-group" role="group">
				    <button type="button" class="btn btn-danger">Tag</button>
					<select class="form-control" name="project">';

						$query2 = "SELECT * FROM projects where user_id = $utilisator";
						$data2 = mysql_query($query2);
		
						while ($result = mysql_fetch_array($data2)) {
							echo "<option value=".$result['project_id'].">".$result['project']."</option>";
						}
				echo '</select></div>';
				
				echo '<div class="btn-group" role="group">
					<button type="button" class="btn btn-danger">Priority</button>
					<select class="form-control" name="priority1">
						<option value="1">1 (Low)</option>
						<option value="2">2</option>
						<option value="3">3 (High)</option>
					</select>
					</div></div>';
				?>

				<!--- Status
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-warning">Status</button>
					<select class="form-control" name="status">
					   <option value="started">Started</option>
					   <option value="inprogress">In progress</option>
					   <option value="completed">Completed</option>
					</select>
					</div>	
				</div> !-->

				<br>
				<?php
				
				echo '<div class="btn-group btn-group-justified" role="group" aria-label="...">
		 				<div class="btn-group" role="group">
		 					<button type="button" class="btn btn-info">Deadline</button>
							<input class="form-control" type="date" name="deadline">
						</div>

						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info">Time</button>	
							<input class="form-control" type="time" name="time">
						</div>
					</div><br>';
				?>

				<button class="btn btn-primary" type="submit" name="task">Add task</button>
				
				</form>

				</div>
			</div>
		</div>
	</div>	


<?php include('includes/footer.php'); ?>

</body>
</html>