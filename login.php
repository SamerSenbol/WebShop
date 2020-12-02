<?php
ob_start();
include "./includes/html-start.php";
include "./loginSystem/functions.php";

/*--checking login btn when clicked --*/
if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password']; 
    $encyPass = md5($password);
    $loginFtnResult = login($email,$encyPass); //call login function
   
    if($loginFtnResult === true){ 
        if(isset($_SESSION['userRole'])){
            $role = $_SESSION['userRole'];
            if($role == "Admin"){
                header("location:admin.php");
                exit();
            }
            else if($role == "User"){
                header("location:index.php");
                exit();
            }
        }
      
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
                    <a  class="btn btn-secondary" href="register.php">Register</a>
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