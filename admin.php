<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
         *{font-family:sans-serif;}
    </style>
</head>
<body>
   <?php 
    if(isset($_COOKIE['name'])){
        header("Location:new.php");
    }
    else{
        echo ' <div class="container">
        <h2>Login</h2>
            <div class="box">
                <div class="user">
            <form action="login.php" method="POST" >
                <label for="uername">Username: </label>
                <input id="text" type="text" name="username" placeholder="Enter Username">
                <br>
                <br>
                <label for="password">Password: </label>
                <input id="text" type="password" name="password" id="" placeholder="Enter password">
                <br>
                <br>
                <input id="button" type="submit" name="submit" id="" value="Login">
            </form>
                </div>
            </div>
        </div>';
    }
   ?>
</body>
</html>