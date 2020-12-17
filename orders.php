<?php
ob_start();
include "./includes/html-start.php";
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

        <!-- Orders Area Start -->
        <div class="container">
            <div class="row">
                <h4>  Orders </h4>
                <?php 
                    $sql = "SELECT * FROM `orders` ORDER BY `Id`";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0){
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Id</th>
                                            <th>Time</th>
                                            <th>Customer Id</th>
                                            <th>Shipping Id</th>
                                            <th>Email</th>
                                            <th>Post Number</th>
                                            <th>Street</th>
                                            <th>Total Price</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Id']; ?></td>
                                                        <td><?php echo $row['ProductId']; ?></td>
                                                        <td><?php echo $row['Time']; ?></td>
                                                        <td><?php echo $row['CustomerId']; ?></td>
                                                        <td><?php echo $row['ShippingId']; ?></td>
                                                        <td><?php echo $row['Email']; ?></td>
                                                        <td><?php echo $row['PostNumber']; ?></td>
                                                        <td><?php echo $row['Street']; ?></td>
                                                        <td><?php echo $row['TotalPrice']." Kr"; ?></td>
                                                    
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        }
                    }
                
                ?>
               
            </div>
        </div>
        
        <!-- Orders Area End -->

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