<?php
if(isset($_GET['categoryID'])){
        $categoryID = $_GET['categoryID'];
        $sql1 = "SELECT `Name` FROM `categories` WHERE `Id` = '$categoryID' ";
        $result1 = mysqli_query($con,$sql1);
        if($result1){
            if($row1 = mysqli_fetch_array($result1)){
                ?>
                <h1><?php echo $row1['Name']; ?></h1>
                <?php
            }
        }
        $sql = "SELECT * FROM `products` WHERE `Categoryid` = '$categoryID'  ORDER BY `Id` DESC";
        
    
    }else{
        $sql = "SELECT * FROM `products`  ORDER BY `Id` DESC";
    
    }
