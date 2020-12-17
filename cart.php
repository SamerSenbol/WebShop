<?php
ob_start();
include("./includes/html-start.php");

?>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

    
        <!-- Header Area Start -->
        <?php
        include "./includes/header.php";
        ?>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <!--checking the cart in the session-->
                <?php $subtotalArray = array();
                if(isset($_SESSION['cart'])){
                    if(is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
                    $cartData = $_SESSION['cart'];
                    $i = 0;
				?>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    /*-- Geting all cart data and display in cart table view--*/
                                    for($i = 0; $i < count($_SESSION['cart']); $i++){ 
                                        $cartProdID  = $_SESSION['cart'][$i]['productID'];
                                        $cartProductName  = $_SESSION['cart'][$i]['productName'];
                                        $cartProdPrice  = $_SESSION['cart'][$i]['prodPrice'];
                                        array_push($subtotalArray, $cartProdPrice);
                                    ?>
                                    <tr id="rowNo<?php echo $cartProdID; ?>">
                                        <td class="cart_product_img">
                                            <a href="#">
                                                <?php 
                                                echo '<img src="data:image/jpeg;base64,'
                                                .base64_encode( getProductImage($cartProdID) ).'"/>'; 
                                                ?>
                                            </a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $cartProductName;  ?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo  $cartProdPrice." Kr"; ?></span>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <!-- sum all prices of cart items-->
                                <li><span>subtotal:</span> <span><?php echo array_sum($subtotalArray)." Kr"; ?></span></li>
                                <!-- <li><span>total:</span> <span><?php echo array_sum($subtotalArray)." Kr"; ?></span></li> -->
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="checkout.php" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{
                        echo "No Product exist In cart";
                    }
                }else{
                    echo "No Product exist In cart";
                }
                ?>
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