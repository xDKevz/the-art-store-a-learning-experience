<!-- not done yet implenting session, still testing -->

<?php
    // starts the session
	session_start();
	// checks if the user is already logged in
	// this session was passed from parseLogin.php
	if(isset($_SESSION['email']))
	{
	    // if the user is still logged in, must log out before being able to register again
		header("Location: login.php");
		// creates the session for the message
		$_SESSION["message"]="Please Logout before trying to register for a new account";
	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/registration.css">
    <title> Registration Page </title>
</head>

<!--This should be placed in style files later -->

<style type="text/css">

.error{
			padding:0px;
			color:red;
			font-size:0.8em;
		}
    
</style>


<body>

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

    <div class="registration-container"> 
        <h2> Register - New Account </h2><br>
        
        <form class="reg-form" method="post" action="parseRegister.php">
            <div class="form-info">
                <label class="reg-label"> First Name : </label>
                <input class="reg-input" type="text" placeholder="John" name="firstName" id="fname"><br>
                <p class="error" id="errfname"></p>
            </div>
            
            <div class="form-info">
                <label class="reg-label"> Last Name : </label>
                <input class="reg-input" type="text" placeholder="Doe" name="lastName" id="lname"><br>
                <p class="error" id="errlname"></p>
            </div>
            
            
            <div class="form-info">
                <label class="reg-label"> City : </label>
                <input class="reg-input" type="text" placeholder="Calgary" name="city" id="city"><br>
                <p class="error" id="errcity"></p>
            </div>
            
            <div class="form-info">
                <label class="reg-label"> Country : </label>
                <input class="reg-input" type="text" placeholder="Canada" name="country" id="country"><br>
                <p class="error" id="errcountry"></p>
            </div>
            
            
            <div class="form-info">
                <label class="reg-label"> Email : </label>
                <input class="reg-input" type="text" placeholder="email@email.com" name="email" id="email"><br>
                <p class="error" id="erremail"></p>
            </div>
            
            <div class="form-info">
                <label class="reg-label"> Password : </label>
                <input class="reg-input" type="password" placeholder="Password" name="password" id="password"><br>
                <p class="error" id="errpassword"></p>
            </div>
            
            <div class="form-info">
                <label class="reg-label"> Confirm Password : </label>
                <input class="reg-input" type="password" placeholder="Confirm Password" name="passwordAgain" id="passwordAgain"><br>
                <p class="error" id="errpasswordAgain"></p>
            </div>
            
            <div class="reg-submit">
                <input type="submit" name="submit" value="Create Account" onclick="return validate(this.form)">
            </div>
            
        </form>
    </div>   

</body>
<script type="text/javascript" src="js/validate.js"></script>
</html>

