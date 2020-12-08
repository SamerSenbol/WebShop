<?php
ob_start();
include "./includes/html-start.php";
?>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area Start -->
        <?php
        include "./includes/header.php";
        ?>
        <!-- Header Area End -->

        <!-- Products Area Start -->
        <?php
        include "./view/viewCategories.php";
        ?>
        
        
        
        <!-- Products Area End -->

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