<?php
//includes all connection parameters
require_once('config.inc.php');
/*
  This function returns a connection object to a database.
  passes in all the connection parameters from config.in.php
*/

function setConnectionInfo( $connString=DBCONNSTRING, $user=DBUSER, $password=DBPASS) {
    try{
    $pdo = new PDO($connString,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    }catch (PDOException $e) {
        
    //this will display an error message if one of the parameters for the database is wrong.
    die( $e->getMessage() );
    
    }
}


/*
  This function runs the specified SQL query using the 
  passed SQL query and the passed array of parameters (null if none)
*/
function runQuery($sql, $parameters=array()){
    
    //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    // Ensure parameters are in an array
    if (!is_array($parameters)) {
        $parameters = array($parameters);
    }

    $statement = null;
    if (count($parameters) > 0) {
        // Use a prepared statement if parameters 
        $statement = $connection->prepare($sql);
        $statement->execute($parameters);
        
        if (! $statement) {
            throw new PDOException;
        }
    }else {
        // Execute a normal query     
        $statement = $connection->query($sql);
        if (! $statement) {
            throw new PDOException;
        }
    }
    return $statement;
}  
/*
  This function returns a connection object to a database

function setConnectionInfo( $connString, $user, $password ) {
    $pdo = new PDO($connString,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;      
}


  This function runs the specified SQL query using the 
  passed connection and the passed array of parameters (null if none)

function runQuery($connection, $sql, $parameters=array())     {
    // Ensure parameters are in an array
    if (!is_array($parameters)) {
        $parameters = array($parameters);
    }

    $statement = null;
    if (count($parameters) > 0) {
        // Use a prepared statement if parameters 
        $statement = $connection->prepare($sql);
        $executedOk = $statement->execute($parameters);
        if (! $executedOk) {
            throw new PDOException;
        }
    } else {
        // Execute a normal query     
        $statement = $connection->query($sql); 
        if (!$statement) {
            throw new PDOException;
        }
    }
    return $statement;
} */  

?>