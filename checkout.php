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
        <h2>Bill</h2>
        <div class="box">
            <div class="user">
            <?php 
    
    if(isset($_POST['checkout'])){
        require_once('database.php');
        $number = $_POST['number'];
        $vehnum = strtolower($number);
        $vehnum = str_replace(" ","",$vehnum);
        $time = date('y-m-d h:i:s ');
        $sql = "SELECT time FROM entry where number = '$vehnum'";
        $sql1 = "SELECT extime FROM entry where number = '$vehnum'";
        $sql2 = "SELECT type FROM entry where number = '$vehnum'";
        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
        $res = mysqli_fetch_assoc($result);
        $res1 = mysqli_fetch_assoc($result1);
        $name = mysqli_fetch_assoc($result2);
        // print_r($res1);
        // echo $res1['extime'];
        if(!$res1['extime']){
        if($res){

            $date1 = new DateTime($res['time']);
            $date2 = new DateTime($time);
            $diff = $date1->diff($date2);
            echo "<br>";
           $hour=  $diff->format('%h');
           if($hour < 3){
                if($name['type'] == 'bike'){
                    $amount = 30;
                }
                else{
                    $amount = 40;
                }
           }
           else {
            $k = floor($hour - 3);
            // echo $k;
            if($name['type'] == 'bike'){
                $amount = 30 + $k*20;
            }
            else{
                $amount = 40 + $k*30;
            }
        }



       



       }
        
        if(!$res){
            echo "Vehicle has not checked in!";
            echo "<br><br>";
            echo "<a id='return' href='new.php'>Return</a>";
        }
        else{
            echo "
        <p>Vehicle Number: ".$number."</p>
        <p>Total Amount : "."₹ ".$amount."</p>
        <form method = 'POST' action='checkout.php'>
        <input type='hidden' name = 'num' value =".$number.">
        <button id='button' name='paid'>Cash Pay</button>
        <button id='button' name='paylater'>Pay Later</button>
        </form>
        "; 
        }
    }
    else{
        if($res){
            $time = date('y-m-d h:i:s ');
            $date1 = new DateTime($res['time']);
                $date2 = new DateTime($res1['extime']);
                $diff = $date1->diff($date2);
                echo "<br>";
               $hour=  $diff->format('%h');
               $day=  $diff->format('%d');
               if($hour < 3){
                    if($name['type'] == 'bike'){
                        $amount = 30;
                    }
                    else{
                        $amount = 40;
                    }
               }
               else {
                $k = floor($hour - 3);
                // echo $k;
                if($name['type'] == 'bike'){
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
            <form method = 'POST' action='checkout.php'>
            <input type='hidden' name = 'num' value =".$number.">
            <button id='button' name='paid'>Pay Now</button>
            </form>
            ";
            }
    }
    }
    if(isset($_POST['paid'])) {
        require_once('database.php');
        $number = $_POST['num'];
        $vehnum = strtolower($number);
        $vehnum = str_replace(" ","",$vehnum);
        $del_entry = "DELETE FROM entry where number = '$vehnum'";
        $result = mysqli_query($conn,$del_entry);
        if($result){
            header("Location:successful.php");
            // echo "Hello";
        }
        else{
            echo "Error in database";
        }
    }

    if(isset($_POST['paylater'])){
        require_once('database.php');
        echo "HEllp";
        $number = $_POST['num'];
        $vehnum = strtolower($number);
        $vehnum = str_replace(" ","",$vehnum);
        $time = date('y-m-d h:i:s ');
        $add_entry = "UPDATE entry SET extime = '$time' where number = '$vehnum'";
        $result = mysqli_query($conn,$add_entry);

        if($result){
            header("Location:paylater.php");
        }
        else{
            echo "Unsuccessful Attempt!";
        }
    }
    
// }


?>
            </div>
        </div>
    </div>
</body>
</html>