<h3>Logout Page</h3><br>

<div>
    <?php
        session_start();
        $customerID = $_SESSION["custID"];
        if (empty($customerID)){
            echo "You Are Not Login Yet.";
        }
        else{

            if(isset($_POST['Modify'])){
                
                unset($_SESSION["custID"]);

                echo "<script>setTimeout(alert(\"Successfully Logout!\"), 6000);location.href = 'https://limchiachung.azurewebsites.net/';</script>"; 
            }

            if(isset($_POST['Delete'])){

                $where2 = array("custID" => $customerID);
                $edit = $wpdb->Delete("customer", $where2);
        
                if($edit){
                        echo "<script>setTimeout(alert(\"Delete Account Successfully!\"), 6000);location.href = 'https://limchiachung.azurewebsites.net/';</script>"; 
                }
                else {
                    echo "Failed Delete";
                }
            }
                
            echo "
                <form method='POST'>
                <label for='logout'><h4>Are You Sure To Logout? If Yes Press Logout Button Again.</h4></label>
                <input name='Modify' type='submit' value='Logout' style='color:white;'>
                <label for='deleteAcc'><h5>Are You Sure To Delete This Account? If Yes Press Delete Account Button! #Reminder This Progress Is Irreversible!!!</h5></label>
                <input name='Delete' type='submit' value='Delete Account' style='color:white;'>

                </form>
            ";
        }
    ?>


</div>