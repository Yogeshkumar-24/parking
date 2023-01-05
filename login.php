<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
         *{font-family:sans-serif;}
    </style>
</head>
<body>
    <div class="container">
        <h2>LOGIN</h2>
        <div class="box">
            <div class="user">
            <?php 


if(isset($_POST['submit'])){
    require_once('database.php'); 
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0){
        setcookie('name',$username,time()+3600);
        session_start();
        $_SESSION['name'] = $_COOKIE['name'];
        // $_SESSION['password'] = $_POST['password'];
        header("Location:new.php");
    }
    else{
        echo "<h3>Login failed!</h3>";
        echo "<a href='admin.php' id='return'>Try again</a>";
    }

}

?>
            </div>
        </div>
    </div>
</body>
</html>