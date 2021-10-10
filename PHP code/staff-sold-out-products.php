<style>
    #product-grid {margin: 20px;}
    .product-item {display: inline-block; background: #ffffff; margin-top: 10px; margin-bottom: 30px; margin-left: 80px; margin-right: 80px; border: #E0E0E0 1px solid;}
    .product-image {background-color: #FFF; display: flex; justify-content:center}
    .product-tile-footer {padding: 0px 15px 0px 15px; overflow: auto; font-family: ui-monospace;}
    .product-title{display: flex; justify-content: center; align-items: center; font-size: large;}
    .product-price {display: flex; justify-content: center; align-items: center; font-size: large;}
    form {display: block; height: 420px; width: 370px;}
    .cart-action {display: flex; justify-content: center; align-items: center;}
    div#product-grid #productDetailsButtton{padding: 14px 20px; margin: 5px 0; background-color: #211a1a; border: none; color: #efefef; text-decoration: none; border-radius: 25px; cursor: pointer; font-weight: bold;
    .product-quantity {padding: 5px 10px; border-radius: 3px; border: #E0E0E0 1px solid;}
    div#product-grid #productDetailsButtton:hover {background-color: #5FBED7; color: #211a1a; border: solid; border-block-width: 3px; border-color: #211a1a;}    
</style>

<?php
echo "<div id='product-grid'>";
    global $wpdb;
    $results = $wpdb->get_results("SELECT productID, productName, productImage, productQty, FORMAT(productPrice, 2) AS productPrice 
                                   FROM product 
                                   WHERE productQty = 0"); 
	if (!empty($results)){ 
		foreach($results as $key){
		   echo
            "<div class='product-item'>
                <form method='GET'>
                    <div class='product-image'>
                        <img src='$key->productImage' style='width:292px; height:292px; background-color:#00000000;'>
                    </div>
                    <div class='product-tile-footer'>
                        <div class='product-title'>$key->productName</div>
                        <div class='product-price'>RM $key->productPrice</div>
                        <div class='cart-action'>
                            <a href='https://limchiachung.azurewebsites.net/product-description/?productID=$key->productID' name='link_product'>
                                <input type='button' name='replenishment' value='Replenishment' id='productDetailsButtton'/>
                            </a>
                        </div>
                    </div>
                </form>
            </div>";
            if(isset(($_GET['replenishment'])))
            {
                session_start();
                $_SESSION["productID"] = $key->productID;
            }
		}
	}
    else{
        echo"<br></br><bold style = 'font size = 4pt'><center>No Products Sold Out!</center></bold><br></br><br></br><br></br><br></br>";
    }
echo "</div>";
?>