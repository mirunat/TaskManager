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
  	<title>My profile</title>
  
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
<?php 
$user1 = $_SESSION['user']['id'];

$query2 = "SELECT * FROM users where
          id=$user1 ";
$rs_result = mysql_query($query2) or die(mysql_error()); 


?>
      
      <h3>Edit Profile</h3>

<p class="message">Bun Venit 
<?php while($row = mysql_fetch_array($rs_result))
  {
  
   echo    $row['name'] ;
  
  
  } 
  ?> !!</p> <br></br>

<form action="" name="taskForm" role="form" method="post">

                  <?php
                    if (isset($_POST['edit'])) {
                      if ((isset($_POST['name']))&&(!empty($_POST['name']))) $name = $_POST['name'];
                      
                     
                      
                      if ((isset($_POST['password']))&&(!empty($_POST['password']))) $password = $_POST['password'];

              $query = "UPDATE users SET name='$name',  password='$password' WHERE id='$user1'";
            $res2 = mysql_query($query) or die(mysql_error());
            
            }
                  ?>

          <?php include 'includes/form2.php'; ?>
                  <input type="submit" class="btn btn-default" id="edit-btn" name="edit" value="Edit" onClick="alert('Parola si Username schimbat cu succes!!')" /><br>
                </form>

  </div>
</div>
      


  <?php include('includes/footer.php'); ?>

</body>
</html>