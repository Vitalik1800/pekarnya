<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/za.jpg" />
    <title>Сайт Ресторану Золота Арка - Сторінка категорій страв</title>
    <link rel="stylesheet" href="css/index.css">
    <style type="text/css">
        a{text-decoration: none; color: red;}
        a:hover{text-decoration: none;}
    </style>
</head>

<body>
    <?php include 'partials-front/menu.php';?>
    <section class="categories" style="background:#ffff00; color: #000;">
        <div class="container">
            <h2 class="text-center"><br>Спробуйте на смак страви</h2><br>
            <div class="row" style="text-align: center; margin-left: 70px;">

                <?php 
             $sql = "SELECT * FROM category WHERE active='Yes'";
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
    <!-- Categories Section Ends Here -->


   <?php include 'partials-front/footer.php';?>

</body>
</html>