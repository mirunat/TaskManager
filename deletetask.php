<?php
	session_start();
	include('dbconnection.php');
	include('functions.php');
	$user = $_SESSION['user']['id']; 

	$_GET['task_id'] = trim($_GET['task_id']);
	
	if (!(isset($_GET['task_id']) && is_numeric($_GET['task_id'])))
	{
		echo "id is invalid";
		exit;
	} else {

			$query = 'UPDATE tasks SET is_deleted=1 WHERE user_id ='.$user.' and task_id="'.mysql_real_escape_string($_GET['task_id']).'"';
			
			$rezultat = mysql_query($query)or die(mysql_error());
			
		}
	header('Location: dashboard.php');
		
	exit; 
	?>

	


