<?php
session_start();

$customerID = $_SESSION["custID"];
global $wpdb;
$results = $wpdb->get_results( "SELECT A.transID, C.productName, B.productQty, FORMAT(B.transactionSubtotalAmount, 2) AS transactionSubtotalAmount FROM transactions A, transactiondetails B, product C, customer D WHERE A.transID = B.transID AND B.productID = C.productID AND A.custID = D.custID AND D.custID = $customerID AND transactionStatus = 'Cancelled' "); 
if(!empty($results)){                      // Checking if $results have some values or not
    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border: 1px solid black;}";
    echo ".table_container td { color:black; border: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";

    echo "<tr>
        <th style=\"padding-left:10px;text-align:center;\"><font size = 4pt>Transaction ID</th>
        <th style = 'text-align:center'><font size = 4pt>Product Name</th>
        <th style = 'text-align:center'><font size = 4pt>Quantity</th>
        <th style = 'text-align:center'><font size = 4pt>Subtotal Amount</th>
    </tr>";
   
    $new_transID = " "; 
    $counter = 1;
    $totalAmount = 0;
    $length = count($results);
    foreach($results as $row){  
        $old_transID = $row->transID;  
        if($counter === 1){
            echo "<tr><td style = 'text-align:center'><font size = 4pt>" . $row->transID . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productName . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";
            $new_transID = $old_transID;
            $totalAmount += $row->transactionSubtotalAmount;
        }
        elseif($new_transID == $old_transID){
            echo "<tr><td> </td><td style = 'text-align:center'><font size = 4pt>" . $row->productName . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";
            $totalAmount += $row->transactionSubtotalAmount;	    
        }
        else{
            $totalAmountPaid = number_format($totalAmount, 2);
            echo "<tr><td colspan='3' style = 'text-align:right'><font size = 4pt>Total Amount</td><td style = 'text-align:center'><font size = 4pt>" . $totalAmountPaid . "</td>";
            echo "<tr><td style ='border: none;'> <br></br></td>";

            echo "<tr>
        	<th style=\"padding-left:10px;text-align:center;\"><font size = 4pt>Transaction ID</th>
        	<th style = 'text-align:center'><font size = 4pt>Product Name</th>
       		<th style = 'text-align:center'><font size = 4pt>Quantity</th>
        	<th style = 'text-align:center'><font size = 4pt>Subtotal Amount</th>
    	    </tr>";
	        echo "<tr><td style = 'text-align:center'><font size = 4pt>" . $row->transID . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productName . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";
            $new_transID = $old_transID;
            $totalAmount = 0;
            $totalAmount += $row->transactionSubtotalAmount;
        }

        if($length == $counter){
            $totalAmountPaid = number_format($totalAmount, 2);
            echo "<tr><td colspan='3' style = 'text-align:right'><font size = 4pt>Total Amount</td><td style = 'text-align:center'><font size = 4pt>" . $totalAmountPaid . "</td>";
            echo "<tr><td style ='border: none;'> <br></br></td>";
        }
        $counter++;
    }
    echo "</table>"; 
}
else{
    echo"<br></br><font size = 4pt><bold><center>No Transaction Found!</center></bold><br></br><br></br><br></br><br></br>";
}
?>