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
    <script type="text/javascript">
		function showme(id, linkId) {
			var divId = document.getElementById(id);
			var linkRead = document.getElementById(linkId);
			if (divId.style.display == 'block') {
				linkRead.innerHTML = 'Optional';
				divId.style.display = 'none';
			}
			else {
				linkRead.innerHTML = 'Optional';
				divId.style.display = 'block';
			}
		}
	</script>
    <title>Add task</title>
  </head>
  
   </head>
  
  <body>

	<?php include('includes/navbar.php'); ?>
	
	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-offset-3">

						<h3>Display all tasks</h3>
					    <h6>Tre sa dai click pe all tasks si apoi pe next ca altfel nu merge.Deci BUG. Cred ca trebuie functie separata</h6>
					    <p>O sa fie doar taskul cu culoare in fct de prioritate, 
						apoi glyphicons: more (asterix si apar detalii, inclusiv colaboratori si files),
						edit(formular de update),delete(are you sure?)</p>

					    <?php
						$user = $_SESSION['user']['id'];
						$num_rec_per_page=3;

						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
						$start_from = ($page-1) * $num_rec_per_page; 
						$sql = "
							select tasks.task, tasks.priority, projects.project from tasks
								inner join users on tasks.user_id=users.id
								inner join projects on tasks.project_id = projects.project_id
								where tasks.user_id=$user 
							LIMIT $start_from, $num_rec_per_page"; 
						$rs_result = mysql_query ($sql); //run the query

						echo "<table>";
						while ($row = mysql_fetch_assoc($rs_result))
						{
							echo "<tr><td> Task name: ".$row['task']."</td>"; 
							echo '<td><span class="glyphicon glyphicon-asterisk"></span></td>
							<td><span class="glyphicon glyphicon-pencil"></span></td>
							<td><span class="glyphicon glyphicon-trash"></span></td></tr>';
							echo "<tr><td> Task priority: ".$row['priority']."</td></tr>"; 
							echo "<tr><td> Tag: ".$row['project']."</td></tr>"; 
						}
						echo "</table>";
						
						$sql = "SELECT * FROM tasks where tasks.user_id=$user"; 
						$rs_result = mysql_query($sql); //run the query
						$total_records = mysql_num_rows($rs_result);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page); 

						echo "<a href='displaytask.php?page=1'>".'|<'."</a>"; // Goto 1st page  

						for ($i=1; $i<=$total_pages; $i++) { 
						            echo "<a href='displaytask.php?page=".$i."'>".$i."</a>"; 
						}; 
						echo "<a href='displaytask.php?page=$total_pages'>".'>|'."</a>";

						


						?>

					    </div>

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