<?php
//includes all connection parameters
require_once('config.inc.php');
/*
  This function returns a connection object to a database.
  passes in all the connection parameters from config.in.php
*/

function setConnectionInfo( $connString=DBCONNSTRING, $user=DBUSER, $password=DBPASS) {
    try {
    $pdo = new PDO($connString,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    } catch (PDOException $e) {
        
        //this will display an error message if one of the parameters for the database is wrong.
        die( $e->getMessage() );
    
    }
}


/*
  This function runs the specified SQL query using the 
  passed SQL query and the passed array of parameters (null if none)
*/
function runQuery($connection, $sql, $parameters=array()){
    
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

//returns json array
function jsonArray($statement){
    // declares an empty array
     $json_array = array();
    
     while ($row =$statement->fetch(PDO::FETCH_ASSOC)){
            // stores the data into the array
            
            $json_array [] = $row;
        }
        // converts the array to json then echos it
    return $json_array;
} 

// retrieveds data without encoding them to json
// useful in single-? page
function retrievedData($sql, $parameter) {
    $connection = setConnectionInfo();
    $result = runQuery($connection, $sql, $parameter);
    $row = $result->fetch();
    $connection = null;
    
    return $row;
}

?>