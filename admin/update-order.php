<title>Сайт Ресторану Золота Арка - Панель оновлення замовлення</title>
<link rel="stylesheet" href="css/style.css">
<?php include('partials/menu.php'); ?>
<div class="container">
	<div class="container">
		<br><br>
		<h1>Оновити замовлення</h1>
		<br>
		<?php 
		 if(isset($_GET['id'])){
		 	$id = $_GET['id'];
		 	$sql = "SELECT * FROM orders WHERE id=$id";
		 	$res = mysqli_query($conn, $sql);
		 	$count = mysqli_num_rows($res);
		 	if($count==1){
		 		$row = mysqli_fetch_assoc($res);
		 		$food = $row['food'];
		 		$price = $row['price'];
		 		$qty = $row['qty'];
		 		$status = $row['status'];
		 		$customer_name = $row['customer_name'];
		 		$customer_contact = $row['customer_contact'];
		 		$customer_email = $row['customer_email'];
		 		$customer_address = $row['customer_address'];
		 	} else{
		 		header("location:manage-order.php");
		 	}
		 } else{
		 	header("location:manage-order.php");
		 }
		?>
		<form action="" class="form-group mb-3" method="POST">
			Страва: <b><?php echo $food;?></b><br><br>
			Ціна: <b><?php echo $price;?> грн</b><br><br>
			Кількість:<br><br><input type="number" class="form-control" name="qty" value="<?php echo $qty;?>"><br>
				Статус: <br><br>
						<select name="status" class="form-control">
							<option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Замовлено</option>
							<option <?php if($status=="On Delivery"){echo "selected";}?> value="On Delivery">В доставці</option>
							<option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Доставлено</option>
							<option <?php if($status=="Canceled"){echo "selected";}?> value="Canceled">Cкасовано</option>
						</select><br>
				Ім'я та прізвище клієнта:<br><br>
					<input type="text" class="form-control" name="customer_name" value="<?php echo $customer_name;?>">
				<br>
					Номер телефону клієнта: <br><br><input type="text" class="form-control" name="customer_contact" value="<?php echo $customer_contact;?>"><br>
				Поточний email:<br><br><input type="text" name="customer_email" class="form-control" value="<?php echo $customer_email;?>">
				<br>Поточна адреса:
				<br><br><textarea class="form-control" name="customer_address" cols="30" rows="5"><?php echo $customer_address;?></textarea><br>
				
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="hidden" name="price" value="<?php echo $price;?>">
						<input type="submit" name="submit" value="Оновити замовлення" class="btn btn-success">
				
		</form>
		<?php 
		 if(isset($_POST['submit'])){
		 	$id = $_POST['id'];
		 	$price = $_POST['price'];
		 	$qty = $_POST['qty'];
		 	$total = $price * $qty;
			$status = $_POST['status'];
			$customer_name = $_POST['customer_name'];
			$customer_contact = $_POST['customer_contact'];
			$customer_email = $_POST['customer_email'];
			$customer_address = $_POST['customer_address'];
			$sql2 = "UPDATE orders SET
				qty = $qty,
				total = $total,
				status = '$status',
				customer_name = '$customer_name',
				customer_contact = '$customer_contact',
				customer_email = '$customer_email',
				customer_address = '$customer_address'
				WHERE id=$id
			";
			$res2 = mysqli_query($conn, $sql2);
			if($res2==true){
				echo "<a class='btn btn-secondary' href='manage-order.php'>Перейти на сторінку замовлень</a>";
				echo "<br>";
			} else{
				header("manage-order.php");
			}
		 }
		?><br>

	</div>
</div>
<?php include "partials/footer.php";?>