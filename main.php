<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сайт ресторану Золота Арка - Головна сторінка</title>
	<link rel="stylesheet" href="css/index.css">
	<style type="text/css">
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php 
	 include "partials-front/menu.php";
	?>
	
	<section style="background: blue;  max-width: 2600px;height: 150px;" class="container mt-7">
		<div class="container"><br>
			<form class="form-group mb-3" action="food-search.php" method="post">
				<input type="search" class="form-control" name="search" placeholder="Знайти страву" required>
                <br><input type="submit" name="submit" value="Знайти" class="btn btn-success">
            </form>
        </div>
    </section>
	 <section class="categories" style="background:#ffff00; color: #000;">
        <div class="container">
        	<h2 class="text-center"><br>Спробуйте на смак страви</h2><br>
        	<div class="row" style="text-align: center; margin-left: 70px;">

        		<?php 
             $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes'";
             $res = mysqli_query($conn, $sql);
             $count = mysqli_num_rows($res);
             if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a  style="text-decoration: none; color:#000;" href="category-foods.php?category_id=<?php echo $id;?>">
                        <div class="box-3 float-container" style=" border: 2px solid #000; margin: 15px;">
                            <?php 
                             if($image_name==""){
                                echo "<div class='error'>Зображення не доступне</div>";                     
                             } else{
                                ?>
                                <img width="300px" height="300px" src="admin/images/category/<?php echo $image_name;?>"  class="img-responsive img-curve">
                                <?php 
                             } ?>
                             
                             <?php
                            ?>
                          
                            <h3><?php echo $title;?></h3>
                        </div>
                    </a>
                    <?php
                }
             } else{
                echo "<div class='error'>Категорії не додані.</div>";
             }
            ?>
        	</div>
           

            
            <div class="clearfix"></div>
        </div><br>
    </section>

    <section class="food-menu" style="background: green; color: #fff; text-align: center;">
        <div class="container">
        	<br><h2 class="text-center">Меню страв</h2><br>
        	<div class="row" style="text-align: center;margin-left: 20px;margin-right: 20px;">
        		 <?php 
             $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured='Yes'";
             $res2 = mysqli_query($conn, $sql2);
             $count2 = mysqli_num_rows($res2);
             if($count2 > 0){
                while($row = mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box" style=" border: 2px solid #000; margin-top: 20px; padding-bottom: 10px;">
                        <div class="food-menu-img" >
                            <?php 
                             if($image_name==""){
                                echo "<div class='error'>Image not Available</div>";
                             }
                             else{
                                ?>
                                <img width="300px" height="300px" src="admin/images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php 
                             }
                            ?>
                            
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?> грн</p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>
                            <a href="order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Замовити зараз</a>
                        </div>
                    </div>
                    <?php 
                }
             } else{
                echo "<div class='error'>Страви не доступні</div>";
             }
            ?>
        	</div>

        </div>

        <p><br>
            <a class="btn btn-primary" href="foods.php">Гляньте на всі страви</a>
        </p><br>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include 'partials-front/footer.php';?>
    <!-- footer Section Ends Here -->
</div>
</div>
</body>
</html>