<?php
header('Content-Type: image/jpeg');

// Query Strings
// size, width, type, genre, file
// size: square/full
// type: paintings/artist/genre
// width
// file: ImageFileName/ArtistID/GenreID

if (isset($_GET['size']) && isset($_GET['width']) && isset($_GET['type']) && isset($_GET['file']) ) {
    $size = $_GET['size'];
    $width = $_GET['width'];
    $type = $_GET['type'];
    $file = $_GET['file'];
    
    $path = "../images/" . $type . "/" . $size . "/" . $file . ".jpg";
    $img = imagecreatefromjpeg($path);
    $newimg = imagescale($img, $width, $width);
    
    imagejpeg($newimg);
}


?>