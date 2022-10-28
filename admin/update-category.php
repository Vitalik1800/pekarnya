<title>Сайт Ресторану Золота Арка - Панель оновлення категорії</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php include 'partials/menu.php';?>
<div class="container">
       <div class="container">
              <br><br>
              <h1>Оновити категорію</h1>
             <br>

        <?php
         if(isset($_GET['id'])){
               $id = $_GET['id'];
               $sql = "SELECT * FROM category WHERE id=$id";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
               if($count==1){
                     $row = mysqli_fetch_assoc($res);
                     $title = $row['title'];
                     $current_image = $row['image_name'];
                     $featured = $row['featured'];
                     $active = $row['active'];

               } else{
                     header("location:manage-category.php");
               }
         } else{
              header("location:manage-category.php");
         }
        ?>

              <form action="" class="form-group mb-3" method="POST" enctype="multipart/form-data">
                     Назва:<br><br><input type="text" class="form-control" name="title" value="<?php echo $title;?>"><br>
                     Поточне зображення: <?php 
                                        if($current_image !=""){
                                          ?>
                                          <img src="images/category/<?php echo $current_image;?>" width="50px" height="30px">
                                          <?php 
                                        } else{
                                          echo "<div class='error'>Зображення не додане.</div>";
                                        }
                                          ?>
                                   <br><br>
                                   Нове зображення: <input type="file" name="image"><br><br>
                                   Рекомендована: <input <?php if($featured=="Yes"){ echo "checked";}?> type="radio" name="featured" value="Yes">Так
                                          <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">Ні<br><br>
                                   Активна: <input <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes">Так
                                          <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">Ні
                            <br><br>
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                                          <input type="hidden" name="id" value="<?php echo $id;?>">
                                          <input type="submit" name="submit" class="btn btn-success" value="Оновити категорію">
                        
              </form><br>
              <br>
              <br>
              <?php 
               if(isset($_POST['submit'])){
                     $id = $_POST['id'];
                     $title = $_POST['title'];
                     $current_image = $_POST['current_image'];
                     $featured = $_POST['featured'];
                     $active = $_POST['active'];
                     if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];
                            if($image_name!=""){
                                   $ext = end(explode('.', $image_name));
                                          $image_name   = "Food_Category_".rand(000, 999).'.'.$ext;
                                          $source_path = $_FILES['image']['tmp_name'];
                                          $destination_path = "images/category/".$image_name;
                                          $upload = move_uploaded_file($source_path, $destination_path);
                                          if($upload==false){
                                                 header("location:manage-category.php");
                                                 die();
                                          }
                                          if($current_image!=""){
                                                 $remove_path = "images/category/".$current_image;
                                                 $remove = unlink($remove_path);
                                                 if($remove==false){
                                                        header("location:update-category.php");
                                                        die();                                           
                                                 }
                                          }
                            } else{
                                   $image_name = $current_image;
                            }
                     } else{
                            $image_name = $current_image;
                     }
                     $sql2 = "UPDATE category SET 
                            title = '$title',
                            image_name = '$image_name',
                            featured = '$featured',
                            active = '$active'
                            WHERE id='$id'
                     ";
                     $res2 = mysqli_query($conn, $sql2);
                     if($res2==true){
                            header('location:manage-category.php');
                     } else{
                            header('location:update-category.php');
                     }
               }
              ?>
       </div>
</div>
<?php include 'partials/footer.php';?>
