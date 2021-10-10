<h3>Create your SyasyaDesign Account.</h3><br>
<div>
    <?php
        if(isset($_POST['register'])){
            session_start();
            global $wpdb;
            $wpdb->insert("customer", array("custName" => $_POST['username'], 
                                            "phoneNo" => $_POST['phoneNo'],
                                            "email" => $_POST['email'],
                                            "address" => $_POST['address'],
                                            "custPassword" => $_POST['password']));

            echo "<table>";
            echo "<tr><td>" . $_POST['username'] . "</td><td>" . $_POST['phoneNo'] . "</td><td>" . $_POST['email']. "</td><td>" . $_POST['address'] . "</td><td>" . $_POST['password'] . "</td></tr>";
            echo "</table>";

            $counter = 1;
            $results = $wpdb->get_results("SELECT custID FROM customer");
            foreach($results as $row){
                if(count($results) == $counter++){
                    $code = $row->custID;
                    $_SESSION["custID"] = $row->custID;
                    echo "<p style='color:red;text-align:center;'><b>Successfully Registered. Redirecting to homepage.</b></p>";
                    header("Location: https://limchiachung.azurewebsites.net/homepage/?id=$code");
                }
            }
        }
    ?>

    <form method='POST'>
        <label for='username'>Username</label>
        <input type='text' id='username' name='username' placeholder='Your name' required><br>
            
        <label for="phoneNo">Phone Number</label>
        <input type="text" id="phoneNo" name='phoneNo' placeholder='012-3456789' required><br>
            
        <label for='email'>Email</label>
        <input type='text' id='email' name='email' placeholder='abc123@gmail.com' required><br>

        <label for='address'>Address</label>
        <input type='text' id='address' name='address' placeholder='Address' required><br>

        <label for='password'>Password</label>
        <input type='password' id='password' name='password' placeholder='Password' required><br>

        <input name='register' type='submit' value='Register' style="color:white;">
    </form>
</div>
