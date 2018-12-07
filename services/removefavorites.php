<?php
    session_start();
    //Checks if the id exists
    if (isset($_GET['id'])) {
        //Checks if the session favorites exists
        //Checks if the session favorites exists
        if (isset($_SESSION['favorites'])) {
            $favorites = $_SESSION['favorites'];
            // foreach($favorites as $f) {
            //     echo $f . " ";
            // }
            // echo "starting";
        } 
        
        // foreach($favorites as $f) {
        //     echo $f . " ";
        // }
        // remove item from favourites
        $removeitem = $_GET['id'];
        $index = array_search($removeitem, $favorites);
        array_splice($favorites, $index, 1);
        // //if match equals false, that means its not in the favorites list of the user
        // //so it is added to the user's favorites array
        
        // foreach($favorites as $f) {
        //     echo $f . " ";
        // }
        $_SESSION['favorites'] = $favorites;
    }

    //redirects to the php page that called this addtofavorites php script
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>