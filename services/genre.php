<?php
header('Content-Type:application/json');
//this will allow access to the function call runQuery()
require_once('database-functions.inc.php');

     //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    
     // if supplied with ID
     if (isset($_GET['id']) && $_GET['id'] > 0){
         $sql = 'SELECT GenreID, GenreName, EraID, Description, Link from Genres WHERE GenreID=?';
         
         $parameter=array($_GET['id']);
         $statement = runQuery($connection, $sql, $parameter);
         #$result = $pdo->query($sql);
        
        
    // if no id is supplied
     }else{

        $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";
        $statement = runQuery($connection,$sql, null);

    }
    //prints json array from function
    echo json_encode(jsonArray($statement));
    $connection=null;

?>
