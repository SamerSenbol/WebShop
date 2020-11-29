<?php 
include("connection.php");

/*getting product image form the database--*/
function getProductImage($prodId){
    global $con;

    $sqlImage = "SELECT `Image` FROM `products` WHERE `Id` = '$prodId'";
    $resultImage = mysqli_query($con,$sqlImage);
    if($resultImage){
        if(mysqli_num_rows($resultImage) == 1){
            if($rowImg = mysqli_fetch_array($resultImage)){
                return $rowImg['Image'];
            }
        }
    }
}


/*Checking if there is already product in cart array*/
function checkProdInCart($prodID){
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
      for($i = 0; $i < count($_SESSION['cart']); $i++){
        $cartProd  = $_SESSION['cart'][$i]['productID'];
        if($cartProd == $prodID){
          return true;
        }
      }
    }else{
      return false;
    }
  }

?>