<?php
ob_start();
include "./includes/html-start.php";
include "./includes/connection.php";
include "./api/productsHandler.php";
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
                <h4>  Products </h4>
                <?php 
                    $sql = "SELECT * FROM `products` ORDER BY `Id`";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        if(mysqli_num_rows($result)>0){
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Id']; ?></td>
                                                        <td><?php echo $row['ProductName']; ?></td>
                                                        <td><?php echo $row['CategoryName']; ?></td>
                                                        <td><?php echo $row['Description']; ?></td>
                                                        <td>
                                                            <?php echo '<img style="width:50px; height:50px;" src="data:image/jpeg;base64,'
                                                                .base64_encode( $row['Image'] ).'"/>';?>
                                                        </td>
                                                        <td><?php echo $row['Price']." Kr"; ?></td>
                                                        <td>
                                                            <form method="POST" action="products.php" >
                                                                <input type= "hidden" value="<?php echo $row['Id']; ?>" name="pid"/>
                                                                <input style="width:50px;" name="qty" type="number" value="<?php echo $row['Quantity']; ?>"/>
                                                                <input type="submit" value="Update Qty" name="updateBtn"/>
                                                            </form>
                                                        </td>
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