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
        $sql = "SELECT `products`.`Id` as `Id` , `products`.`ProductName`, `products`.`Description`, 
        `products`.`Image`, `products`.`Price`,`products`.`Quantity`, `categories`.`Name`, `categories`.`Id` as `cateID`
        FROM `categories-relation`
    INNER JOIN `products` ON `products`.`Id` = `categories-relation`.`productId`
    INNER JOIN `categories` ON `categories`.`Id` = `categories-relation`.`categories-Id`
    WHERE `categories-relation`.`categories-Id` = '$categoryID'";   
    
    }else{
       $sql = "SELECT * FROM `products`  ORDER BY `Id` DESC";
    }
