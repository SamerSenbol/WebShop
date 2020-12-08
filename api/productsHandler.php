<?php
if(isset($_POST['updateBtn'])){
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $sql1 = "UPDATE `products` SET `Quantity` = '$qty' WHERE `Id` = '$pid'";
    $result1 = mysqli_query($con,$sql1);
    if($result1){
        echo "Quantity Updated";
    }
}