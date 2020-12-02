<?php
ob_start();
include "./includes/html-start.php";
include "./loginSystem/functions.php";

if(isset($_POST['regBtn'])){
    $fname = mysqli_real_escape_string ($con,$_POST['fName']);
    $lname = mysqli_real_escape_string ($con,$_POST['lName']);
    $email = mysqli_real_escape_string ($con,$_POST['email']);
    $password = mysqli_real_escape_string ($con,$_POST['password']);
    $encyPass = md5($password);

    
    $data = array('FirstName' => $fname,
                  'LastName' =>$lname,
                  'Email' => $email,
                  'Password' =>$encyPass,
                  'Role' => 'User'
                );
    
    $insertRecordResult = insertData('users',$data);
    if($insertRecordResult === true){
        echo "User Data Has been Inserted in Database";
    }else{
        echo "Something going wrong Please Try again";
    }
}
?>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Area Start -->
        <?php
        include "./includes/header.php";
        ?>
        <!-- Header Area End -->

        <!-- Login Area Start -->
        <div class="main">
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <div class="login-form">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label>First Name</label>
                        <input required name="fName" type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input required name="lName"  type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required name="email"  type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input required name="password"  type="password" class="form-control" placeholder="Password">
                    </div>
                    <button name="regBtn" type="submit" class="btn btn-secondary">Register</button>
                </form>
                </div>
            </div>
        </div>
        <!-- Login Area End -->

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