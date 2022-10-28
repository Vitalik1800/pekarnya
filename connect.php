<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "pekarnya";

    $conn = mysqli_connect($servername,$username,$pass,$dbname);
    if (mysqli_connect_errno()) {
        echo 'Помилка підключення до БД: ('.mysqli_connect_errno().'):'.mysqli_connect_error();
        exit();
    }

?>