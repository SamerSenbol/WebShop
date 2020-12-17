<?php
ob_start();
include "./includes/html-start.php";

?>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area Start -->
        <?php
        include "./includes/header.php";
        include "./api/checkoutHandler.php";
        ?>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
            <form action="checkout.php" method="post">
                            
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" required name="fname" value="" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" required name="lname" value="" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" required name="email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" required name="address" placeholder="Street" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" required name="postNumber" placeholder="Post Number" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" required name="mobile" placeholder="Mobile" value="">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div><h4>Select Shipping</h4></div>
                                        <?php 
                                            $sql = "SELECT * FROM `shipping`";
                                            $result = mysqli_query($con,$sql);
                                            if($result){
                                                if(mysqli_num_rows($result)>0){
                                                    while($row = mysqli_fetch_array($result)){
                                                        ?>
                                                        <div class="form-check form-check-inline">
                                                            <input onchange="calculateTotalAmount(<?php echo $row['Cost'] ?>)" required class="form-check-input" type="radio" name="shipping" value="<?php echo $row['Id']; ?>">
                                                            <label class="form-check-label">
                                                            <?php echo $row['Type']." just for ".$row['Cost']." Kr"; ?>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            } 
                                        ?>
                                        
                                        
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <?php $subtotalArray = array();
                            if(isset($_SESSION['cart'])){
                                if(is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
                                $cartData = $_SESSION['cart'];
                                $i = 0;
                                for($i = 0; $i < count($_SESSION['cart']); $i++){ 
                                    $cartProdPrice  = $_SESSION['cart'][$i]['prodPrice'];
                                    array_push($subtotalArray, $cartProdPrice);
                                }
                            ?>
                            <ul class="summary-table">
                                <input type="hidden" id="subtotal" value="<?php echo array_sum($subtotalArray); ?>"/>
                                <li><span>subtotal:</span> <span><?php echo array_sum($subtotalArray)." Kr"; ?></span></li>
                                <li><span>delivery:</span> <span id="shippingAmount">Free</span></li>
                                <li><span>total:</span> <span id="total"><?php echo array_sum($subtotalArray)." Kr"; ?></span></li>
                                <input type="hidden" id="totAmount" name="totAmount" value=""/>
                                
                            </ul>
                            <div class="cart-btn mt-100">
                                <input type="submit" name="checkoutBtn" class="btn amado-btn w-100" value="Checkout">
                            </div>
                                <?php }
                                } ?>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    include "./includes/footer.php";
    ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <?php
    include "./includes/html-end.php";