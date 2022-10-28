<title>Сайт Ресторану Золота Арка - Панель оновлення страви</title>
<link rel="stylesheet" href="css/style.css">
<?php 
 include('partials/menu.php');
?>
<div class="container">
       <div class="container">
              <br><br>
              <h1>Оновити категорію</h1>
             <br>

        <?php
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql2 = "SELECT * FROM food WHERE id=$id";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($res2);
            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];
 } else{
    header("location:manage-food.php");
 }
        ?>
        <form action="" class="form-group mb-3" method="POST" enctype="multipart/form-data">
                     Назва:<br><br><input type="text" class="form-control" name="title" value="<?php echo $title;?>"><br>
                     Опис: <br><br><textarea name="description" class="form-control" cols="30" rows="5"><?php echo $description;?>
                </textarea><br>
                Ціна:<br><br><input type="number" class="form-control" name="price" value="<?php echo $price;?>"><br>
                     Поточне зображення: <?php 
                                        if($current_image !=""){
                                          ?>
                                          <img src="images/food/<?php echo $current_image;?>" width="50px" height="30px">
                                          <?php 
                                        } else{
                                          echo "<div class='error'>Зображення не додане.</div>";
                                        }
                                          ?>
                                   <br><br>
                                   Нове зображення: <input type="file" name="image"><br><br>
                                   Категорія:
              
                    <select name="category">
                        <?php 
                         $sql = "SELECT * FROM category WHERE active='Yes'";
                         $res = mysqli_query($conn, $sql);
                         $count = mysqli_num_rows($res);
                         if($count > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                $category_title = $row['title'];
                                $category_id = $row['id'];?>
                                <option <?php if($current_category==$category_id){ echo "selected";} ?> value='<?php echo $category_id;?>'><?php echo $category_title;?></option>";
                            <?php }
                         } else{
                            echo "<option value='0'>Категорія не доступна</option>";
                         }
                        ?>
                        
                    </select>
              <br><br>
                                   Рекомендована: <input <?php if($featured=="Yes"){ echo "checked";}?> type="radio" name="featured" value="Yes">Так
                                          <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">Ні<br><br>
                                   Активна: <input <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes">Так
                                          <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">Ні
                            <br><br>
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                                          <input type="hidden" name="id" value="<?php echo $id;?>">
                                          <input type="submit" name="submit" class="btn btn-success" value="Оновити категорію">
                        
              </form><br>
              <?php 
         if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name!=""){
                    $ext = end(explode('.', $image_name));
                    $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext;
                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "images/food/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);
                    if($upload == false){
                        $_SESSION['upload'] = "<div class='error'>Зображення недоступне</div>";
                        header("location:manage-food.php");
                        die();
                    }
                    if($current_image!=""){
                        $remove_path = "images/food".$current_image;
                        $remove = unlink($remove_path);
                        if($remove==false){
                            header("location:manage-food.php");
                            die();
                        }
                    }
                }
                else{
                    $image_name = $current_image;
                }
            } else{
                $image_name = $current_image;
            }
            $sql3 = "UPDATE food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
            ";
            $res3 = mysqli_query($conn, $sql3);
            if($res3==true){
                echo "<a class='btn btn-primary' href='manage-food.php'>Перейти на сторінку страв</a>";
                echo "<br>";
            } else{
                header('location:manage-food.php');
            }
         }
        ?>
    </div>
    <br>
</div>
<?php 
 include('partials/footer.php');
?>