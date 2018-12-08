<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Art Store - Sign In";
            include "include/head.php";
        ?>
    </head>
    <link rel="stylesheet" href="css/login.css" type="text/css" />
    <header><?php include "include/navigation.php"; ?></header>
<body>
    <div class="background-image"></div>
 <div class="login-container">
    <div class="login-brand">
        <img class="login-logo" src="/images/logo/art_store_icon.png" alt="art_store_logo" width="80" height="80">
        <h2>Sign in to Art Store</h2>
    </div>
    <div class="login-details">
    <?php
    // starts the session
    session_start();
    // if logged in, the if statement executes
    if (isset($_SESSION["email"])) {
        echo '<br><div class="row" style="padding-bottom: 10px"><div class="col-lg-12" ><div class="text-center">You are logged in as : ';
        // displays the logged in email
    	print($_SESSION["email"] . "</div></div>");
    } else {
        // if not logged in, displays the log in page
        echo '<form method="post" action="parseLogin.php">
              <input class="text" type="text" name="email" placeholder="your@email.com"><br>
              <span>Email Address</span>
              <br>
              <input class="text" type="password" name="password" placeholder="password"><br>
              <span>Password</span>
              <br>
              <input class="button" type="submit" name="submit" value="Log in">
              </form>
              
              <p class= errorLogin>
                <?php
                    //from parseLogin
                    if(isset($_SESSION["errormessage"])) {
                    	print($_SESSION["errormessage"]);
                        // destroys the session to avoid errors showing up non stop.
                    	unset($_SESSION["errormessage"]);
                    }
                ?>
            <p>
              
              <div class="login-signup">
              <p>Need an account? <a class="link" href="registration.php">Create a new one.</a>
              </div>';
    } ?>
        <?php
        // data from parseRegister.php
        // checks if the user registered successfully
        if(isset($_SESSION["registersuccess"])) {
        	$message=$_SESSION["registersuccess"];
        	// sample alert for successful registration
        	echo "<script type='text/javascript'>alert('$message');</script>";
        	// destroys the session
        	unset($_SESSION["registersuccess"]);
        } ?>
    <!--this is used if there are any message errors
    
    <p style?? >error message <p>
    -->
    </div>
 </div>
</body>
</html>


