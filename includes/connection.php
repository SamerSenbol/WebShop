<?php

$con = mysqli_connect('localhost','root','','webshop');

if($con){
    //echo "Connected successfuly";
}


if(!$con){
    die("Database connection failed");
}
?>