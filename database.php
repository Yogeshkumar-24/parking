<?php 

$user = 'root';
$host = 'localhost';
$pass = '';
$db = 'parking';

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Not Connected to the database!");
}


?> 