<?php
header('Content-Type:application/json');
// includes the database connection
require_once('database-functions.inc.php');

     //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    $sql = "";
    $parameter = array();
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // if there is a parameter for painting/id
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "SELECT a.FirstName, a.LastName, p.PaintingID, p.ImageFileName, p.Title, p.MuseumLink, p.CopyrightText, 
                    p.Description, p.Excerpt, p.YearOfWork, p.Width, p.Height, p.Medium, p.GoogleLink, p.WikiLink, p.JsonAnnotations 
                    FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID
                    WHERE p.PaintingID = ?";
            $parameter[] = $_GET['id'];
        }
        // if there is a parameter for artist
        else if (isset($_GET['artist']) && $_GET['artist'] > 0) {
            $sql = "SELECT a.FirstName, a.LastName, p. ArtistID, p.PaintingID, p.ImageFileName, p.Title, p.MuseumLink, p.CopyrightText, 
                    p.Description, p.Excerpt, p.YearOfWork, p.Width, p.Height, p.Medium, p.GoogleLink, p.WikiLink
                    FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID
                    WHERE p.ArtistID = ?";
            
            $parameter[] = $_GET['artist'];
        }    
        // if there is a parameter for gallery
        else if (isset($_GET['gallery']) && $_GET['gallery'] > 0) {
            $sql = "SELECT a.FirstName, a.LastName, p.PaintingID, p.GalleryID, p.ImageFileName, p.Title, p.MuseumLink, p.CopyrightText, p.Description, p.Excerpt, p.YearOfWork, p.Width, p.Height, p.Medium, p.GoogleLink, p.WikiLink
                    FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID
                    WHERE p.GalleryID = ?";
            $parameter[] = $_GET['gallery'];
        }
        // if a genre parameter is supplied
        else if (isset($_GET['genre']) && $_GET['genre'] > 0) {
            
            $sql = "SELECT a.FirstName, a.LastName, g.GenreID, p.PaintingID, p.ImageFileName, p.Title, p.MuseumLink, p.CopyrightText, 
                    p.Description, p.Excerpt, p.YearOfWork, p.Width, p.Height, p.Medium, p.GoogleLink, p.WikiLink 
                    FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID LEFT JOIN PaintingGenres as g on p.PaintingID = g.PaintingID
                    WHERE g.GenreID = ?";
            $parameter[] = $_GET['genre'];
        } else {
        //selects everything if no parameter is given
        $sql = "SELECT PaintingID, ImageFileName, Title, MuseumLink, CopyrightText, 
                Description, Excerpt, YearOfWork, Width, Height, Medium, GoogleLink, WikiLink 
                FROM Paintings";
        $parameter[] = null;
        }
        // runquery
        $statement = runQuery($connection, $sql, $parameter);
        
        //prints json array from function
        echo json_encode(jsonArray($statement));
        
        //clears pdo
        $connection=null;
    }

?>

