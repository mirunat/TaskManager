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
    <title>Contact</title>
  </head>
  
  
  <body>

	<?php include('includes/navbar.php'); 
	?>

	<div class="section-header-pagina">
		<div class="container">
			<div class="row">
			<div class="col-lg-3">
			<h3>Our office</h3>
			<address>
				<strong>Task Manager 24</strong><br>
				7 One Street, Suite 24<br>
				Bucharest, RO 663311<br>
				<span class="glyphicon glyphicon-phone-alt"></span>
				(123) 456-7890
			</address>
			</div>
			
			<div class="col-lg-8">
			<?php 
			$doc = new DOMDocument();
			$doc->load("contact.xml");
			$root = $doc->documentElement;

			if (isset($_POST["executat"])){
				$persoana = $doc->createElement("persoana");
				$name = $doc->createElement("name",$_POST["name"]);
				$email = $doc->createElement("email",$_POST["email"]);
				$message = $doc->createElement("message",$_POST["message"]);

				$persoana->appendChild($name);
				$persoana->appendChild($email);
				$persoana->appendChild($message);

				$root->appendChild($persoana);
				$doc->Save("contact.xml");

				echo '<h2>Message sent!</h2>';
			} 
			?>
			<h3>Contact form</h3>
			<form method="post" action="contact.php" class="form-group">
			<input class="form-control" type="text" name="name" placeholder="Name" required>
			<br>
			<input class="form-control" type="text" name="email" placeholder="Email address" required>
			<br>
			<div class="form-group">
				<textarea class="form-control" rows="5" name="message" placeholder="Message" required></textarea>
			</div>
			<br>
			<button class="btn btn-primary" type="submit" name="executat">Send</button>
			</div>
			</form>
	
			</div>
			
			</div>
		</div>
	</div>
	
			
	<?php include('includes/footer.php'); ?>

</body>
</html>