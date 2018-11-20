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
     
     //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
     
    // checks if the method is get        
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
         // if supplied with ID
         if (isset($_GET['id']) && $_GET['id'] > 0){
             $sql = 'SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite FROM Galleries WHERE GalleryID=?';
             
             $parameter=array($_GET['id']);
             $statement = runQuery($connection,$sql, $parameter);
             
        // if no id is supplied
         }else{
    
            $sql = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebsite FROM Galleries";
            $statement = runQuery($connection,$sql, null);
        }
        
        //prints json array from function
        echo json_encode(jsonArray($statement));
        $connection=null;
    }
    
?>
</body>
</html>
