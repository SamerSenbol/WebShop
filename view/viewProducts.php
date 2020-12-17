<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
    <?php 
     include("api/categoriesHandler.php");
    $result = mysqli_query($con,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $prodID = $row['Id'];
                $prodName = $row['ProductName'];
                $prodPrice = $row['Price'];
                ?>
                <!-- Single Catagory -->
                <br>
                <br>
                <div class="single-products-catagory clearfix">
                   <?php echo '<img style="width:350px; height:350px;" src="data:image/jpeg;base64,'
                   .base64_encode( $row['Image'] ).'"/>';?>
                    <div class="line"></div>
                    <br>
                    <p><?php echo $row['Price']." kr"; ?></p>
                    <h5><?php echo $row['ProductName']; ?></h5>
                    <p><?php echo $row['Description']; ?></p>
                    <button
                        class="btn amado-btn w-50" 
                        onclick="addtocart(<?php echo $prodID; ?>,
                        '<?php echo $prodName; ?>',
                        <?php echo $prodPrice; ?>)">
                        Add To Cart
                    </button>
                </div>
                <br>
                <br>
                <br>
            </div>
            <?php
            }
        }
    }
    ?>   
    </div>
</div>