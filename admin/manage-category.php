<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сайт Ресторану Золота Арка - Панель Категорій</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.container{
			margin-top: 20px;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php include('partials/menu.php');?>
	<div class="container">
		<div class="container">
			<br>
			<h1>Керування категоріями</h1>
			<br>
			<a href="add-category.php" class="btn btn-success">Додати</a>
			<br><br>
			<div class="table-responsive">
				<table class="table table-bordered ">
				<tr>
					<th>Номер</th>
					<th>Назва</th>
					<th>Зображення</th>
					<th>Рекомендована</th>
					<th>Активна</th>
					<th>Дії</th>
				</tr>

				<?php
				 $sql = "SELECT * FROM category ORDER BY id ASC";	
				 $res = mysqli_query($conn, $sql) or die(mysqli_error());
				 $count = mysqli_num_rows($res);
				 if($count>0){
				 	while($count=mysqli_fetch_assoc($res)){
				 		$id = $count['id'];
				 		$title = $count['title'];
				 		$image_name = $count['image_name'];
				 		$featured = $count['featured'];
				 		$active = $count['active'];
				 		?>
				 		<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $title;?></td>
							<td>
								<?php 
								  if($image_name!=""){
								  	?>
								  	<img src="images/category/<?php echo $image_name;?>" width="50px" height="30px">
								  	<?php
								  } else{
								  	echo "<div class='error'>Image not added.</div>";
								  }
								?>


								
							</td>
							<td><?php echo $featured;?></td>
							<td><?php echo $active;?></td>
							<td>
								<a href="update-category.php?id=<?php echo $id;?>" class="btn btn-primary">Оновити</a>
								<a href="delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Видалити</a>
							</td>
						</tr>
				 		<?php
				 	}
				 } else{
				 	?>
				 	<tr>
				 		<td colspan="6"><div class="error">Категорії не додано</div></td>
				 	</tr><br><br>
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