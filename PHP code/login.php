<h3>Welcome to SyasyaDesign! Please login.</h3><br>
<div>
    <?php
        global $wpdb;
        $custData = $wpdb->get_results("SELECT custID, email, custPassword 
                                         FROM customer");

        $staffData = $wpdb->get_results("SELECT staffID, email, staffPassword 
                                          FROM staff");

        $counter1 = 1;
        $counter2 = 1;
        if(isset($_POST['login'])){
            session_start();
            foreach($custData as $row1){
                $code = $row1->custID;
                if($row1->email == $_POST['email'] and $row1->custPassword == $_POST['password']){
                    $_SESSION["custID"] = $row1->custID;
                    header("Location: https://limchiachung.azurewebsites.net/homepage/?custid=$code");
                }
                if(count($custData) == ++$counter1){
                    echo "<p style='color:red;text-align:center;'><b>Invalid Login. Please enter again!!!</b></p>";
                }
            }

            foreach($staffData as $row2){
                $code = $row2->staffID;
                if($row2->email == $_POST['email'] and $row2->staffPassword == $_POST['password']){
                    $_SESSION["staffID"] = $row2->staffID;
                    header("Location: https://limchiachung.azurewebsites.net/order-staff-view/?staffID=$code");
                }
                if(count($staffData) == ++$counter2){
                    echo "<p style='color:red;text-align:center;'><b>Invalid Login. Please enter again!!!</b></p>";
                }
            }
        }
    ?>
    <form method='POST'>          
        <label for='email'>Email</label>
        <input type='text' id='email' name='email' placeholder='abc123@gmail.com' required><br>
        
        <label for='password'>Password</label>
        <input type='password' id='password' name='password' placeholder='Password' required><br>
        
        <input name='login' type='submit' value='Log In' style='color:white;'>
    </form>
    
</div>