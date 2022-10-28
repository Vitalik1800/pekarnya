<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сайт Ресторану Золота Арка - Адмін-Панель</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		.info{
	padding: 80px 0;
	margin-bottom: 25px;
	text-align: center;
}

.card{
	border: 2px solid #000;
	border-radius: 15px;
	background-color: #000;
}
	</style>
</head>
<body>
	<?php include('partials/menu.php');?>
	<div class="info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<?php 
						 $sql = "SELECT * FROM category";
						 $res = mysqli_query($conn, $sql);
						 $count = mysqli_num_rows($res);
						 ?>
						 <h1><?php echo $count;?></h1><br>
						 Категорії
					</div>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<?php 
						 $sql = "SELECT * FROM food";
						 $res = mysqli_query($conn, $sql);
						 $count = mysqli_num_rows($res);
						 ?>
						 <h1><?php echo $count;?></h1><br>
						 Страви
					</div>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<?php 
						 $sql = "SELECT * FROM orders";
						 $res = mysqli_query($conn, $sql);
						 $count = mysqli_num_rows($res);
						 ?>
						 <h1><?php echo $count;?></h1><br>
						 Загальна кількість замовлень
					</div>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<?php 
				 		 $sql4 = "SELECT SUM(total) AS Total FROM orders WHERE status='Delivered'";
				 		 $res4 = mysqli_query($conn, $sql4);
				 		 $row4 = mysqli_fetch_assoc($res4);
				 		 $total_revenue = $row4['Total'];
				 		?>
				 		<h1><?php echo $total_revenue;?> грн</h1><br>
				 		Дохід
				 	</div>
				 </div>
			</div>
		</div>
	</div>
	<br>
	
	
	<?php include('partials/footer.php');?>
</body>
</html>