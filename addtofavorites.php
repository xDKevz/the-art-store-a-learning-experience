<?php
    session_start();
    
    if (isset($_GET['id'])) {
        
        if (isset($_SESSION['favorites'])) {
            $favorites = $_SESSION['favorites'];
        } else {
            $favorites = array(); 
            // $_SESSION['favorites'] = $favorites
            echo "AddFavorites";
        }
        
        // add item to favourites
        $item = $_GET['id'];
        ech
        $match = false;
        $i = 0;
        // while ( i <= count($favorites) && $match != true) {
        //     if ($favorites[$i] == $item) {
        //         $match = true;
        //     }
        //     i++;
        // }
        
        // if ($match == false) {
        //     $favorites[] = $item;
        // }
        
        // $_SESSION['favorites'] = $favorites;
        
        // $favorites[] = $item;
        // $_SESSION['favorites'] = $favorites;
    }
    
    // print_r($_SESSION['favorites']);
    // header("Location: {$_SERVER['HTTP_REFERER']}");
?>