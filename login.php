<?php
ob_start();
include "./includes/html-start.php";
include "./loginSystem/functions.php";

/*--checking login btn when clicked --*/
if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password']; 

    $loginFtnResult = login($email,$password); //call login function
   
    if($loginFtnResult === true){ 
        header("location:index.php");
        exit();
    }else if($loginFtnResult == "WEP"){
        echo "Invalid Email or Passeord Please Enter Correct one";
    }else{
        echo "Someting Going Wrong Please Try Again";
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
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-black" name="loginBtn">Login</button>
                    <button type="submit" class="btn btn-secondary" href="register.php">Register</button>
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