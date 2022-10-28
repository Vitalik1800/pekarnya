<?php
 include '../connect.php';
 if(isset($_GET['id']) AND isset($_GET['image_name'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM category WHERE id=$id";
   $res = mysqli_query($conn, $sql);
   if($res==true){
      header('location:manage-category.php');
   } else{
      header('location:delete-category.php');
   }
 } else{
   header('location:manage-category.php');
 }


?>