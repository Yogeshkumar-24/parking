<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking App</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
    <div class="container">
        <h1>Parking</h1>
        <div class="redirect">
            <div class="user">
                <form action="customer.php" method="POST">
                    <h3>Click Here If you're a Customer</h3>
                    <input id='button' type="submit" value="Customer" name="Customer">
                </form>
            </div>
            <div id="horizontal" class="center "></div>
            <div class="admin">
                <form action="admin.php" method="POST">
                    <h3>Click Here If you're an Admin</h3>
                    <input id='button'  type="submit" value="Admin" name="admin">
                </form>
            </div>
        </div>
    </div>
</body>
</html>