<?php
global $wpdb;
$results = $wpdb->get_results( "SELECT orderCancellationID, transID, requestDate, responseDate, cancellationReason 
                                FROM ordercancellation 
                                WHERE cancellationStatus = 'Accepted' 
                                ORDER BY requestDate"); 

if(!empty($results)){                      // Checking if $results have some values or not
    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;}";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border: 1px solid black;}";
    echo ".table_container td { color:black; border: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";
        echo "<tr>
            <th style = 'text-align:center;font-size:17px'>Order Cancellation ID</th>
            <th style = 'text-align:center;font-size:17px'>Transaction ID</th>
            <th style = 'text-align:center;font-size:17px'>Request Date</th>
            <th style = 'text-align:center;font-size:17px'>Response Date</th>
            <th style = 'text-align:center;font-size:17px'>Cancellation Reason</th>
    	</tr>";
   
    $new_orderCancellationID = " "; 
    foreach($results as $row){  
        $old_orderCancellationID = $row->orderCancellationID; 

	   echo "<tr>
            <td style = 'text-align:center;font-size:17px'>" . $row->orderCancellationID . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->transID . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->requestDate . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->responseDate ."</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->cancellationReason ."</td>
        </tr>";

        $new_orderCancellationID = $old_orderCancellationID;

    }
    echo "</table>"; 
}   
else{
    echo"<br></br><bold style = 'font size = 4pt'><center>No Transaction Found!</center></bold><br></br><br></br><br></br><br></br>";
}

?>