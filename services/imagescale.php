<?php

$img = imagecreatefromjpeg($imgname);
// resize the image to 600 x 600
$newimg = imagescale($img,600,600);
// add some text to it
$fontFile = 'font/Lato-Heavy.ttf';
$fontSize = 16;
$textColor = imagecolorallocate($newimg,238,238,238);
imagettftext($newimg,$fontSize,0,250,160,$textColor,$fontFile,
 "Anyone else want a drink of this?");
// and return it
imagejpeg($newimg);

?>