<h3>Change Password</h3><br>
<h4>For your account's security, do not share your password with anyone else.</h4><br>
<div>
    <?php
        session_start();
        global $wpdb;
        $customerID = $_SESSION["custID"];
        $results = $wpdb->get_results("SELECT custPassword FROM customer WHERE custID = $customerID");

        if(isset($_POST['Modify'])){
            foreach ($results as $row){
                if ($_POST["newPassword"] == $row->custPassword){
                    echo "<script>setTimeout(alert(\"New Password Cannot Same With Old Password!\"), 6000)</script>"; 
                }
                elseif ($_POST["newPassword"] != $_POST["confirmPassword"]){
                    echo "<script>setTimeout(alert(\"New Password Must Same With Confirm Password!\"), 6000)</script>"; 
                }
                elseif ($_POST["currentPassword"] != $row->custPassword){
                    echo "<script>setTimeout(alert(\"Wrong Current Password Cant Perform Change Password!\"), 6000)</script>"; 
                }
                else {
                    $confirmPassword1 = $_POST["confirmPassword"];

                    $set2 = array("custPassword" => $confirmPassword1);
                    $where2 = array("custID" => $customerID);
                    $edit = $wpdb->update("customer", $set2, $where2);

                    if($edit){
                            echo "<script>setTimeout(alert(\"Successfully Update Password!\"), 6000);location.href = 'https://limchiachung.azurewebsites.net/change-password/';</script>"; 
                    }
                    else
                        echo "Failed to Update";
                }
            }
            
        }
        
        
        foreach ($results as $row){

                echo "
                <form method='POST'>
                <label for='currentPassword'>Current Password</label>
                <input type='text' id='currentPassword' name='currentPassword'required><br>
                    
                <label for='newPassword'>New Password</label>
                <input type='text' id='newPassword' name='newPassword' placeholder='New Password' required><br>
                    
                <label for='confirmPassword'>Confirm Password</label>
                <input type='text' id='confirmPassword' name='confirmPassword' placeholder='Confirm Password' required><br>
    
                <input name='Modify' type='submit' value='Modify' style='color:white;'><br><br>
                
                </form>
                ";

        }

    ?>


</div>