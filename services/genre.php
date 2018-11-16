<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Genre API</title>
</head>
<body>
<?php
require_once('database.php');
     // declares an empty array
     $json_array = array();
     
     // if supplied with ID
     if (isset($_GET['id']) && $_GET['id'] > 0){
         $sql = 'SELECT GenreID, GenreName, EraID, Description, Link from Genres WHERE GenreID=:id';
         
         $id = $_GET['id'];
         $statement = $pdo->prepare($sql);
         $statement->bindValue(':id', $id);
         $statement->execute();
         #$result = $pdo->query($sql);
        
        
    // if no id is supplied
     }else{

        $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres";
        $statement = $pdo->query($sql);

    }
    while ($row =$statement->fetchObject()){
            // stores the data into the array
            $json_array [] =$row;
        }
    // converts the array to json then echos it
    echo json_encode($json_array);
    // clears the pdo
    $pdo =null;
    
?>
</body>
</html>
