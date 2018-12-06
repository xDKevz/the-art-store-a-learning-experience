<?php
header('Content-Type:application/json');
//this will allow access to the function call runQuery()
require_once('database-functions.inc.php');

     //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    
    $sql = "";
    $parameter = array();
     // if supplied with ID
    if (isset($_GET['id']) && $_GET['id'] > 0) {
     $sql = 'SELECT GenreID, GenreName, EraID, Description, Link from Genres WHERE GenreID=?';
     $parameter[] = $_GET['id'];
    // if no id is supplied
    } else {
     $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";
     $parameter[] = null;
    }
    $statement = runQuery($connection, $sql, $parameter);
    
    //prints json array from function
    echo json_encode(jsonArray($statement));
    $connection=null;

?>
