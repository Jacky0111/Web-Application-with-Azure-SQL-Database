<?php
session_start();
$customerID = $_SESSION["custID"];
global $wpdb;
$results = $wpdb -> get_results("SELECT C.custID, C.custName, C.phoneNo, C.address
                                                       FROM CUSTOMER C
                                                       WHERE C.custID = $customerID");
$cart_custID = $wpdb->get_results("UPDATE CART
                                                           SET custID = $customerID");
$cart_results = $wpdb->get_results("SELECT P.productID, P.productImage, P.productName, CI.qty, FORMAT(P.productPrice, 2) AS productPrice
                                                            FROM CART CR, CUSTOMER C, CARTITEM CI, PRODUCT P
                                                            WHERE C.custID = CR.custID AND
                                                                         CR.cartID = CI.cartID AND
                                                                         CI.productID = P.productID AND
                                                                         CR.custID = $customerID
                                                             GROUP BY P.productImage, P.productID, P.productName, CI.qty, CR.cartTotalAmount, CR.cartID");
$shippingFee_results = $wpdb->get_results("SELECT T.shippingFees
                                                                         FROM TRANSACTIONS T
                                                                         WHERE T.custID = $customerID");
$transaction_results = $wpdb->get_results("SELECT max(transID) as transID
                                                                       FROM TRANSACTIONS");
$cartItem_results = $wpdb->get_results("SELECT CI.cartID, CI.productID, CI.qty
                                                                   FROM CARTITEM CI, CART CR
                                                                   WHERE CR.cartID = CI.cartID
                                                                   GROUP BY CI.cartID, CI.productID, CI.qty");
$product_results = $wpdb->get_results("SELECT P.productID, P.productQty, CI.qty
                                                                 FROM PRODUCT P, CARTITEM CI, CART CR
                                                                 WHERE P.productID = CI.productID AND
                                                                              CR.cartID = CI.cartID
                                                                 GROUP BY P.productID, P.productQty, CI.qty");
if(!empty($results)){
echo "<h1><b>Checkout</b></h1>";
echo "<table width='100%' border='0'>"; 
        echo "<tbody>";
            
            echo 
	    "<tr>
              <th><font size = 4.5pt>Customer ID</th>
              <th><font size = 4.5pt>Customer Name</th>
              <th><font size = 4.5pt>Phone Number</th>
              <th><font size = 4.5pt>Address</th>
            </tr>";
            
            foreach($results as $row)
            {
                echo
                "<tr>
                    <td width = 100px;> <font size = 4pt> $row->custID </td>
                    <td width = 100px;> <font size = 4pt> $row->custName </td>
                    <td width = 100px;> <font size = 4pt> $row->phoneNo</td>
                    <td width = 100px;> <font size = 4pt> $row->address</td>
                </tr>";
            }
        echo "</tbody>";
    echo "</table>"; 

echo "<br><h3><b>Product Details</b></h3>";
     echo "<table width='100%' border='0'>"; 
        echo "<tbody>";
            
            echo 
	    "<tr>
               <th><font size = 4.5pt>Product Image</th>
               <th><font size = 4.5pt>Product Name</th>
               <th><font size = 4.5pt>Product Quantity</th>
               <th><font size = 4.5pt>Product Price (RM)</th>
               <th><font size = 4.5pt>Total Product Price (RM)</th>
            </tr>";

             foreach($shippingFee_results as $row)
            {
               $shippingAmount = $row->shippingFees;
               $newShippingAmount = number_format($shippingAmount, 2);  
            }
            
            foreach($cart_results as $row)
            {
               $productID = $row->productID;
               $productPrice = $row->productPrice;
               $productQuantity = $row->qty;
               $totalProductPrice = ($productPrice * $productQuantity);
               $newTotalProductPrice = number_format($totalProductPrice, 2);
                echo
                "<tr>
                    <td width = 100px;> <img src='$row->productImage' style='width:200px;height:200px;background-color:#00000000;'> </td>
                    <td width = 100px;> <font size = 4pt> $row->productName </td>
                    <td width = 100px;> <font size = 4pt> $productQuantity </td>
                    <td width = 100px;> <font size = 4pt> $productPrice </td>
                    <td width = 100px;> <font size = 4pt> $newTotalProductPrice </td>
                </tr>";
                               $amount = $amount + $totalProductPrice;
                               $newAmount = number_format($amount, 2);
                               $totalAmount = $amount + $shippingAmount;
                               $newTotalAmount = number_format($totalAmount, 2);
            }
        echo "</tbody>";
        echo"<tr> 
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt><b>Amount (RM)</b></td>
                 <td width = 100px;><font size = 4pt><b>$newAmount</b></td>
                 </tr>";
          echo"<tr> 
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt><b>Shipping Fees (RM)</b></td>
                 <td width = 100px;><font size = 4pt><b>$newShippingAmount</b></td>
                 </tr>";
           echo"<tr> 
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt></td>
                 <td width = 100px;> <font size = 4pt><b>Total Amount (RM)</b></td>
                 <td width = 100px;><font size = 4pt><b> $newTotalAmount </b></td>
                 </tr>";
    echo "</table>"; 

        foreach($transaction_results as $row){
                    $lastTransactionID = $row->transID;
                    $newTransactionID = $lastTransactionID + 1;
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $date = date('Y-m-d');
        }

     if(isset($_POST['paymentMethod']) == "onlineBanking"){
        echo $_POST['OnlineBankingForm'];
     }
     else if(isset($_POST['paymentMethod']) == "card") {
        echo $_POST['cardPaymentForm'];
     }

     if(isset($_POST['submitOnlineBanking'])){
       $paymentType = "Online Banking";
       $wpdb->insert("transactions", array("transID" => $newTransactionID , "transDate" => $date, "shippingFees"=> $shippingAmount, 
                                                                  "paymentType"=>$paymentType, "shippedDate"=>NULL, "custID"=> $customerID, 
                                                                  "voucherID"=>NULL, "transactionStatus"=>"To Ship"));
       foreach($cart_results as $row){
               $productID = $row->productID;
               $productPrice = $row->productPrice;
               $productQuantity = $row->qty;
               $totalProductPrice = ($productPrice * $productQuantity);
               $newTotalProductPrice = number_format($totalProductPrice, 2);
               $wpdb->insert("transactiondetails", array("transID"=> $newTransactionID, "productID"=>$productID, "productQty"=> $productQuantity, "transactionSubTotalAmount"=> $totalProductPrice));
       }
     
       foreach($product_results as $row){
               $cartQuantity = $row->qty;
               $productQuantity = $row->productQty;
               $productID = $row->productID;
               $newProductQuantity = $productQuantity - $cartQuantity;
                $wpdb->get_results("UPDATE PRODUCT
                                                   SET productQty = $newProductQuantity
                                                   WHERE productID = $productID");
       }

       foreach($cartItem_results as $row){
               $cartID = $row->cartID;
               $productID = $row->productID;
               $cartItemQuantity = $row->qty;
               $wpdb->delete("cartitem", array("cartID"=> $cartID, "productID"=> $productID, "qty"=> $cartItemQuantity));
       }
               $newCartTotalAmount = "0";
               $cartTable_update = $wpdb->get_results("UPDATE CART
                                                                                    SET cartTotalAmount = $newCartTotalAmount");
               echo "<script>setTimeout(alert(\"Payment Successful !!! \"), 3000)</script>";
               echo "<script>location.href='https://limchiachung.azurewebsites.net/payment-sucess/';</script>";
     }

     if(isset($_POST['submitCardPayment'])){
       $paymentType = "Credit/Debit Card";
       $wpdb->insert("transactions", array("transID" => $newTransactionID , "transDate" => $date, "shippingFees"=> $shippingAmount, 
                                                                  "paymentType"=>$paymentType, "shippedDate"=>NULL, "custID"=> $customerID, 
                                                                  "voucherID"=>NULL, "transactionStatus"=>"To Ship"));
       foreach($cart_results as $row){
               $productID = $row->productID;
               $productPrice = $row->productPrice;
               $productQuantity = $row->qty;
               $totalProductPrice = ($productPrice * $productQuantity);
               $newTotalProductPrice = number_format($totalProductPrice, 2);
               $wpdb->insert("transactiondetails", array("transID"=> $newTransactionID, "productID"=>$productID, "productQty"=> $productQuantity, "transactionSubTotalAmount"=> $totalProductPrice));
       }

       foreach($product_results as $row){
               $cartQuantity = $row->qty;
               $productQuantity = $row->productQty;
               $productID = $row->productID;
               $newProductQuantity = $productQuantity - $cartQuantity;
                $wpdb->get_results("UPDATE PRODUCT
                                                   SET productQty = $newProductQuantity
                                                   WHERE productID = $productID");
       }

       foreach($cartItem_results as $row){
               $cartID = $row->cartID;
               $productID = $row->productID;
               $cartItemQuantity = $row->qty;
               $wpdb->delete("cartitem", array("cartID"=> $cartID, "productID"=> $productID, "qty"=> $cartItemQuantity));
       }
       $newCartTotalAmount = "0";
       $cartTable_update = $wpdb->get_results("UPDATE CART
                                                                            SET cartTotalAmount = $newCartTotalAmount");
        echo "<script>setTimeout(alert(\"Payment Successful !!! \"), 3000)</script>";
        echo "<script>location.href='https://limchiachung.azurewebsites.net/payment-sucess/';</script>";
     }
}
else{
    echo "<h1>No Record Found</h1>";
    echo "<script>setTimeout(alert(\"Please Login before make payment !!! \"), 3000)</script>";
    echo "<script>location.href='https://limchiachung.azurewebsites.net/log-in/';</script>";
}
?>

<form name="paymentMethod" method = 'POST'>
     <h3><b>Payment Method</b></h3>
<input type = "radio" name = "paymentMethod" id="onlineBanking" value="onlineBanking"> 
<label for="onlineBanking"><i class="fa fa-bank" style="font-size:24px"></i> Online Banking</label>
<br></br>
<input type = "radio" name="paymentMethod" id="card" value="card">
<label for="card"><i class="fa fa-credit-card" style="font-size:24px"></i> Credit\Debit Card</label>
<br></br>
</form>

<form name="OnlineBankingForm" method = "POST">
<h4><br><b>Online Banking Details</b></h4>

<!--display errors returned by createToken -->
<span class="onlineBankingPaymentError"></span>

<!--stripe online banking form-->
<p>
      <label><i class="fa fa-user"></i> Account Name</label>
      <input type="text" name="OnlineBankingForm" id="BankingID" placeholder= "Milly" required>
</p>
<p>
     <label><i class="fa fa-key icon"></i> Password</label>
      <input type="password" name="OnlineBankingForm" id="BankingPassword" placeholder="" required>      
<!-- An element to toggle between password visibility -->
      <input type="checkbox" onclick="showPasswordFunction()"> Show Password
</p>
<p>
      <button type="submit" name="submitOnlineBanking" value="Place Order" style="background-color: #5FBED7; color: white; padding: 12px; margin: 10px 0; border: none; width: 100%; border-radius: 3px; cursor: pointer; font-size: 17px;"><b>Place Order</b></button>
</p>
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form name="cardPaymentForm" method = "POST">

          <div class="col-50">
            <h4><br><b>Credit/Debit Card Details</b></h4>
            <label>Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label>Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label>Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000" minlength="19" maxlength="19" required>

            <div class="row">
              <div class="col-50">
                <label>Expiration Date</label>
                <input type="text" id="expdate" name="expdate" placeholder="MM/YY" minlength="5" maxlength="5" required>
              </div>
              <div class="col-50">
                <label>CVV</label>
                <input type="password" id="cvv" name="cvv" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3" required>
              </div>
            </div>
          </div>
        <button type="submit" name="submitCardPayment" value="Place Order" style="background-color: #5FBED7; color: white; padding: 12px; margin: 10px 0; border: none; width: 100%; border-radius: 3px; cursor: pointer; font-size: 17px;"><b>Place Order</b></button>
</form>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
jQuery(document).ready(function(){
jQuery('form[name=OnlineBankingForm]').hide();
jQuery('form[name=cardPaymentForm]').hide();
jQuery('input[name=paymentMethod]').on('change',function(){
    if(jQuery(this).val() == 'onlineBanking'){
        jQuery('form[name=OnlineBankingForm]').show();
        jQuery('form[name=cardPaymentForm]').hide();
    }
    else{
        jQuery('form[name=OnlineBankingForm]').hide();
        jQuery('form[name=cardPaymentForm]').show();
    }
});
});
</script>

<script>
function showPasswordFunction(){
  var x = document.getElementById("BankingPassword");
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>