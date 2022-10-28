<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Інформація про нас</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css">
  <style type="text/css">
      .info{
        width: 1500px;
  margin-bottom: 25px;
  text-align: center;
  margin-left: 10px;
  margin-right: 10px;
}

.card img{
  height: 1000px;
  width: 100%;
}

.card{
  text-align: center;
  border: 3px solid #000;
  border-radius: 15px;
}
</style>
</head>
<body>
	<?php
      include 'partials-front/menu.php';
  ?>
  <br>
  <div class="info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <img src="admin/images/s.jpg" alt="">
             <h1>Інформація про мене</h1>
                      <h5>Віталій Семчишин</h5>
                      <h5>Android Developer</h5>
                      <p>Я android-developer. <br>  Я володію технікою чистого коду <br> і хорошого дизайну та функціоналу. <br> Я створюю додатки різних типів. <br>Я навчаюся в ТНТУ <br> на спеціальності <br> 126 "Інформаційні системи та технології". <br> </p>
           <br>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php require 'partials-front/footer.php';?>
</body>
</html>