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
    <title>All tasks</title>

    <script>
    $(document).ready(function(){
	    $("img#edit").click(function() { 
		    $(this).parentsUntil("div").next().first().slideToggle();
		    return false;
  		}); 


	});
    </script>
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

			<h3>Display all tasks</h3>
			<a href="exporttoxml.php">Export to XML</a>

			<form method="post" action="">
				<label>Sort by: </label>
				<select name="sort">
					<option value="createdAsc">Oldest to Newest</option>
					<option value="createdDesc">Newest to Oldest</option>
					<option value="name">Alphabetical</option>
					<option value="priorityHighLow">Priority(Desc)</option>
					<option value="priorityLowHigh">Priority(Asc)</option>
				</select>
				<button class="btn btn-primary" type="submit" name="sortButton">Sort</button>
			</form>

			<?php 
			$user1 = $_SESSION['user']['id'];

			$query1 ="select tasks.task_id, tasks.task, tasks.priority, tasks.created_at, tasks.deadline, tasks.time, projects.project from tasks
					inner join users on tasks.user_id=users.id
					inner join projects on tasks.project_id = projects.project_id
					where tasks.is_deleted = 0 and tasks.user_id=$user1 ";
			
			if (isset($_POST['sortButton'])&&(isset($_POST['sort']))&&(!empty($_POST['sort']))){ 

				$query1 .= "ORDER BY ";
				

				 switch ($_POST['sort']) {
				    case 'createdDesc':
				    $query1 .= "created_at DESC;";
				    break;

				    case 'createdAsc':
				    $query1 .= "created_at ASC ";
				    break;
				  
				    case 'priorityHighLow':
				    $query1 .= "priority DESC ";
				    break;

				    case 'priorityLowHigh':
				    $query1 .= "priority ASC ";
				    break;

				    case 'name':
				    $query1 .= "task ASC ";
				    break;

				    default:
				    break;
				  }
			   
			  } 		

			$rs_result = mysql_query($query1) or die(mysql_error()); 
						  			
	        while($row = mysql_fetch_assoc($rs_result)){ ?>
	        <div id="pri_<?php echo $row["priority"] ?>"class="list-group-item">
	            <p class="editpara"><?php echo $row["task"] ?></p>
	            <p class="editpara"><?php $row["priority"] ?></p>
	            <p class="editpara">(Tag: <?php echo $row["project"] ?>)</p>
	            <a href="detailstask.php?task_id=<?php echo $row["task_id"] ?>" target="_blank">
	            	<img title="Advanced Task" id="advanced" task="<?php echo $row["task_id"] ?>" src="img/advanced.png">
	            </a>
	            <a href="deletetask.php?task_id=<?php echo $row["task_id"] ?>">
	            	<img title="Delete Task" id="delete" task="<?php echo $row["task_id"] ?>" src="img/delete.png">
	            </a>
	            <a href="#">
	            	<img title="Edit Task" id="edit" task="<?php echo $row["task_id"] ?>" src="img/edit.png">
	            </a>

	            <div role="edit" id="edit_<?php echo $row["task_id"] ?>" class="list-group-item">
	              <h5>Edit Task</h5>
	              <form action="" name="taskForm" role="form" method="post">

	              	<?php
	              		if (isset($_POST['edit'])) {
	              			if ((isset($_POST['task']))&&(!empty($_POST['task']))) $task = $_POST['task'];
	              			if ((isset($_POST['priority']))&&(!empty($_POST['priority']))) $priority = $_POST['priority'];
	              			if ((isset($_POST['task_id']))&&(!empty($_POST['task_id']))) $task_id = $_POST['task_id'];
	              			if ((isset($_POST['deadline']))&&(!empty($_POST['deadline']))) $deadline = $_POST['deadline'];
	              			if ((isset($_POST['time']))&&(!empty($_POST['time']))) $time = $_POST['time'];

	  					$query = "UPDATE tasks SET task='$task', priority='$priority', deadline='$deadline', time='$time' WHERE task_id='$task_id'";
						$res = mysql_query($query) or die(mysql_error());
						
						}
	              	?>

					<?php include 'includes/form.php'; ?>
	                <input type="submit" class="btn btn-default" id="edit-btn" name="edit" value="Edit" /><br>
	              </form>
	            </div>

        </div>

        <?php } ?>
						
		</div>
		</div>
	</div>	
</div>
</div>
 
<?php include('includes/footer.php'); ?>

</body>
</html>