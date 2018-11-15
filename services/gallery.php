<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery API</title>
</head>
<body>
 <?php
require_once('database.php');
     // declares an empty array
     $json_array = array();
     
     // if supplied with ID
     if (isset($_GET['id']) && $_GET['id'] > 0){
         $sql = 'SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite FROM Galleries WHERE GalleryID=:id';
         
         $id=$_GET['id'];
         $statement = $pdo->prepare($sql);
         $statement->bindValue(':id', $id);
         $statement->execute();
         
        while ($row =$statement->fetch()){
            // stores the data into the array
            $json_array [] =$row;
        }
    // if no id is supplied
     }else{

        $sql = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite from Galleries";
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
