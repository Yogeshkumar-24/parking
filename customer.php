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
       <h2>Bill Payment</h2>
   <div class="box">
        <div class="user">
        <form action="billstatus.php" method="POST">
            <label for="number">Vehicle Number:</label>
            <input id="text" required type="text" name="number" placeholder="Enter vehicle number">
            <br>
            <br>
            <input id='button' type="submit" value="view Bill" name="viewbill">
        </form>
        </div>
    </div>
   </div>
</body>
</html>