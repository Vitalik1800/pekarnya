<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">Головна</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="users.php">Користувачі</a></li>
				<li class="nav-item"><a class="nav-link" href="manage-category.php">Категорії</a></li>
				<li class="nav-item"><a class="nav-link" href="manage-food.php">Страви</a></li>
				<li class="nav-item"><a class="nav-link" href="manage-order.php">Замовлення</a></li>
				<li class="nav-item"><a class="nav-link" href="about_us.php">Інформація про автора</a></li>
			</ul>
		</div>
		<a class="btn btn-danger" href="logout.php">Вийти</a>
	</nav>

	<?php include '../connect.php';?>