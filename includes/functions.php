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

  function updateProducQty ($prodID){
    global $con;
    $sql = "SELECT `Quantity` FROM `products` WHERE `Id` = '$prodID'";
    $result = mysqli_query($con,$sql);
    if($result){
        if($row = mysqli_fetch_array($result)){
            $qty = $row['Quantity'];

            $newQty = $qty - 1;
            $sql1 = "UPDATE `products` SET `Quantity` = '$newQty' WHERE `Id` = '$prodID'";
            $result1 = mysqli_query($con,$sql1);
        }
    }
}

function placeOrder($fname,$lname,$email,$address,$postNumber,$mobile,$totAmount,$shipping){
    global $con;
    $time = date("Y-m-d h:i:s");
    if(isset($_SESSION['cart'])){
        if(is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
            $cartData = $_SESSION['cart'];
            $i = 0;
            for($i = 0; $i < count($_SESSION['cart']); $i++){ 
                $cartProdID  = $_SESSION['cart'][$i]['productID']; 
                $cartProductName  = $_SESSION['cart'][$i]['productName'];

                $sql = "INSERT INTO `orders` (`ProductId`,`Time`,`ShippingId`,`Email`,`PostNumber`,`Street`,`TotalPrice`) VALUE ('$cartProdID','$time','$shipping','$email','$postNumber','$address','$totAmount')";
                $result = mysqli_query($con,$sql);
                updateProducQty($cartProdID);
                
            }
            unset($_SESSION['cart']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

?>