<?php 
include("functions.php");
?>
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <p>WebShop</p>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="active"><a href="index.php">Products</a></li>
            <li class="active"><a href="categories.php">Categories</a></li>
            
            <li><a href="checkout.php">Checkout</a></li>
            <?php if(isLogin() === false){
                ?>
                <li><a href="login.php">Login</a></li>
                <?php
            } ?>

            <?php if(isLogin() === true){
                ?>
                <li><a href="signOut.php">Sign out</a></li>
                <?php
            } ?>
            
            
           <?php  if($role == "Admin"){ ?>
            <li><a href="admin.php">Admin</a></li>
           <?php } ?>
        </ul>
    </nav>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav">
            <img src="img/core-img/cart.png" alt="">
            Cart
            <?php if(isset($_SESSION['cart'])){?>
            <span>
            (<?php echo count($_SESSION['cart']); ?>)
            </span>
            <?php }else{ echo"<span>(0)
            </span>"; ?>
            
            <?php } ?>
        </a>
    </div>
</header>