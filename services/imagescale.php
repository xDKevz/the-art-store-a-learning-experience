<?php
header('Content-Type: image/jpeg');

// Query Strings
// size, width, type, genre, file
// size: square/full
// type: paintings/artist/genre
// width
// file: ImageFileName/ArtistID/GenreID

//DONT FORGET TO TAKE THESE QUERY STRINGS INTO ACCOUNT
// <img src="make-image.php?size=0&width=600&type=0&file=018050" alt="…" /> FOR GENRE IMAGES ONLY
// <img src="make-image.php?file=018050" alt="…" />

$size = $_GET['size'];
$width = $_GET['width'];
$type = $_GET['type'];
$file = $_GET['file'];

if (isset($_GET['size']) && isset($_GET['width']) && isset($_GET['type']) && isset($_GET['file']) ) {
    $path = "../images/" . $type . "/" . $size . "/" . $file . ".jpg";
} else if (isset($_GET['width']) && isset($_GET['file']) ) {
    $path = "../images/genres/" . $file . ".jpg";
}

$img = imagecreatefromjpeg($path);
$newimg = imagescale($img, $width, $width);
imagejpeg($newimg);

?>