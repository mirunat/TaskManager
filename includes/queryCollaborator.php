<?php
if(isset($_POST['btncollaborator']) && (isset($_POST['collaborator'])) && (!empty($_POST['collaborator']))) {
			$collaborator = $_POST['collaborator'];
			$query= "INSERT INTO collaborators (user_id, collaborator_id, task_id) 
			VALUES ('$utilisator','$collaborator','$taskId')";
			$res = mysql_query($query) or die(mysql_error());
			echo "<p>Collaborator added!";
			echo "<script>setTimeout(\"location.href = 'alltasks.php';\",1500);</script>";
		} 

		echo '<form method="post" action="">
			<select class="form-control" name="collaborator">';
		$queryCollaborator = "SELECT id,name,email FROM users WHERE id != $utilisator";
		$dataCollaborator = mysql_query($queryCollaborator);

		while ($resultCollaborator = mysql_fetch_array($dataCollaborator)) { 
			echo "<option value=".$resultCollaborator['id'].">".$resultCollaborator['name'].' '.$resultCollaborator['email']."</option>";

		} 
		echo '</select>'; ?>			
		<br>
		<button type="submit" class="btn btn-success" name="btncollaborator">Add collaborator</button>
		</form>
		
		