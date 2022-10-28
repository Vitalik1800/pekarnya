<?php include 'partials/menu.php';?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
	.container{
			margin-top: 20px;
		}
</style>
<div class="container mt-5">
	<div class="container">
		<h1>Додати страву</h1>
		<br>
		<form action="" class="form-group mb-3" method="POST" enctype="multipart/form-data">
			Назва: <br><br><input type="text" class="form-control" name="title"><br>
			Опис: <br><br><textarea name="description" class="form-control" cols="30" rows="3"></textarea><br>
			Ціна: <br><br><input type="number" class="form-control" name="price"><br>
			Виберіть зображення: <input type="file" name="image"><br><br>
			Категорія: 
			<select name="category">
							<?php 
							 $sql = "SELECT * FROM category WHERE active='Yes'";
							 $res = mysqli_query($conn, $sql);
							 $count = mysqli_num_rows($res);
							 if($count>0){
							 	while($row=mysqli_fetch_assoc($res)){
							 		$id = $row['id'];
							 		$title = $row['title'];
							 		?>
							 		<option value="<?php echo $id;?>"><?php echo $title;?></option>
							 		<?php
							 	}
							 } else{
							 	?>
							 	<option value="0">Категорії не знайдено</option>
							 	<?php
							 }
							?>
						</select>
						<br><br>
						Рекомендована: <input type="radio" name="featured" value="Yes"> Так
						<input type="radio" name="featured" value="No">Ні<br><br>
						Активна: <input type="radio" name="active" value="Yes"> Так
						<input type="radio" name="active" value="No">Ні<br><br>
						<input type="submit" name="submit" value="Додати страву" class="btn btn-success">
		</form>
		<?php 
		 if(isset($_POST['submit'])){
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$price = $_POST['price'];
		 	$category = $_POST['category'];
		 	if(isset($_POST['featured'])){
		 		$featured = $_POST['featured'];
		 	} else{
		 		$featured = "No";
		 	} if(isset($_POST['active'])){
		 		$active = $_POST['active'];
		 	} else{
		 		$active = "No";
		 	} if(isset($_FILES['image']['name'])){
		 		$image_name = $_FILES['image']['name'];
		 		if($image_name!=""){
		 			$ext = end(explode('.', $image_name));
		 			$image_name = "Food-Name-".rand(0000, 9999).".".$ext;
		 			$src = $_FILES['image']['tmp_name'];
		 			$dst = "images/food/".$image_name;
		 			$upload = move_uploaded_file($src, $dst);
		 			if($upload==false){
		 				header("location:add-food.php");
		 				die();
		 			}
		 		}
		 	} else{
		 		$image_name = "";
		 	}
		 	$sql2 = "INSERT INTO food SET 
		 	 title='$title',
		 	 description = '$description',
		 	 price = $price,
		 	 image_name = '$image_name',
		 	 category_id = $category,
		 	 featured = '$featured',
		 	 active = '$active'
		 	";
		 	$res2 = mysqli_query($conn, $sql2);
		 	if($res2==true){
		 		header("location:manage-food.php");
		 	} else{
		 		echo mysqli_error();
		 	}
		 }
		?>
	</div>
</div>

<?php include 'partials/footer.php';?>