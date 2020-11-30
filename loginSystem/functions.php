<?php
include("includes/connection.php"); 

function login($email,$password){
    global $con;

    $sql = "SELECT * FROM `users` WHERE `Email` = '$email' AND `Password` = '$password'";
    $result = mysqli_query($con,$sql);
    if($result){
        //creating Session variable
        if(mysqli_num_rows($result) == 1){
            if($row = mysqli_fetch_array($result)){
                $_SESSION['userID'] = $row['Id'];  
                $_SESSION['userFullName'] = $row['FirstName']." ".$row['LastName'];
                $_SESSION['userEmail'] = $row['Email'];
                return true;
            }else{
                return false;
            }
        }else{
            return "Wronge email or password"; 
        }
    }    
}
?>