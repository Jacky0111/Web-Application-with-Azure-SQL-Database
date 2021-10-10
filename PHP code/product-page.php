<?php
session_start();
global $wpdb, $productID;
$productID = $_GET["productID"];
$product = $wpdb->get_results("SELECT productID, productName, productDescription,
                                      productImage, productQty, productPrice
                               FROM product
                               WHERE productID = $productID");

$productQuantity = $wpdb->get_results("SELECT T.transactionStatus
                                       FROM product P, Transactions T, TransactionDetails TD
                                       WHERE P.productID = TD.productID AND 
                                             T.transID = TD.transID AND
                                             P.productID = $productID");

echo "<head><style>
    #inline{
        width:100%;
        height:auto;
        display:flex;
    } 
    #inline-inner{
        width:100%;
        height:auto;
        display:flex;
    } 
    .left{
        width:45%;
        height: 800px;
        margin:10px;
    }
    .right{
        width:55%;
        height:800px;
        margin:10px;
        font-family: 'Roboto', sans-serif;
        text-align: justify;
    } 
    img {
        display: block;
        margin-top: 30px;
        margin-right: 15px;
        width: 600px;
        height: 600px;
    }
    .productListingTitle {
        letter-spacing: 0.68px;
        font-size: 42px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .productDescription{
        margin-right: 25px;
        font-size: 22px;
        line-height: 130%;
    }

    .price {
        font-weight:bold;
        font-size:2em;
        margin-top: 30;
    }
    .stock{
        font-size:1.5em;
        margin-top: 30px;
    }
    .inputWrap.rounded {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .inputWrap.rounded input, .inputWrap.rounded select, .inputWrap.rounded textarea {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        width: 100%;
        border-radius: 20px;
        padding: 15px 20px;
        margin-bottom: 0;
        margin-top: 0;
        transition: border-color 0.3s;
        outline: none; 
        text-align: center;
    }
</style></head>";

echo "<body>";
$Total_Sold = 0;
if(!empty($product))
{
    foreach($productQuantity as $key)
	{
        if($key->transactionStatus == 'Completed')
		{
            $Total_Sold++;
        }
    }

    foreach($product as $row)
	{
        echo "<div id='inline'>
            <div class='left'>
                <img src=" .$row->productImage. ">
            </div>";
            
            echo "<div class='right'>";
                echo "<h3 class='productListingTitle'>" .$row->productName. "</h3>
                <div class='productDescription'>
                    <p>" .$row->productDescription. "</p>
                </div>";

                echo "<div class='stock'>";
                    echo "<table style='width: 100%;border:none;text-align:justify;'>";
                        echo "<tr style='font-size:1em;'>";
                            echo "<td style='border:none;'>" .$Total_Sold. " sold</td>";
                            echo "<td style='border:none;'>" .$row->productQty. " piece available</td>";
                    echo "</tr>";
                    echo "</table>";
                echo "</div>";
                
                echo "<div class='price'>";
                    echo "<p>RM " .number_format($row->productPrice, 2, '.', ''). "</p>";
                echo "</div>";
                
                echo "<p><strong style='font-size:1em;margin-left:5px;margin-bottom:10px;font-size:20px;'>Quantity</strong></p>
                <form style='margin-top: 30px; margin-right: 5px;' method='POST'>
                    <div class='inputWrap rounded flexwrap'>
                        <div id='inline-inner'>
                            <div style='width:20%'>
                                <input type='number' id='quantity' name='quantity' min='0' max='100' step='1' value='1'>
                            </div>
                            <div style='width:5%'></div>
                            <div style='width:30%;'>
                                <input name='add-to-cart' type='submit' value='Add To Cart' id='shopPageAddAction'>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>";

        if(isset($_POST['add-to-cart']))
		{    
		    $product_id_array = $wpdb->get_results("SELECT productID, qty FROM cartitem");

			foreach($product_id_array as $productIDKey)
			{
				if($productIDKey->productID == $row->productID)
				{
					$latestqty = $productIDKey->qty + $_POST['quantity'];
					$set2 = array("qty" => $latestqty);
					$where2 = array("productID" => $productIDKey->productID);
					$edit = $wpdb->update("cartitem", $set2, $where2);
				}
				else
				{
					$qty = $_POST['quantity'];
					$add = $wpdb->insert("cartitem", array("cartID" => 10001, "productID" => $row->productID, "qty" => $qty));
				}
			}
			if (count($product_id_array) == 0)
			{
				$qty = $_POST['quantity'];
				$addFirst = $wpdb->insert("cartitem", array("cartID" => 10001, "productID" => $row->productID, "qty" => $qty));
			}
			echo "<script>setTimeout(alert(\"Product has been successfully added to cart!\"), 1000)</script>";
                
            break;
        }
        break;
    }
}
echo "</body>";
?>