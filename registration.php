<?php
    // starts the session
	session_start();
	// checks if the user is already logged in
	// this session was passed from parseLogin.php
	if(isset($_SESSION['email'])) {
	    // if the user is still logged in, must log out before being able to register again
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <?php
            $title = "Art Store - Register";
            include "include/head.php";
        ?>
    </head>
    <link rel="stylesheet" href="css/registration.css" type="text/css" />
    <header><?php include "include/navigation.php"; ?></header>
<body>
    <div class="background-image"></div>
    <div class="registration-container"> 
        <h2>Create Your Account</h2>
        <form class="reg-form" method="post" action="parseRegister.php">
            <div class="form-info">
                <label class="reg-label">First Name</label>
                <input class="reg-input" type="text" placeholder="John" name="firstName" id="fname"><br>
                <p class="error" id="errfname"></p>
                <label class="reg-label">Last Name</label>
                <input class="reg-input" type="text" placeholder="Doe" name="lastName" id="lname"><br>
                <label class="reg-label">Choose Location</label>
                <select name="country" class="countries order-alpha" id="countryId">
                <option value="">Select Country</option>
                </select>
                <select name="state" class="states order-alpha" id="stateId">
                    <option value="">Select State</option>
                </select>
                <select name="city" class="cities order-alpha" id="cityId">
                    <option value="">Select City</option>
                </select>
                <p class="error" id="errlname"></p>
                <label class="reg-label">Email</label>
                <input class="reg-input" type="text" placeholder="email@email.com" name="email" id="email"><br>
                <p class="error" id="erremail"></p>
                <label class="reg-label">Password</label>
                <input class="reg-input" type="password" placeholder="Password" name="password" id="password"><br>
                <p class="error" id="errpassword"></p>
                <label class="reg-label">Confirm Password</label>
                <input class="reg-input" type="password" placeholder="Confirm Password" name="passwordAgain" id="passwordAgain"><br>
                <p class="error" id="errpasswordAgain"></p>
            </div>
            
            <!--DISPLAY EMAIL ERROR MESSAGE WHEN PROVIDED WITH EXISTING EMAIL -->
            <?php 
                // checks if the session is available for "invalid"
                if (isset($_SESSION["invalid"])) 
                {
                    // displays the error message from parseRegister.php
                    $message=$_SESSION['invalid'];
                    
                    /*<p style?? >error message <p>*/
            
                    echo "<p class='error'>'$message'</p>";
                    // unsets/removes the invalid session
                    unset($_SESSION["invalid"]);
                }
            ?>
            
            <div class="reg-submit">
                <input type="submit" name="submit" value="Create Account" onclick="return validate(this.form)">
            </div>
            
        </form>
        
    </div>   

</body>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<!-- Script for generating the country, province, and city -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</html>

