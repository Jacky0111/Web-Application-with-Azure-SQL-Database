<div>
    <form method='POST'>
          <label style='padding-left:10px;font-size:18px'><input type='radio' name='reason' id='Modify existing order' value='Modify existing order' style='margin-right:10px;size:18px' required>Modify existing order</label><br></br>
          <label style='padding-left:10px;font-size:18px'><input type='radio' name='reason' id='Seller failed to ship on time' value='Seller failed to ship on time' style='margin-right:10px;size:18px'>Seller failed to ship on time</label><br></br>
          <label style='padding-left:10px;font-size:18px'><input type='radio' name='reason' id='Change of mind' value='Change of mind' style='margin-right:10px;size:18px'>Change of mind</label><br></br>
          <label style='padding-left:10px;font-size:18px'><input type='radio' name='reason' id='Need to change delivery address' value='Need to change delivery address' style='margin-right:10px;size:15px'>Need to change delivery address</label><br></br>
          <label style='padding-left:10px;font-size:18px'><input type='radio' name='reason' id='Others' value='Others' style='margin-right:10px;size:18px'>Others</label><br></br>
	  <input type='submit' name='Cancel' value='Cancel Order' style='color:white;font-size:20px;padding: 20px;background-color:#5FBED7;border: none;border-radius: 8px'><br></br>
    </form>

    <?php 
        if (isset($_POST['Cancel'])) {
            session_start();
            $customerID = $_SESSION["custID"];
            global $wpdb, $inputTransID;
            $inputTransID = $_GET["transID"];
            $date= date("Y-m-d");
            $wpdb->insert("ordercancellation", array("cancellationStatus" => "Pending", 
                                                    "requestDate" => $date,
                                                    "responseDate" => NULL,
                                                    "cancellationReason" => $_POST['reason'],
                                                    "custID" => $customerID,
                                                    "transID" => $inputTransID));                                          

            if(isset($_POST['reason'])){
                echo "<script>setTimeout(alert(\"Waiting for approval.\"), 3000)</script>";
                echo "<script> location.href='https://limchiachung.azurewebsites.net/to-ship/'; </script>";
            }
            else{
                echo "Nothing selected";
            }	
        }
    ?>
</div>