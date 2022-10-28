<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/za.jpg" />
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт ресторану Золота Арка - Сторінка страв</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include 'partials-front/menu.php';?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section style="background: blue;  max-width: 2600px;height: 150px;" class="container mt-7">
        <div class="container"><br>
            <form class="form-group mb-3" action="food-search.php" method="POST">
                <input type="search" class="form-control" name="search" placeholder="Знайти страву" required>
                <br><input type="submit" name="submit" value="Знайти" class="btn btn-success">
            </form>
        </div>
    </section>
    <section class="food-menu" style="background: green; color: #fff; text-align: center;">
        <div class="container">
            <br><h2 class="text-center">Меню страв</h2><br>
            <div class="row" style="text-align: center;margin-left: 20px; margin-right: 20px;">
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
            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include 'partials-front/footer.php';?>

</body>
</html>