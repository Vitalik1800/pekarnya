<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сайт Ресторану Золота Арка - Панель замовлень</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">

	</style>
</head>
<body>
	<?php include('partials/menu.php');?>
	<div class="container">
		<div class="container"><br>
			<h1>Керування замовленнями</h1>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered ">
				<tr>
					<th>Номер</th>
					<th>Страва</th>
					<th>Ціна</th>
					<th>Кількість</th>
					<th>Загально</th>
					<th>Дата замовлення</th>
					<th>Статус</th>
					<th>Ім'я та прізвище клієнта</th>
					<th>Номер телефону клієнта</th>
					<th>Email</th>
					<th>Адреса</th>
					<th>Дії</th>
				</tr>
				<?php 
				 $sql = "SELECT * FROM orders ORDER BY id DESC";
				 $res = mysqli_query($conn, $sql);
				 $count = mysqli_num_rows($res);
				 if($count>0){
				 	while($row=mysqli_fetch_assoc($res)){
				 		$id = $row['id'];
				 		$food = $row['food'];
				 		$price = $row['price'];
				 		$qty = $row['qty'];
				 		$total = $row['total'];
				 		$order_date = $row['order_date'];
				 		$status = $row['status'];
				 		$customer_name = $row['customer_name'];
				 		$customer_contact = $row['customer_contact'];
				 		$customer_email = $row['customer_email'];
				 		$customer_address = $row['customer_address'];
				 		?>
				 		<tr>
				 			<td><?php echo $id;?></td>
				 			<td><?php echo $food;?></td>
				 			<td><?php echo $price;?></td>
				 			<td><?php echo $qty;?></td>
				 			<td><?php echo $total;?></td>
				 			<td><?php echo $order_date;?></td>

				 			<td>
				 				<?php
				 				  if($status == "Ordered"){
				 				  	echo "<label>$status</label>";
				 				  } elseif($status=="On Delivery"){
				 				  	echo "<label style='color:orange';>$status</label>";
				 				  }	elseif($status=="Delivered"){
				 				  	echo "<label style='color:green';>$status</label>";
				 				  }	elseif($status=="Canceled"){
				 				  	echo "<label style='color:red';>$status</label>";
				 				  }			 			
				 				?>
				 			 </td>

				 			<td><?php echo $customer_name;?></td>
				 			<td><?php echo $customer_contact;?></td>
				 			<td><?php echo $customer_email;?></td>
				 			<td><?php echo $customer_address;?></td>
				 			<td>
				 				<a href="update-order.php?id=<?php echo $id;?>" class="btn btn-primary">Оновити</a>
				 			</td>
				 		</tr>
				 		<?php 
				 	}
				 } else{
				 	echo "<tr><td colspan='12' class='error'>Замовлення недоступні</td></tr>";
				 }
				?>
			</div>
			
				

			</table>
		</div>
	</div>
</div>
	<br>
	<br>
	<br><br>
	<br><br>
	<br>
	<br>
	<br>
	<br>	
	<br><br><br>
	<br>
	<?php include('partials/footer.php');?>
</body>
</html>