<div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>
    <?php
    global $wpdb;
    $results = $wpdb->get_results("SELECT P.productID, P.productName, P.productImage, 
                                    FORMAT(P.productPrice, 2) AS productPrice, C.qty
                                    FROM product P, cartitem C
                                    WHERE P.productID = C.productID");   

    $checkDuplicated = array();
    $counter = 0;
    if(!empty($results)){
        echo "<table class='tbl-cart' cellpadding='10 cellspacing='1'>
        <tbody>
        <tr>
            <th width = 600px; style='text-align:left;'>Name</th>
            <th style='text-align:center;' width='5%'>Quantity</th>
            <th style='text-align:center;' width='10%'>Unit Price</th>
            <th style='text-align:center;' width='10%'>Price</th>
            <th style='text-align:center;' width='5%'>Remove</th>
        </tr>";

        foreach($results as $row){

            $unit_price = $row->productPrice;
            $item_price = $row->qty * $unit_price;
            $item_price_new = number_format($item_price, 2);

            echo "<tr>";        
                echo "<td><img src='$row->productImage' style='width:20%;height:20%;background-color:#00000000;'>$row->productName  </td>
                <td style= 'text-align:center'>  $row->qty  </td>
                <td style= 'text-align:center'>  RM $row->productPrice  </td>
                <td style= 'text-align:center'>  RM $item_price_new  </td><br></br>
                <td style='border:none;float:right;margin-top:50px';>
                <center>
                    <form action='' method='POST'>
                        <input type='submit' name='delete' value='Delete' style='color:white;font-size:15px;padding: 15px;background-color:#ff0000;border: none;border-radius: 8px;margin-top:0px'/>
                        <td style= 'width = 0px;'>
                            <input type=hidden name=id value=".$row->productID.">
                        </td>

                    </form>
                </center>
                </td>";  

            echo "</tr>";

            $total_quantity += $row->qty;
            $total_amount += $item_price_new;
            
            if(isset($_POST['delete'])){
                $did = $_POST['id'];
                $wpdb->delete("cartitem", array("cartID" => 10001, 
                                                "productID" =>  $did ,
                                                "qty" => $row->qty));
                header("Location: https://limchiachung.azurewebsites.net/cart/");

                break;
            }
        }
        echo "<tr>
            <td colspan='1' style= 'text-align:right'>Total:</td>
            <td colspan='1' style= 'text-align:center'>$total_quantity</td>
            <td></td>
            <td colspan='1' style= 'text-align:center'><strong>RM " .number_format($total_amount, 2, '.', ''). "</td>
            <td colspan='1' style= 'text-align:right'></td></strong></td>
            <td></td>
        </tr></tbody></table>";

        echo "<td style ='border: none;float:right;margin-top: 50px';> 
            <form action='' method='POST'>		
                <input type='submit' name='payment' value='Proceed Payment' style='color:white;font-size:15px;padding: 15px;background-color:#5FBED7;border: none;border-radius: 8px;float: right;'/>
            </form>
        </td>";

        if (isset($_POST['payment']) && !empty($_POST['payment'])) {
            $set1 = array(cartTotalAmount => $total_amount);
            $where1 = array("cartID" => 10001);
            $edit = $wpdb->update("cart", $set1, $where1);
    
            if($edit){
                echo "<script>setTimeout(alert(\"Proceed to make payment\"), 3000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/payment/'; </script>";
            }
            else{
                echo "<script>setTimeout(alert(\"Failed to receive order!\"), 3000)</script>";
            } 
        }
    }
    else{
        echo"<br></br><bold style = 'font size = 4pt'><center>No Product Found!</center></bold><br></br><br></br><br></br><br></br>";
    }
    ?>
</div>