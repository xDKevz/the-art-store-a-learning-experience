<!-- 
parseRegister.php - provides database functionality for registration.php 

Not done yet. might still need to add more validation 

--> 

<?php
session_start();
//this will allow access to the function call runQuery()
require_once('services/database-functions.inc.php');

if (isset($_POST['submit']))
{

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $passwordAgain = $_POST['passwordAgain'];

    if (empty($firstName) || empty($lastName) || empty($city) || empty($country) || empty($email)|| empty($password)|| empty($passwordAgain))
    {
        
        // error message for any empty fields
        header("Location: registration.php?registration=empty");
        $_SESSION["invalid"] = "Please fill out empty field(s)";
        exit();
    }
    else
    { 		///^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/i
        // regular expression for proper email format
        if (!preg_match("/^(\w+\.){0,2}\w+@([-a-z]+\.){1,2}[a-z]{2,6}$/i", $email)) 
        {
            
            //error message for invalid email
            header("Location: registration.php?registration=invalid");
            $_SESSION["invalid"] = "Invalid Email";
            exit();
        }
        else
        {

            if($password!=$passwordAgain)
            {
                // error message for password not match
                header("Location: registration.php?registration=password");
                $_SESSION["invalid"] = "Password must match";
                exit();
            }
            else
            {
                // check if the email being registered is alrady in the database
                $sql = "SELECT * FROM Customers WHERE Email=?";
                $statement = runQuery($sql,array($email));
                // returns 0 if the email is not in the database
                if($statement->rowCount()==0)
                {
                    //stores generated random salt to $salt
                    $salt=randSalt();

                    //hashes the password using md5 with generated salt
                    $hashedPassword=md5($password.$salt);

                    //stored the current date to $joinDate
                    $joinDate=date("Y-m-d",time());
                    
                    // inserts customers log in info into the customers table
                    $sqlInsert = "INSERT INTO Customers (FirstName, LastName, Address, City, Email ) VALUES (?, ?, ?, ?, ?)";
                    
                    // inserts customers log in info into the customerLogon table
                    $sqlInsertLogin = "INSERT INTO CustomerLogon (UserName, Pass, Salt, DateJoined) VALUES (?, ?, ?, ?)";
                    
                    $parameters1=array($firstName,$lastName,$city,$country,$email);
                    $parameters2=array($email,$hashedPassword,$salt,$joinDate);    
                    /*$smt1=$pdo->prepare($sqlInsert);
                    $smt1 ->bindValue(1,$firstName);
                    $smt1 ->bindValue(2,$lastName);
                    $smt1 ->bindValue(3,$city);
                    $smt1 ->bindValue(4,$country);
                    $smt1 ->bindValue(5,$email);

                    

                    $smt2=$pdo->prepare($sqlInsertLogin);
                    $smt2 ->bindValue(1,$email);
                    $smt2 ->bindValue(2,$hashedPassword);
                    $smt2 ->bindValue(3,$salt);
                    $smt2 ->bindValue(4,$joinDate);*/
                    
                    $smt1 = runQuery($sqlInsert, $parameters1);
                    $smt2 = runQuery($sqlInsertLogin, $parameters2);



                     
                    if($smt1->rowCount() && $smt2->rowCount())
                    {
                        header("Location: login.php");
                        // creates a session if the registration is successful and redirects to the login page
                        $_SESSION["registersuccess"] = "Registration Successful";
                        exit();
                    }
                    else
                    {
                        // creates a session if there is a problem in the database
                        header("Location: registration.php?registration=failed");
                        $_SESSION["invalid"] = "Registration Failed";
                    }
                }
                else
                {
                    // creates a session and displays a message if the email is already in the database
                    header("Location: registration.php?email=error");
                    $_SESSION["invalid"] = "Email exist";
                    exit();
                }
            }
        }
    }
}
else
{
    // displays an error message if someone tries to access parseRegister.php directly without filling out the form
    header("Location: registration.php");
    $_SESSION['invalid']="You must fill out the form first";
    exit();
}


//https://stackoverflow.com/questions/4356289/php-random-string-generator

//function that generates random 32 characters
function randSalt($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        //Concatinates generated random character
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>