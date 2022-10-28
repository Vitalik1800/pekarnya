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
			<h1>Список користувачів</h1><br>
			<div class="table-responsive">
				<table class="table table-bordered">
				<tr>
					<th>Номер</th>
					<th>Логін</th>
				</tr>

				<?php
				 $sql = "SELECT * FROM users ORDER BY id ASC";	
				 $res = mysqli_query($conn, $sql) or die(mysqli_error());
				 $count = mysqli_num_rows($res);
				 if($count>0){
				 	while($count=mysqli_fetch_assoc($res)){
				 		$id = $count['id'];
				 		$title = $count['login'];
				 		?>
				 		<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $title;?></td>
						</tr>
				 		<?php
				 	}
				 } else{
				 	?>
				 	<tr>
				 		<td colspan="2"><div class="error">Користувачів не зареєстровано</div></td>
				 	</tr><br><br>
				 	<?php 
				 }
				?>

			
				
			</table>
			</div>
			
		</div>
	</div>
	<br><br>
	<br>
	<br>
	<br>
	<br><br>
	<br>
	<br><br><br>
	<br>
	<br>
	<br>
	<br>
	<?php include('partials/footer.php');?>
</body>
</html>