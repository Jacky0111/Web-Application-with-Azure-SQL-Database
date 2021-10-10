<?php
global $wpdb;
$results = $wpdb->get_results("SELECT productID, productName, productQty, productPrice, entryDate 
                               FROM product 
                               ORDER BY entryDate DESC"); 
if(!empty($results)){
    echo "<style>";
    echo "body {font-family: Arial;}";

    echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
    echo ".table_container th { background-color:lightblue; color:black; font-weight:bold; border: 1px solid black;}";
    echo ".table_container td { color:black; border: 1px solid black;}";
    echo "</style></head>";
    echo "<body>";

    echo "<div class=\"table_container\"><table>";

    echo "<tr>
        <th style=\"padding-left:10px;\"><font size = 4pt>Product ID</th>
        <th style = 'text-align:center'><font size = 4pt>Product Name</th>
        <th style = 'text-align:center'><font size = 4pt>Quantity</th>
        <th style = 'text-align:center'><font size = 4pt>Product Price</th>
        <th style = 'text-align:center'><font size = 4pt>Last Changed Date</th>
    </tr>";
   
    $new_productID = " "; 
    foreach($results as $row){  
        echo "<tr>
            <td style = 'text-align:center'><font size = 4pt>" . $row->productID . "</td>
            <td style = 'text-align:center'><font size = 4pt>" . $row->productName . "</td>
            <td style = 'text-align:center'><font size = 4pt>" . $row->productQty . "</td>
            <td style = 'text-align:center'><font size = 4pt>" . number_format($row->productPrice, 2, '.', '') ."</td>
            <td style = 'text-align:center'><font size = 4pt>" . $row->entryDate ."</td>
            </tr>";
        }
    echo "</table>"; 
}