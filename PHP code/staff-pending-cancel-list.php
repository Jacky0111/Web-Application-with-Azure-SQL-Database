<?php
global $wpdb;
$results = $wpdb->get_results( "SELECT orderCancellationID, transID, requestDate, responseDate, cancellationReason 
                                FROM ordercancellation 
                                WHERE cancellationStatus = 'Pending' 
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
   
    $new_orderCancellationID = " "; 
    foreach($results as $row){  
        $old_orderCancellationID = $row->orderCancellationID;

        echo "<tr>
            <th style = 'text-align:center;font-size:17px'>Order Cancellation ID</th>
            <th style = 'text-align:center;font-size:17px'>Transaction ID</th>
            <th style = 'text-align:center;font-size:17px'>Request Date</th>
            <th style = 'text-align:center;font-size:17px'>Response Date</th>
            <th style = 'text-align:center;font-size:17px'>Cancellation Reason</th>
    	</tr>";

	   echo "<tr>
            <td style = 'text-align:center;font-size:17px'>" . $row->orderCancellationID . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->transID . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->requestDate . "</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->responseDate ."</td>
            <td style = 'text-align:center;font-size:17px'>" . $row->cancellationReason ."</td>
        </tr>";
 
	    echo "<form method='POST' action='' >
            <tr>
                <td colspan='4' style ='border: none;'> </td>
                <td style ='border: none;float:right'>
                    <button type='submit' name='Accept' value='$row->orderCancellationID' style='color:black;font-size:20px;padding: 20px;background-color:#90EE90;border: none;border-radius: 8px'>Accept</button>
                    <button type='submit' name='Reject' value='$row->orderCancellationID' style='color:black;font-size:20px;padding: 20px;background-color:#FF6666;border: none;border-radius: 8px'>Reject</button><br></br>
                </td>
            </tr>
        </form>";
        
        $new_orderCancellationID = $old_orderCancellationID;

        if (isset($_POST['Accept']) && !empty($_POST['Accept'])) {
            $date= date("Y-m-d");
            $set1 = array("responseDate" => $date,
                            "cancellationStatus" => 'Accepted',
                            "staffID" => '20WMR08883');
            $where1 = array('orderCancellationID' => $_POST['Accept']);
            $edit = $wpdb->update("ordercancellation", $set1, $where1);

            $ocID = $_POST['Accept'];
            $getTransID = $wpdb->get_results( "SELECT orderCancellationID, transID
                                         FROM ordercancellation 
                                         WHERE orderCancellationID = $ocID");
            
            foreach($getTransID as $key1){
                $set2 = array("transactionStatus" => 'Cancelled');
                $where2 = array('transID' => $key1->transID);
                $updateTrans = $wpdb->update("transactions", $set2, $where2);

                $getStock = $wpdb->get_results("SELECT TD.transID, P.productID, P.productQty, TD.productQty, 
                                                       (P.productQty + TD.productQty) AS currentStock
                                                FROM transactiondetails TD, product P
                                                WHERE TD.productID = P.productID AND TD.transID = $key1->transID"); 
                
                echo '$getStock';
                echo count($getStock);

                foreach($getStock as $key2){
                    $set3 = array("productQty" => $key2->currentStock);
                    $where3 = array('productID' => $key2->productID);
                    $updateStock = $wpdb->update("product", $set3, $where3);
                }

                break;
            }

            if($edit && $updateTrans && $updateStock){
                echo "<script>setTimeout(alert(\"Accepted Sucessfully!\"), 1000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/responded-staff-view/'; </script>";
            }
            else{
		        echo "<script>alert(\"Failed to accept!\")</script>";		
            } 
	        break;                                  	
        }
        elseif (isset($_POST['Reject']) && !empty($_POST['Reject'])){
            $date= date("Y-m-d");
       
            $set2 = array("responseDate" => $date,
                            "cancellationStatus" => 'Rejected',
                            "staffID" => '20WMR08883');
            $where2 = array('orderCancellationID' => $_POST['Reject']);
            $edit = $wpdb->update("ordercancellation", $set2, $where2);
            
            if($edit){
                echo "<script>setTimeout(alert(\"Rejected Successfully!\"), 1000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/rejected-staff-view/'; </script>";
            }
            else{
		        echo "<script>alert(\"Failed to reject!\")</script>";		 
            } 
	    break;                                      	
        }
    }
    echo "</table>"; 
}   
else{
    echo"<br></br><bold style = 'font size = 4pt'><center>No Transaction Found!</center></bold><br></br><br></br><br></br><br></br>";
}

?>