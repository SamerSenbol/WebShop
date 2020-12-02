<?php
ob_start();
$role = "";
include "./includes/html-start.php";
if(isset($_SESSION['userRole'])){
    $role = $_SESSION['userRole'];
}

if($role != "Admin"){
    ?>
    <script>
        alert("Access Denied..! : You are not Admin");
        window.location.href="index.php";
    </script>
    <?php
}
?>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area Start -->
        <?php
        include "./includes/header.php";
        ?>
        <!-- Header Area End -->

        <!-- Admin Area Start -->
        <div class="main">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <div class="admin-form">
                    <a href=""><h4>View Orders</h4></a>
                    <br>
                    <a href=""><h4>Edit Products</h4></a>
                </div>
            </div>
        </div>
        <!-- Admin Area End -->

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