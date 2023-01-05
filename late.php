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
        <h2>Bill Status</h2>
        <div class="box">
            <div class="user">
            <?php 

if(isset($_POST['viewbill'])){
    require_once('database.php');
    $number = $_POST['number'];
    $vehnum = strtolower($number);
    $vehnum = str_replace(" ","",$vehnum);
    $sql = "SELECT * FROM entry where number = '$vehnum'"; 
    $result = mysqli_query($conn,$sql);
        $res = mysqli_fetch_assoc($result);
        $name = $res['type'];
        // echo $name;
        if($res){
        $time = date('y-m-d h:i:s ');
        $date1 = new DateTime($res['time']);
            $date2 = new DateTime($res['extime']);
            $diff = $date1->diff($date2);
            echo "<br>";
           $hour=  $diff->format('%h');
           $day=  $diff->format('%d');
           if($hour < 3){
            if($name == 'bike'){

                $amount = 30;
            }
            else{
                $amount = 40;
            }
           }
           else {
            $k = floor($hour - 3);
            // echo $k;
           if($name == 'bike'){
            $amount = 30 + $k*20;
           }
           else{
            $amount = 40 + $k*30;
           }
            
         }
         $fine =0;
         if($day>1){
            $fine = ($day-1)*40;
            $total = $fine + $amount; 
         }
        }
        if(!$res){
            echo "<h3 id='info'>Vehicle has not checked in!</h3>";
            echo "<br>";
            echo "<a id='return' href='new.php'>Return</a>";
        }
        else{
            echo "
        <h2>Bill</h2>
        <p>Vehicle Number: ".$number."</p>
        <p>Due Amount : "."₹ ".$amount."</p>";
        if($fine!= 0){
            echo"<p>Fine Amount : "."₹ ".$fine."</p>";
            echo"<p>Total Amount : "."₹ ".$total."</p>";
        }
        echo"
        <form method = 'POST' action='late.php'>
        <input type='hidden' name = 'num' value =".$number.">
        <button id='button' name='paynow'>Pay Now</button>
        </form>
        ";
        } 
}

if(isset($_POST['paynow'])) {
    require_once('database.php');
    $number = $_POST['num'];
    $vehnum = strtolower($number);
    $vehnum = str_replace(" ","",$vehnum);
    $del_entry = "DELETE FROM entry where number = '$vehnum'";
    $result = mysqli_query($conn,$del_entry);
    if($result){
        header("Location:status.php");
    }
    else{
        echo "Error in database";
    }
}

?>
            </div>
        </div>
    </div>
</body>
</html>