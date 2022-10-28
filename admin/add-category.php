<?php include 'partials/menu.php';?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
	.container{
			margin-top: 20px;
		}
</style>
<div class="container mt-5">
	<div class="container">
		<h1>Додати категорію</h1>
		<br>
		<form action="" class="form-group mb-3" method="POST" enctype="multipart/form-data">
			Назва: <br><br><input type="text" class="form-control" name="title"><br>
				Виберіть зображення: 
					<input type="file" name="image"><br><br>
				Чи активна? <input type="radio" name="featured" value="Yes"> Так
					<input type="radio" name="featured" value="No"> Ні <br><br>
					Чи рекомендована? <input type="radio" name="active" value="Yes"> Так
						<input type="radio" name="active" value="No"> Ні <br><br>
						<input type="submit" name="submit" value="Додати категорію" class="btn btn-success">
						 <br>
            <br>
            <br>
            <br>
            <br>
            <br>

		</form>
		<?php 
		  if(isset($_POST['submit'])){
		  	$title = $_POST['title'];
		  	if(isset($_POST['featured'])){
		  		$featured = $_POST['featured'];
		  	} else{
		  		$featured = "No";
		  	}
		  	if(isset($_POST['active'])){
		  		$active = $_POST['active'];
		  	} else{
		  		$active = "No";
		  	}
		  	if(isset($_FILES['image']['name'])){
		  		$image_name = $_FILES['image']['name'];
		  		if($image_name!=""){
			  		$ext = end(explode('.', $image_name));
			  		$image_name	= "Food_Category_".rand(000, 999).'.'.$ext;
			  		$source_path = $_FILES['image']['tmp_name'];
			  		$destination_path = "images/category/".$image_name;
			  		$upload = move_uploaded_file($source_path, $destination_path);
			  		if($upload==false){
			  			header("location:manage-category.php");
			  			die();
			  		}
		  	}

		  	} else{
		  		$image_name = "";
		  	}
		  	$sql = "INSERT INTO category SET 
		  	       title='$title',
		  	       image_name='$image_name',
		  	       featured='$featured',
		  	       active='$active' ";	
		  	$res = mysqli_query($conn, $sql) or die(mysqli_error());
		  	if($res==true){
		  		header('location:manage-category.php');
		  	} else{
		  		header('location:add-category.php');
		  	}
		  }
		  ?>
	</div>
</div>

<?php include 'partials/footer.php';?>