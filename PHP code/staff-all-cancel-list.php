<?php
global $wpdb;
$results = $wpdb->get_results( "SELECT orderCancellationID, requestDate, responseDate, cancellationReason FROM ordercancellation ORDER BY requestDate"); 
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
        <th style=\"padding-left:10px;\"><font size = 4pt>Order Cancellation ID</th>
        <th style = 'text-align:center'><font size = 4pt>Request Date</th>
        <th style = 'text-align:center'><font size = 4pt>Response Date</th>
        <th style = 'text-align:center'><font size = 4pt>Cancellation Reason</th>
    </tr>";
   
    $new_orderCancellationID = " "; 
    $counter = 1;

    $length = count($results);
    foreach($results as $row){  
        $old_orderCancellationID = $row->orderCancellationID;  
        if($counter === 1){
            echo "<tr><td><font size = 4pt>" . $row->orderCancellationID . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->requestDate . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->responseDate ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->cancellationReason ."</tr>";
            $new_orderCancellationID = $old_orderCancellationID;
        }
        elseif($new_orderCancellationID == $old_orderCancellationID){
            echo "<tr><td> </td><td style = 'text-align:center'><font size = 4pt>" . $row->requestDate . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->responseDate ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->cancellationReason ."</tr>";	    
        }
        else{
	        echo "<tr><td><font size = 4pt>" . $row->orderCancellationID . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->requestDate . "</td><td style = 'text-align:center'><font size = 4pt>" . $row->responseDate ."</td><td style = 'text-align:center'><font size = 4pt>" . $row->cancellationReason ."</tr>";
            $new_orderCancellationID = $old_orderCancellationID;
        }

        $counter++;
    }
    echo "</table>"; 
}
else{
    echo"<br></br><font size = 4pt><bold><center>No Transaction Found!</center></bold><br></br><br></br><br></br><br></br>";
}