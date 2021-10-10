<?php
session_start();

$customerID = $_SESSION["custID"];
global $wpdb;
$results = $wpdb->get_results("SELECT A.transID, A.transDate, C.productName, B.productQty, FORMAT(B.transactionSubtotalAmount, 2) AS transactionSubtotalAmount, D.custID 
                               FROM transactions A, transactiondetails B, product C, customer D 
                               WHERE A.transID = B.transID AND B.productID = C.productID AND
                                     A.custID = D.custID and D.custID = $customerID
                               ORDER BY A.transDate DESC"); 
if(!empty($results)){                     
    $totalAmount = 0;

    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border: 1px solid black;}";
    echo ".table_container td { color:black; border: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";

    echo "<tr>
        <th style=\"padding-left:10px;text-align:center;\">Transaction ID</th>
        <th style = 'text-align:center'>Transaction Date</th>
        <th style = 'text-align:center'>Product Name</th>
        <th style = 'text-align:center'>Quantity</th>
        <th style = 'text-align:center'>Subtotal Amount</th>
    </tr>";
   
    $new_transID = " "; 

    foreach($results as $row){  
        $old_transID = $row->transID;      
        if($new_transID == $old_transID){
            echo "<tr><td> </td><td> </td><td style = 'text-align:center'><font size = 4pt>" . $row->productName ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";
            $old_transAmt = $row->totalAmt;
            $totalAmount += $row->transactionSubtotalAmount;
        }
        else{
            echo "<tr><td style = 'text-align:center'><font size = 4pt>" . $row->transID . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->transDate ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->productName . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";
            $new_transID = $old_transID;
        }
    }
    echo "</table>"; 

}
?>