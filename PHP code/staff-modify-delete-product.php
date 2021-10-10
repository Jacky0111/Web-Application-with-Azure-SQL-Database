<?php
session_start();
global $wpdb, $productID;
$productID = $_GET["productID"];

$results = $wpdb->get_results("SELECT productID, productName, productImage, productDescription, 
                                      FORMAT(productPrice, 2) AS productPrice, productQty
                               FROM product
                               WHERE productID = $productID");

if (!empty($results)){
    foreach($results as $row){
        echo "<form method='POST'>
            <div class='row'>
                <div class='col-50'>
                    <label for='productImage' style='cursor: pointer;'>Product Image</label>
                    <input value=$row->productImage type='file' accept='image/*' id='productImage' name='productImage' style='border-style: solid;border-color: black'><br>
                    
                    <label for='productName'>Product Name</label>
                    <input value='$row->productName' type='text' id='productName' name='productName' required style='border-style: solid;border-color: black'><br>
                    
                    <label for='productDescription'>Product Description</label>
                    <input value='$row->productDescription' type='text' id='productDescription' name='productDescription' autocomplete='off' required style='border-style: solid;border-color: black'><br>

                    <div class='row'>
                        <div class='col-50'>
                            <label for='productPrice'>Product Price (RM)</label>
                            <input value=$row->productPrice type='text' id='productPrice' name='productPrice' required style='border-style: solid;border-color: black'><br>
                        </div>
                        <div class='col-50'>
                            <label for='quantity'>Quantity</label>
                            <input value=$row->productQty type='number' id='quantity' name='quantity' min='0' required style='border-style: solid;border-color: black'><br>               
                        </div>
                    </div>
                    
                    <div class='row' style='margin-bottom: 50px'>
                        <div class='col-33'>
                            <input name='cancel' type='submit' value='Cancel' style=color:white;>
                        </div>
                        <div class='col-33'>
                            <input name='delete' type='submit' value='Delete' style=color:white; onclick='confirmDelete'>
                        </div>
                        <div class='col-33'>
                            <input name='update' type='submit' value='Update' style=color:white;>
                        </div>
                    </div>
                </div>
            </div>
        </form>";

        if(isset($_POST['cancel'])){
            echo "<script>setTimeout(alert(\"No Changes Made!\"), 1000)</script>";
            echo "<script> location.href='https://limchiachung.azurewebsites.net/all-products/'; </script>";
        }

        if(isset($_POST['delete'])){
            $delete = $wpdb->delete("product", array("productId" => $row->productID));

            if($delete){
                echo "<script>setTimeout(alert(\"Product $row->productID has been successfully deleted!\"), 1000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/products-staff-view/'; </script>";
            }
            else{
		        echo "<script>alert(\"Failed To Delete Product $row->productID!\")</script>";		 
            } 
        }

        if(isset($_POST['update']) && !empty($_POST['update'])){
            if(empty($_POST['productImage'])){
                $_POST['productImage'] = $row->productImage;
            }
            
            $date = date("Y-m-d");
            $set = array("productName" => $_POST['productName'],
                         "productDescription" => $_POST['productDescription'],
                         "entryDate" => $date,  
                         "productQty" => $_POST['quantity'],  
                         "productPrice" => $_POST['productPrice'],
                         "productImage" => $_POST['productImage']);

            $where = array('productID' => $row->productID);
            $modify = $wpdb->update("product", $set, $where);
            

            if($modify){
                echo "<script>setTimeout(alert(\"Product $row->productID has been successfully updated!\"), 1000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/products-staff-view/'; </script>";
            }
            else{
		        echo "<script>alert(\"Failed To Update Product $row->productID!\")</script>";		 
            } 
        }
        break;
    }
}
?>