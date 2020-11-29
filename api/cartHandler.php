<?php
session_start(); 
include("../includes/functions.php");

/*create new seesion array named 'cart'*/
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
	$_SESSION['cart'] = array();
}

/*check product id, product name , product price to add them in to the cart array*/
  if (isset($_POST['prod_id']) && isset($_POST['productName']) && isset($_POST['prodPrice'])) {
	$prod_id = $_POST['prod_id'];
	$productName = $_POST['productName'];
  $prodPrice = $_POST['prodPrice'];
  
/*call the function to check product already exiset in cart array*/
	if (checkProdInCart($prod_id) == true) {
		echo "The Product is already exiset";
	}else{
		$b=array("productID"=>$prod_id,"productName"=>$productName,"prodPrice"=>$prodPrice);
		array_push($_SESSION['cart'],$b);
		echo "1";
	}
}
?>