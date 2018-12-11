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
    <?php include "include/navigation.php"; ?>
<body>
    <div class="background-image"></div>
    <div class="registration-container"> 
    <div class="signup-logo">
        <img src="/images/logo/art_store_icon.png" alt="art_store_logo" width="80" height="80">
        <h2>Create Your Account</h2>
    </div>
        <form class="reg-form" method="post" action="parseRegister.php">
            <div class="form-info">
                <input class="reg-input" type="text" placeholder="first name" name="firstName" id="fname">
                <p class="error" id="errfname"></p>
                <input class="reg-input" type="text" placeholder="last name" name="lastName" id="lname">
                <p class="error" id="errlname"></p>
                <!--<select name="country" class="countries order-alpha" id="countryId">
                    <option value="">select country or region</option>
                </select>-->
                <input class="reg-input" type="text" placeholder="city" name="city" id="city">
                <p class="error" id="errcity"></p>
                <input class="reg-input" type="text" placeholder="country" name="country" id="country">
                <p class="error" id="errcountry"></p>
                <input class="reg-input" type="text" placeholder="your@email.com" name="email" id="email">
                <p class="error" id="erremail"></p>
                <input class="reg-input" type="password" placeholder="password" name="password" id="password">
                <p class="error" id="errpassword"></p>
                <input class="reg-input" type="password" placeholder="confirm password" name="passwordAgain" id="passwordAgain">
                <p class="error" id="errpasswordAgain"></p>
            </div>
            <!--DISPLAY EMAIL ERROR MESSAGE WHEN PROVIDED WITH EXISTING EMAIL
            PHP BACK UP ERROR CHECK, INCASE JS DOES NOT WORK-->
            <?php 
                // checks if the session is available for "invalid"
                if (isset($_SESSION["invalid"])) 
                {
                    // displays the error message from parseRegister.php
                    $message=$_SESSION['invalid'];
            
                    echo "<p class='error'>$message</p>";
                    // unsets/removes the invalid session
                    unset($_SESSION["invalid"]);
                }
            ?>
            <div class="reg-submit">
                <input type="submit" class="button" name="submit" value="Create Account" onclick="return validate(this.form)">
            </div>
        </form>
        <div class="login">
            <p>Already have an account? <a href="login.php">Sign in instead.</a></p>
        </div>
    </div>   

</body>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<!-- Script for generating the country, province, and city -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</html>

