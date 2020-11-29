<?php
include("includes/connection.php");
?>

<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
    <?php 
    $sql = "SELECT * FROM `products`  ORDER BY `Id` DESC";
    $result = mysqli_query($con,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $prodID = $row['Id'];
                $prodName = $row['ProductName'];
                $prodPrice = $row['Price'];
                ?>
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                   <?php echo '<img style="width:350px; height:350px;" src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'"/>'; ?>
                    <div class="line"></div>
                    <p><?php echo $row['Price']." kr"; ?></p>
                    <h4><?php echo $row['ProductName']; ?></h4>
                    <p><?php echo $row['Description']; ?></p>
                    <button
                        class="btn amado-btn w-50" 
                        onclick="addtocart(<?php echo $prodID; ?>,
                        '<?php echo $prodName; ?>',
                        <?php echo $prodPrice; ?>)">
                        Add To Cart
                    </button>
                </div>
            </div>
            <?php
            }
        }
    }
    ?>   
    </div>
</div>