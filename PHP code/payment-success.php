<?php
session_start();
$customerID = $_SESSION["custID"];
global $wpdb;
$results = $wpdb -> get_results("SELECT C.custID, C.custName, C.phoneNo, C.email
                                                       FROM CUSTOMER C
                                                       WHERE C.custID = $customerID");

$transaction_results = $wpdb->get_results("SELECT max(T.transID) as transID, T.paymentType, T.shippingFees
                                                                       FROM TRANSACTIONS T, CUSTOMER C
                                                                       WHERE C.custID = T.custID AND
                                                                                    T.custID = $customerID
                                                                       GROUP BY T.transID, T.paymentType, C.custID
                                                                       ORDER BY T.transID DESC LIMIT 1");

if(!empty($results)){ 
       foreach($transaction_results as $row){
                $transactionID = $row->transID;
                $shippingFees = $row->shippingFees;
                echo"<h3 style='text-align:left;'>Transaction ID : $transactionID</h3>";
                echo"<h3 style='text-align:left;'>Payment Type : $row->paymentType</h3>";
      $transactionDetails_results = $wpdb->get_results("SELECT SUM(TD.transactionSubtotalAmount) AS transactionTotalAmount
                                                                                                   FROM TRANSACTIONDETAILS TD
                                                                                                   WHERE TD.transID = $transactionID");   
       }
 
       foreach($results as $row){
                echo"<h3 style='text-align:left;'>Customer ID : $row->custID</h3>";
                echo"<h3 style='text-align:left;'>Phone Number : $row->phoneNo</h3>";
                echo"<h3 style='text-align:left;'>Customer Email : $row->email</h3>";               
       }

       foreach($transactionDetails_results as $row){
                 $transactionTotalAmount = $row->transactionTotalAmount;
                 $newTransactionTotalAmount = $transactionTotalAmount + $shippingFees;
                 $totalAmountPaid = number_format($newTransactionTotalAmount, 2);
                 echo"<h3 style='text-align:left;'><b>Amount Paid : RM $totalAmountPaid</b></h3>";   
        }     
}
?>