<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/za.jpg" />
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт ресторану Золота Арка - Сторінка замовлень</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include 'partials-front/menu.php';?>

    <?php 
     if(isset($_GET['food_id'])){
        $food_id = $_GET['food_id'];
        $sql = "SELECT * FROM food WHERE id=$food_id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        } else{
            header("location:index.php");
        }
     } else{
        header("location:index.php");
     }
    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            <br>
            <h2 class="text-center">Заповніть форму та підтвердіть ваше замовлення</h2>

            <form action="" method="POST" class="form-group mb-3">
                <fieldset>
                    <legend>Вибрана страва</legend>

                    <div class="food-menu-img">
                        <?php 
                         if($image_name==""){

                         } else{
                            ?>
                            <img width="300px" height="300px" src="admin/images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                            <?php 
                         }
                        ?>
                        
                    </div>
                    <br>
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3><br>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <p class="food-price"><?php echo $price;?> грн</p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Кількість</div>
                        <input type="number" name="qty" class="form-control" value="1" required><br>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Деталі замовлення</legend><br>
                    <div class="order-label">Ім'я та прізвище</div>
                    <input class="form-control" type="text" name="full-name" class="input-responsive" required><br>

                    <div class="order-label">Номер телефону</div>
                    <input type="tel" name="contact" class="form-control" required><br>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="form-control" required><br>

                    <div class="order-label">Адреса</div>
                    <textarea name="address" rows="2" class="form-control" required></textarea><br>

                    <input type="submit" name="submit" value="Підтвердити замовлення" class="btn btn-primary">
                </fieldset>

            </form><br>
            <?php 
             if(isset($_POST['submit'])){
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date = date("Y-m-d h:i:sa");
                $status = "Ordered";
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];
                $sql2 = "INSERT INTO orders SET
                    food = '$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status='$status',
                    customer_name='$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                ";
                $res2 = mysqli_query($conn, $sql2);
                if($res2==true){
                    header("location:main.php");
                } else{
                    header("location:main.php");
                }
             }
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include 'partials-front/footer.php';?>

</body>
</html>