<?php
global $wpdb, $inputTransID;
$inputTransID = $_GET["transID"];
$results = $wpdb->get_results( " SELECT A.productName, A.productImage, B.productQty, FORMAT(B.transactionSubtotalAmount, 2) AS transactionSubtotalAmount FROM product A, transactiondetails B WHERE A.productID = B.productID AND B.transID=$inputTransID "); 
if(!empty($results))                        // Checking if $results have some values or not
{    
    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border-left: 1px solid black;}";
    echo ".table_container td { color:black; border: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";

    echo "<tr><th style=\"padding-left:10px; \"><font size = 4pt>Product Name</th><th><font size = 4pt>Product Image</th><th style = 'text-align:center'><font size = 4pt>Quantity</th><th style = 'text-align:center'><font size = 4pt>Subtotal Amount</th></tr>";

    foreach($results as $row){   

    	echo "<tr><td style = 'text-align:justified'><font size = 4pt>" . $row->productName . "</td><td><img src='$row->productImage' style='width:30%;height:30%;background-color:#00000000;'></td><td style = 'text-align:center'><font size = 4pt>" . $row->productQty ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->transactionSubtotalAmount ."</tr>";


    }


  echo "</tbody>";
    echo "</table>"; 

}
?>