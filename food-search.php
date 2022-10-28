<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/za.jpg" />
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт Ресторану Золота Арка - Сторінка пошуку страв</title>
    <style type="text/css">
        .error{
    color: red;
}

    </style>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include 'partials-front/menu.php';?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
                 $search = $_POST["search"];
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu" style="background: green; color: white;">
        <div class="container"><br>
        <br>
        
            <h2 style="text-align: center;">Страви за вашим пошуком: <a href="#" class="text-white" style="text-decoration: none;"><?php echo $search;?></a></h2>
            <br><h2 class="text-center">Меню страв</h2>
             <div class="row" style="text-align: center; margin-left: 70px;">

            <?php 

                if(isset($_POST['search'])){
                    $search = $_POST["search"];
                }
             $sql = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
             $res = mysqli_query($conn, $sql);
             $count = mysqli_num_rows($res);
             if($count>0){
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

            <div class="food-menu-box" style=" border: 2px solid #000; margin: 15px;">
                <div class="food-menu-img">
                    <?php 
                     if($image_name==""){
                        echo "<div class='error'>Зображення недоступне.</div>";
                     } else{
                        ?>
                        <img src="admin/images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                        <?php 
                     }
                    ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price; ?>грн</p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>

                    <a href="order.php" class="btn btn-primary">Замовити зараз</a>
                </div><br>
            </div>
                    <?php 
                }
             } else{?>
                <div class="error">Страви не знайдені.</div>
             <?php }
             ?>
</div><br>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include 'partials-front/footer.php';?>

</body>
</html>