<?php
    session_start();
    //Checks if the id exists
    if (isset($_GET['id'])) {
        //Checks if the session favorites exists
        if (isset($_SESSION['favorites'])) {
            $favorites = $_SESSION['favorites'];
        }
        
        // add item to favourites
        $removeitem = $_GET['id'];
        $favorites = array_diff($favorites, $removeitem);
        
        $match = false;
        
        //Loop below checks for duplicates
        $i = 0;
        //indexof favorite to remove
        $indexOf = 0;
        while ( $i <= count($favorites) && $match != true) {
            if ($favorites[$i] == $item) {
                $match = true;
            }
            $i++;
        }
        
        //if match equals false, that means its not in the favorites list of the user
        //so it is added to the user's favorites array
        if ($match == true) { $favorites[] = $item; }
        $_SESSION['favorites'] = $favorites;
    }
?>