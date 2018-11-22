<!-- Not done yet, might add some mroe functionality -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title> Login Page </title>
    </head>
    
    <!--This should be placed in style files later-->

    <style type="text/css">
    
    .errorLogin{
    			padding:15px;
    			color:red;
    			font-size:0.8em;
    			text-align: center;
    		}
        
    </style>

<body>    
 <div class="login-container">
     
    <div class="login-brand">
        <img class="login-logo" src="images/art_store_logo.png" alt="art_store_logo" height="" width="">
    </div>
    <div class="login-details">
      <h1>Log-in</h1><br>
      
<?php

// starts the session
session_start();
// if logged in, the if statement executes
if (isset($_SESSION["email"]))
{
    echo '<br><div class="row" style="padding-bottom: 10px"><div class="col-lg-12" ><div class="text-center">You are Logged in as : ';
    // displays the logged in email
	print($_SESSION["email"] . "</div></div>");
}

else
{      
 
 // if not logged in, displays the log in page
 
    echo '<form method="post" action="parseLogin.php">
            <input type="text" name="email" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit" class="btn-login" value="Login">
          </form>
       
          <div class="login-signup">
            <p> No Account? </p>
            <a class="link" href="registration.php">Sign up</a>
          </div>';
    
}

 ?>
      

<?php
    // data from parseRegister.php
    // checks if the user registered successfully
    if(isset($_SESSION["registersuccess"]))
    {
    	$message=$_SESSION["registersuccess"];
    	// sample alert for successful registration
    	echo "<script type='text/javascript'>alert('$message');</script>";
    	// destroys the session
    	unset($_SESSION["registersuccess"]);
    }
?>



<!--this is used if there are any message errors

<p style?? >error message <p>
-->
<p class= errorLogin>
<?php
    //from parseLogin
    if(isset($_SESSION["errormessage"]))
    {
    	print($_SESSION["errormessage"]);
        // destroys the session to avoid errors showing up non stop.
    	unset($_SESSION["errormessage"]);
    }
?>
<p>
     
 
      
      
    </div>
 </div>
</body>
</html>


