<?php
if(isset($_POST['btnnote']) && (isset($_POST['note'])) && (!empty($_POST['note']))) {
			$note = $_POST['note'];
			$query1 = "INSERT INTO notes (note_id, task_id, note, user_id) VALUES ('','$taskId','$note', '$utilisator')";
			$res1 = mysql_query($query1) or die(mysql_error());
			echo "<p>Note added!";
			echo "<script>setTimeout(\"location.href = 'alltasks.php';\",1500);</script>";
		} 

		echo '<form method="post" action="">
			 <textarea class="form-control" id="note" name="note"></textarea>'; ?>	
		<br>
		<button type="submit" class="btn btn-success" name="btnnote">Add note</button>
		</form>
		
		<br>
