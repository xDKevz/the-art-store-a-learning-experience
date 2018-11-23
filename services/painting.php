<?php
header('Content-Type:application/json');
// includes the database connection
require_once('database-functions.inc.php');

     //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // if there is a parameter for painting/id
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE PaintingID=?';
            $parameter=array($_GET['id']);
            $statement = runQuery($connection, $sql, $parameter);
        }
        // if there is a parameter for artist
        else if (isset($_GET['artist']) && $_GET['artist'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE ArtistID=?';
            $parameter=array($_GET['artist']);
            $statement = runQuery($connection, $sql, $parameter);

        // if there is a parameter for gallery
        }else if (isset($_GET['gallery']) && $_GET['gallery'] > 0) {
            $sql = 'SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings WHERE GalleryID=?';
            $parameter=array($_GET['gallery']);
            $statement = runQuery($connection, $sql, $parameter);

        // if a genre parameter is supplied
        }else if (isset($_GET['genre']) && $_GET['genre'] > 0) {
            
            // p - holds the values for the paintings
            // g -holds the vlaues for paintings genres
            $sql = 'SELECT p.PaintingID, g.GenreID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                    Medium, Cost, MSRP, GoogleLink FROM Paintings p LEFT JOIN PaintingGenres g on p.PaintingID=g.PaintingID WHERE genreID=?';
            $parameter=array($_GET['genre']);
            $statement = runQuery($connection, $sql, $parameter);


        }
        else{
        
        //selects everything if no parameter is given
        $sql = "SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, 
                Medium, Cost, MSRP, GoogleLink FROM Paintings";
        $statement = runQuery($connection, $sql, null);
      
        }
        
        //prints json array from function
        echo json_encode(jsonArray($statement));
        //clears pdo
        $connection=null;
    }
    
?>