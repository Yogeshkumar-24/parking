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
        <h2>Checkin</h2>
        <div class="box">
            <div class="user">
            <?php 

if(isset($_POST['checkin'])){
    require_once("database.php");

    // date_default_timezone_set('Asia/Kolkata');
    // echo "The time is " . date("h:i:sa");
    $time = date("y-m-d h:i:s ");

    $type = $_POST['type']; 
    $number = $_POST['number'];
    $vehtype = strtolower($number);
    $vehtype = str_replace(' ', '', $vehtype);
    $sql = "INSERT INTO entry(type,number,time) VALUES('$type','$vehtype','$time')";

    try{
        $result = mysqli_query($conn,$sql);
        echo "<h3 id='info'>Customer Checked In!</h3>";
        echo "<a id='return' href='new.php'>Go to home</a>";
    }
    catch (exception $e){
        echo "Vehicle Already Checked In!<br><br>";
        echo '<form action="late.php" method="POST">
        <input type="hidden" name = "number" value = '.$vehtype.'>
        <input type="submit" id="button" name="viewbill" value="View Bill">
    </form>';
    }

    // if(!$result){
    //    echo "Unsuccessful";
    // }
    // elseif(mysqli_errno($conn))
    //                echo "duplicate entry no need to insert into DB<br>";
    // else{
   
    // }

}

?>

            </div>
        </div>
    </div>
</body>
</html>