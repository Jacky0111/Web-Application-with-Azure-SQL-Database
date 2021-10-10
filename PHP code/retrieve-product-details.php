<style>
   #product-grid {margin: 20px;}
    .product-item {display: inline-block; background: #ffffff; margin-top: 10px; margin-bottom: 30px; margin-left: 80px; margin-right: 80px; border: #E0E0E0 1px solid;}
    .product-image {background-color: #FFF; display: flex; justify-content:center}
    .product-tile-footer {padding: 0px 15px 0px 15px; overflow: auto; font-family: ui-monospace;}
    .product-title{display: flex; justify-content: center; align-items: center; font-size: large;}
    .product-price {display: flex; justify-content: center; align-items: center; font-size: large;}
    form {display: block; width: 370px;}
    .cart-action {display: flex; justify-content: center; align-items: center;}
</style>

<?php
session_start();
echo "<div id='product-grid'>";
    
    global $wpdb;
	$product_array = $wpdb->get_results("SELECT productID, productName, productImage, productQty, FORMAT(productPrice, 2) AS productPrice FROM product");
	if (!empty($product_array)) 
	{   
		foreach($product_array as $key)
		{   
            // echo '$key->productID<br>';
            // echo $key->productID;
            
            if(isset(($_POST['link_product'])))
            {
                $_SESSION["productID"] = $key->productID;
            }
            if(isset(($_POST['toCart'])))
            {
                $product_id_array = $wpdb->get_results("SELECT productID, qty FROM cartitem");

                foreach($product_id_array as $productIDKey)
                {
                    if($productIDKey->productID == $_POST['toCart'])
                    {
						$latestqty = $productIDKey->qty+1;
                        $set2 = array("qty" => $latestqty);
						$where2 = array("productID" => $productIDKey->productID);
						$edit = $wpdb->update("cartitem", $set2, $where2);
                    }
                    else
                    {
                        $qty = 1;
                        $add = $wpdb->insert("cartitem", array("cartID" => 10001, "productID" => $_POST['toCart'], "qty" => $qty));
                    }
                }
				if (count($product_id_array) == 0)
				{
					$qty = 1;
                    $addFirst = $wpdb->insert("cartitem", array("cartID" => 10001, "productID" => $_POST['toCart'], "qty" => $qty));
                }

                echo "<script>setTimeout(alert(\"Product has been successfully added to cart!\"), 1000)</script>";
                
                echo "<script> location.href='https://limchiachung.azurewebsites.net/menu/'; </script>";
                break;
            }
            
            echo
            "<div class='product-item'>
                <form action='https://limchiachung.azurewebsites.net/menu/' method='POST'>
                    <div class='product-image'>
                        <a href='https://limchiachung.azurewebsites.net/product-page/?productID=$key->productID' name='link_product'><img src='$key->productImage' style='width:292px; height:292px; background-color:#00000000;'></a>
                    </div>
                    <div class='product-tile-footer'>
                        <div class='product-title'>$key->productName</div>
                        <div class='product-price'>RM $key->productPrice</div>
                        <div class='cart-action'>
                            <button type='submit' name='toCart' value=$key->productID id='prodBtnAddAction'/>Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>";
		}
	}
echo "</div>";
?>