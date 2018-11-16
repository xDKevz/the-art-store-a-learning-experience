<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Painting API</title>
</head>
<body>
<?php
// includes the database connection
require_once('database.php');
    
    // SQL Query for selecting all 
    
    $json_array = array();
    
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // if there is a parameter for painting/id
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE PaintingID=' .
            $_GET['id'];
            $result = $pdo->query($sql);
        }
        // if there is a parameter for artist
        else if (isset($_GET['artist']) && $_GET['artist'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE ArtistID=' .
            $_GET['artist'];
            $result = $pdo->query($sql);

        // if there is a parameter for gallery
        }else if (isset($_GET['gallery']) && $_GET['gallery'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE GalleryID=' .
            $_GET['gallery'];
            $result = $pdo->query($sql);

        // if a genre parameter is supplied
        }else if (isset($_GET['genre']) && $_GET['genre'] > 0) {
            
            // p - holds the values for the paintings
            // g -holds the vlaues for paintings genres
            $sql = 'SELECT p.PaintingID, g.GenreID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings p LEFT JOIN PaintingGenres g on p.PaintingID=g.PaintingID WHERE genreID=' .
            $_GET['genre'];
            $result = $pdo->query($sql);


        }
        else{
        
        //selects everything if no parameter is given
        $sql = "SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                Medium, Cost, MSRP, GoogleLink FROM Paintings";
        $result = $pdo->query($sql);
      
        }
        
        while ($row =$result->fetchObject()){

            $json_array [] =$row;
        
        }
        
        echo json_encode($json_array);
        $pdo =null;
    }
    
?>
</body>
</html>