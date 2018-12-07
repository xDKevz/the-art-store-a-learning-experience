<?php
    session_start();
    //Checks if the id exists
    if (isset($_GET['id'])) {
        //Checks if the session favorites exists
        if (isset($_SESSION['favorites'])) {
            $favorites = $_SESSION['favorites'];
        }
        
        // remove item from favourites
        $removeitem = $_GET['id'];
        $favorites = array_diff($favorites, $removeitem);
        

        //if match equals false, that means its not in the favorites list of the user
        //so it is added to the user's favorites array
        $_SESSION['favorites'] = $favorites;
    }
?>