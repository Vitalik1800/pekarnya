<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Реєстрація на сайті</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<form class="form-signin" method="post">
			<h2>Реєстрація</h2>
			<input type="text" name="login" class="form-control" placeholder="Введіть логін" required="">
			<input type="password" name="password" class="form-control" placeholder="Введіть пароль" required="">
			<a href="index.php" class="btn btn-lg btn-primary btn-block">Авторизація</a>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Реєстрація</button>
		</form>
	</div>
	<?php 
	 include('connect.php');
	 if(isset($_POST['login']) && isset($_POST['password'])){
	 	$login = $_POST['login'];
	 	$password = md5($_POST['password']);
	 	$query = "INSERT INTO users (login, password) VALUES('$login', '$password')";
	 	$res = mysqli_query($conn, $query);
	 	if($res){
	 		header("Location: index.php");
	 	}
	 }
	?>
</body>
</html>