<?php
global $wpdb, $inputTransID;
$inputTransID = $_GET["transID"];
$results = $wpdb->get_results( "SELECT transID FROM transactions WHERE transID = $inputTransID"); 
if(!empty($results))                        // Checking if $results have some values or not
{    
    echo "<body>";
    foreach($results as $row){   
        echo "<tr><td><font size = 4pt> " . $row->transID . "</tr>";
    }
    echo "</table>"; 
}
?>