<?php
@session_start(); 

if(isset($_POST['checkoutBtn'])){
    $fname = mysqli_real_escape_string ($con,$_POST['fname']);
    $lname = mysqli_real_escape_string ($con,$_POST['lname']);
    $email = mysqli_real_escape_string ($con,$_POST['email']);
    $address = mysqli_real_escape_string ($con,$_POST['address']);
    $postNumber = mysqli_real_escape_string ($con,$_POST['postNumber']);
    $mobile = mysqli_real_escape_string ($con,$_POST['mobile']);
    $totAmount = mysqli_real_escape_string ($con,$_POST['totAmount']);
    $shipping =  mysqli_real_escape_string ($con,$_POST['totAmount']);
    
    $orderStatus = placeOrder($fname,$lname,$email,$address,$postNumber,$mobile,$totAmount,$shipping);
    if($orderStatus === true){
        echo "Order Placed";
    }
}