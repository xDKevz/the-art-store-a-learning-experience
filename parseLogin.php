<!-- Not done yet -->
<?php

// starts the session
session_start();
//this will allow access to the function call runQuery()
require_once('services/database-functions.inc.php');



if (isset($_POST['submit'])) 
{
    // stores the email and password to check later for validation
    $email = $_POST['email'];
	$pwd = $_POST['password'];
	
    
    // if empty displays the error message
    if (empty($email) || empty($pwd)) 
	{
		header("Location: login.php?login=empty");
		$_SESSION["errormessage"] = "The Email or Password field is empty.";
		exit();
	}else 
    {   
        //calls the function above for database connection using pdo
        $connection=setConnectionInfo();
        
        $sql = "SELECT Salt FROM CustomerLogon WHERE UserName=?";
        $statement = runQuery($connection, $sql,array($email));
        $data = $statement->fetch();
        $salt = $data["Salt"];
        // $salt= $statement->fetchColumn();
        //$statement->rowCount()
        if($data)
        {
        
            $saltSql = "SELECT cl.CustomerID, c.FirstName FROM CustomerLogon as cl JOIN Customers as c ON cl.CustomerID = c.CustomerID WHERE UserName=? AND Pass=?";
            $params=array($email,md5($pwd.$salt)); 
            //execute the query 
            $smt = runQuery($connection, $saltSql, $params);
            $customerdata = $smt->fetch();
            
            if($customerdata) {
                
                    // creates sessions when logged in successfully
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $customerdata["FirstName"];
                    //$_SESSION['loginsuccess'] = "Login Successful!!";
                    $_SESSION['loginstatus'] = "login";
                    header("Location: home.php");
                    exit();
            }
            else
            {
                
                header("Location: login.php?login=error");
                // creates a session when an invalid email was entered.
                // for security, "email or password was displayed"
                $_SESSION["errormessage"] = "You have entered an invalid email or password.";
                exit();
            } 
        }else
        {
            
            header("Location: login.php?login=notregistered");
            // creates a session when a user tries to log in without having an account
            $_SESSION["errormessage"] = "You have not registered an account yet.";
            exit();
        }
        //clears pdo
        $connection=null;
	}
}else{
    // creates a session when a user tries to log go directly to parseLogin.php
    header("Location: ../login.php?login=error");
	exit();
}

?>























