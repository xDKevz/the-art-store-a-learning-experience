<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artist API</title>
</head>
<body>
   <?php
require_once('database.php');
     // declares an empty array
     $json_array = array();
     
     
         // checks if the method is get        
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
         // if supplied with ID
         if (isset($_GET['id']) && $_GET['id'] > 0){
             $sql = 'SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists WHERE ArtistID=:id';
             
             $id=$_GET['id'];
             $statement = $pdo->prepare($sql);
             $statement->bindValue(':id', $id);
             $statement->execute();
            
    
        // if no id is supplied
         }else{
    
            $sql = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists";
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
    }
?>
</body>
</html>


