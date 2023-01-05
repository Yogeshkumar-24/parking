<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
       #logout{ 
        height: 25px;
                width: 80px;
                border: none;
                background-color: red;
                color: aliceblue;
                letter-spacing: 1px;
                font-weight: 700;
                cursor: pointer;
            }
            #title{
                color: black;
                letter-spacing: 1px;
               
                }
                *{font-family:sans-serif;}

                @media only screen and (max-width: 700px ) {

.redirect{
 display: flex;
 flex-direction: column;
}

#horizontal{
 border-bottom: 20px solid rgb(74, 209, 74);
 bottom: 50%;
 width: 100%;
 position: absolute;
}
form{
    height: 100%;
    padding: auto;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    /* position: absolute; */
}

}

    </style>
</head>
<body>

    <?php 
        if(isset($_COOKIE['name'])){ 
            echo '<div class="container">
            <h2 id="title">PARKING APP</h2>
        <div class="redirect">
                <div class="user">
                    <h2>Checkin</h2>
                    <form action="checkin.php" method="POST" style="display: block;">
                        <div id="form">
                        <label for="type">Vehicle Type:</label>
                        <input type="radio" name="type" value="bike" checked>
                        Bike
                        <input type="radio" name="type" value="car">
                        Car
                        <br>
                        <br>
                        <!-- <label for="number">Vehicle Number</label> -->
                        <input id="text" required type="text" name="number" placeholder="Enter Vehicle Number">
                        <br>
                        <br>
                        </div>
                        <input id="button" type="submit" value="Checkin" name="checkin">
                    </form>
                </div>
                <div id="horizontal" style="flex:1" class="center"></div>
                <div class="admin">
                    <h2>Checkout</h2>
                    <form action="checkout.php" method="POST" style="display: block;">
                        <div id="form">
                        <label for="number">Vehicle Number</label><br><br>
                        <input required id="text" type="text" name="number" placeholder="Enter Vehicle Number">
                        <br>
                        <br>
                        </div>
                        <input id="button" type="submit"value="Checkout"  name="checkout" >
                    </form>
                </div>
                </div> 
                <br>
                <form method="POST" action="logout.php">
            <input type="submit" id="logout" value="Logout">
            </form>
        </div>';
        }
        else{
            echo '
            <div class="container">
            <h2>Admin Page</h2>
                <div class="box">
                    <div class="user">
                        <h3>Login to continue!</h3>
                        <br>
                        <a id ="return" href="admin.php">Login</a>
                    </div>
                </div>
            </div>
            ';
        }
    ?>
    
</body>
</html>