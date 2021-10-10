<?php
global $wpdb, $inputTransID;
$inputTransID = $_GET["transID"];
$results = $wpdb->get_results( " SELECT SUM(transactionSubtotalAmount) AS totalAmt FROM transactiondetails WHERE transID=$inputTransID "); 
if(!empty($results))                        // Checking if $results have some values or not
{    
    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border-left: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";

    foreach($results as $row){   
        echo "<tr>";        
        echo "<th style='width:86%;text-align:right'>Total Amount</th>" . "<td>" . $row->totalAmt . "</td>";  
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>"; 

}
?>