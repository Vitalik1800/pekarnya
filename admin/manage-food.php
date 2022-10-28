<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сайт Ресторану Золота Арка - Панель страв</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		.container{
			margin-top: 20px;
		}
		a{
			text-decoration: none;
		}
	</style>
	</style>
</head>
<?php include('partials/menu.php');?>
	<div class="container">
		<div class="container">
			<br><h1>Керування стравами</h1>
			<br>
			<a href="add-food.php" class="btn btn-success">Додати</a>
			<br><br><br>
			<div class="table-responsive">
				<table class="table table-bordered ">
				<tr>
					<th>Номер</th>
					<th>Назва</th>
					<th>Ціна</th>
					<th>Зображення</th>
					<th>Чи рекомендована?</th>
					<th>Чи активна?</th>
					<th>Дії</th>
				</tr>
				<?php
				 $sql = "SELECT * FROM food";	
				 $res = mysqli_query($conn, $sql) or die(mysqli_error());
				 $count = mysqli_num_rows($res);
				 $sn = 1;
				 if($count>0){
				 	while($count=mysqli_fetch_assoc($res)){
				 		$id = $count['id'];
				 		$title = $count['title'];
				 		$price = $count['price'];
				 		$image_name = $count['image_name'];
				 		$featured = $count['featured'];
				 		$active = $count['active'];
				 		?>
				 		<tr>
							<td><?php echo $sn++;?></td>
							<td><?php echo $title;?></td>
							<td><?php echo $price;?> грн</td>
							<td>
								<?php 
								  if($image_name!=""){
								  	?>
								  	<img src="images/food/<?php echo $image_name;?>" width="50px" height="30px">
								  	<?php
								  } else{
								  	echo "<div class='error'>Зображення не додане.</div>";
								  }
								?>


								
							</td>
							<td><?php echo $featured;?></td>
							<td><?php echo $active;?></td>
							<td>
								<a href="update-food.php?id=<?php echo $id;?>" class="btn btn-primary">Оновити</a>
								<a href="delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Видалити</a>
							</td>
						</tr>
				 		<?php
				 	}
				 } else{
				 	?>
				 	<tr>
				 		<td colspan="7"><div class="error">Страви не додані</div></td>
				 	</tr>
				 	<?php 
				 }
				?>
			</table>
				</div>
	</div>
</div>
	<br>
	<br>
	<br><br>
	<br>
	<br><br><br>
	<br>
	<?php include('partials/footer.php');?>
</body>
</html>