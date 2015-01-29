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
	<script>
	
    $('.carousel').carousel({
        interval: 2
    })	
	
	</script>
    <title>Task Manager 24</title>
  </head>
  
  <body>

	<?php include('includes/navbar.php'); ?>
	
	<div class="section-header">
	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  	<ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  	</ol>

  	<div class="carousel-inner">
    <div class="item active">
      <img src="img/poza1.jpg" alt="image1"/>
      <div class="carousel-caption">
			<div class="section-message">
			<ul class="list-inline section-buttons">
				<li>
					<a href="signup.php" class="btn btn-default btn-lg"><span class="section-buton">Get Started Now</span></a>
				</li>
			</ul>
			</div>
      </div>
    </div>
	
    <div class="item">
      <img src="img/poza2.jpg" alt="image2">
      <div class="carousel-caption">
          <div class="section-message">
			<ul class="list-inline section-buttons">
				<li>
					<a href="signup.php" class="btn btn-default btn-lg"><span class="section-buton">Get Started Now</span></a>
				</li>
			</ul>
		</div>
      </div>
    </div>
	
    <div class="item">
      <img src="img/poza3.jpg" alt="image3">
      <div class="carousel-caption">
         <div class="section-message">
			<ul class="list-inline section-buttons">
				<li>
					<a href="signup.php" class="btn btn-default btn-lg"><span class="section-buton">Get Started Now</span></a>
				</li>
			</ul>
			</div>
      </div>
    </div>
  </div>
 
  
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> 

</div>

	 <?php include('includes/footer.php'); ?>
	
	</body>
</html>