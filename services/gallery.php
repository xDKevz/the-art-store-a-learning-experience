<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery API</title>
</head>
<body>
 <?php
 //this will allow access to the function call runQuery()
require_once('database-functions.inc.php');
     // declares an empty array
     $json_array = array();
     
    // checks if the method is get        
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
         // if supplied with ID
         if (isset($_GET['id']) && $_GET['id'] > 0){
             $sql = 'SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite FROM Galleries WHERE GalleryID=?';
             
             $parameter=array($_GET['id']);
             $statement = runQuery($sql, $parameter);
             
        // if no id is supplied
         }else{
    
            $sql = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite FROM Galleries";
            $statement = runQuery($sql, null);
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
