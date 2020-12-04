function addtocart(id,name,price){
    $.ajax({
     url:"api/cartHandler.php",
     type:"POST",
     data:{
       prod_id: id,
       productName : name,
       prodPrice : price
       },
       success:function(response) {
       //  alert(response);
         if(response == "1"){
             alert("SuccessFully Added");
         }
         if(response == "AE"){
             alert("Already Exit in Cart");
         }
     },
     error:function(){
     alert("error");
    }
   });
 }



 function calculateTotalAmount(shippingAmount){
  var subtotal = parseInt($("#subtotal").val());
  var totAmount = subtotal + shippingAmount;
  $("#shippingAmount").html(shippingAmount+" Kr");
  $("#totAmount").val(totAmount);
  $("#total").html(totAmount+" Kr");

}