<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div class="container">
        <form class="form-signin" action="check-admin.php" method="post">
            <h2>Авторизація</h2>
            <input type="text" name="login" class="form-control" placeholder="Введіть логін" required="">
            <input type="password" name="password" class="form-control" placeholder="Введіть пароль" required="">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизація</button>
        </form>
    </div>
   
</body>
</html>