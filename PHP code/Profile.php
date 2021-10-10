<h3>My Profile</h3><br>
<h4>Manage and protect your account.</h4><br>
<div>
    <?php
        session_start();
        global $wpdb;
        $customerID = $_SESSION["custID"];
        $results = $wpdb->get_results("SELECT custID, custName, phoneNo, email FROM customer WHERE custID = $customerID");

        if(isset($_POST['Modify'])){

            $name1 = $_POST["username"];
            $phoneNo1 = $_POST["phoneNo"];
            $email1 = $_POST["email"];

            $set2 = array("custName" => $name1,
            "phoneNo" => $phoneNo1,
            "email" => $email1);
            $where2 = array("custID" => $customerID);
            $edit = $wpdb->update("customer", $set2, $where2);

	    if($edit){
                echo "<script>setTimeout(alert(\"Successfully Modified!\"), 6000);location.href = 'https://limchiachung.azurewebsites.net/profile/';</script>"; 
	    }
        else
            echo "Failed to Update";
        }

        foreach ($results as $row){
            echo "
                <form method='POST'>
                <label for='username'>Username</label>
                <input type='text' id='username' name='username' value = '$row->custName' placeholder='$row->custName' required><br>
                    
                <label for='phoneNo'>Phone Number</label>
                <input type='text' id='phoneNo' name='phoneNo' value=$row->phoneNo placeholder=$row->phoneNo required><br>
                    
                <label for='email'>Email</label>
                <input type='text' id='email' name='email' value=$row->email placeholder=$row->email required><br>
    
                <input name='Modify' type='submit' value='Modify' style='color:white;'>
                </form>
            ";
            }

    ?>


</div>