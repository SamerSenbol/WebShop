<div class="clearfix"></div>
<h1>Select one of categories</h1>
<div style="  margin-left: -230px; margin-top: 100px;">
<?php 
    $sql = "SELECT * FROM `categories`  ORDER BY `Id` DESC";
    $result = mysqli_query($con,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
?>
<ul>
    <?php
    while($row = mysqli_fetch_array($result)){
        $categoriesID = $row['Id'];
        $categoriesName = $row['Name'];
    ?>
    <li><a href="index.php?categoryID=<?php echo $categoriesID; ?>"><?php echo "<h3>$categoriesName</h3>"; ?></a></li>
    <?php } ?>
</ul>
<?php 
        }
    }
?>
</div>