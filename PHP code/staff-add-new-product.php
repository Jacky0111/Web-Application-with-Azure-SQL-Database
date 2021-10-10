<form method='POST'>
    <div class='row'>
        <div class='col-50'>
            <label for='productImage' style='cursor: pointer;'>Product Image</label>
            <input type='file' accept='image/*' id='productImage' name='productImage' required style='border-style: solid;border-color: black'><br>
            
            <label for='productName'>Product Name</label>
            <input type='text' id='productName' name='productName' required style='border-style: solid;border-color: black'><br>
            
            <label for='productDescription'>Product Description</label>
            <input type='text' id='productDescription' name='productDescription' autocomplete='off' required style='border-style: solid;border-color: black'><br>
            <div class='row'>
                <div class='col-50'>
                    <label for='productPrice'>Product Price (RM)</label>
                    <input type='text' id='productPrice' name='productPrice' required style='border-style: solid;border-color: black'><br>
                </div>
                <div class='col-50'>
                    <label for='quantity'>Quantity</label>
                    <input type='number' id='quantity' name='quantity' min='0' required style='border-style: solid;border-color: black'><br>               
                </div>
            </div>
            
            <div class='row' style='margin-bottom: 50px;'>
                <div class='col-33'>
                    <input name='cancel' type='submit' value='Cancel' style=color:white;>
                </div>
                <div class='col-33'>
                    <input name='publish' type='submit' value='Publish' style=color:white;>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
    if(isset($_POST['cancel'])){
        echo "<script>setTimeout(alert(\"No Changes Made!\"), 1000)</script>";
        echo "<script> location.href='https://limchiachung.azurewebsites.net/all-products/'; </script>";
    }

    if(isset($_POST['publish']) && !empty($_POST['publish'])){
        session_start();
        global $wpdb;
        $date = date("Y-m-d");

        $add = $wpdb->insert("product", array("productName" => $_POST['productName'],
                                              "productDescription" => $_POST['productDescription'],
                                              "entryDate" => $date,
                                              "productQty" => $_POST['quantity'],  
                                              "productPrice" => $_POST['productPrice'],
                                              "productImage" => $_POST['productImage']));

        if($add){
            echo "<script>setTimeout(alert(\"New product has been successfully published!\"), 1000)</script>";
            echo "<script> location.href='https://limchiachung.azurewebsites.net/products-staff-view/'; </script>";
        }
        else{
            echo "<script>alert(\"Failed To Publish Product!\")</script>";		 
        } 
    }
?>