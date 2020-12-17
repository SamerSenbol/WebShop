<?php
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
                $_SESSION['userRole'] = $row['Role'];
                return true;
            }else{
                return false;
            }
        }else{
            return "Wronge email or password"; 
        }
    }    
}

function insertData($table, $data) {
    global $con;
    $key = array_keys($data);
    $val = array_values($data);
    $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
         . "VALUES ('" . implode("', '", $val) . "')";
    $result = mysqli_query($con,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}
?>