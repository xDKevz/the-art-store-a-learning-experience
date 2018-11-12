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
     
     // if supplied with ID
     if (isset($_GET['id']) && $_GET['id'] > 0){
         $sql = 'select ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink from Artists where ArtistID=' .
         $_GET['id'];
         $result = $pdo->query($sql);
        
        while ($row =$result->fetch()){
            // stores the data into the array
            $json_array [] =$row;
        }
    // if no id is supplied
     }else{

        $sql = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink from Artists";
        $result = $pdo->query($sql);
        
    
        while ($row =$result->fetch()){
            // stores the data into the array  
            $json_array [] =$row;
        }
    }
    // converts the array to json then echos it
    echo json_encode($json_array);
    // clears the pdo
    $pdo =null;
    
?>
</body>
</html>


