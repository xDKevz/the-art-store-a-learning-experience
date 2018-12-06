<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "Single Gallery";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/single-page.css" type="text/css" />
    </head>
    
    <?php // START PHP
            if ( isset($_GET['id']) ) {
                // RETRIEVED ARTIST DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries WHERE GalleryID=?";
                $parameter = array($_GET['id']);
                $row = retrievedData($sql, $parameter);
                extract($row);
                // END RETRIEVED
                
                if (!empty($row)) {
                // START CONTENT
                    ?>
                    <header>
                        <?php include "include/navigation.php"; ?>
                    </header>
                    
                    <main class="container type">
                        <span id="type" class="gallery"></span>
                        <div id="<?=$GalleryID?>" class="information">
                            <h1 class="header">Gallery Information</h1>
                            <div class="specifics">
                                <h1 id="galleryNative">"<?php echo $GalleryNativeName; ?>"</h1>
                                <h2 id="galleryName" class="<?=$GalleryID?>"><?php echo $GalleryName; ?></h2>
                                <h3>
                                    <span id="galleryCity"><?php echo $GalleryCity; ?></span>, 
                                    <span id="galleryAddress"><?php echo $GalleryAddress; ?></span>, 
                                    <span id="galleryCountry"><?php echo $GalleryCountry; ?></span>
                                </h3>
                                <span><a href="<?=$GalleryWebSite?>" target='_blank' id="gallerySite"><?php echo $GalleryWebSite; ?></a></span></br> 
                                
                            </div>
                        </div>
                        
                        <div class="map">
                            <span id="latitude" class="<?=$Latitude?>"></span>
                            <span id="longitude" class="<?=$Longitude?>"></span>
                        </div>
        
                        <div class="list">
                            <h1 class="header">Painting List</h1>
                            <div class="sort">  
                                <span id="artist">Artist</span> | <span id="title">Title</span> | <span id="year">Year</span>
                            </div>
                            
                            <div class="painting">
                                <ul></ul>
                                <div id="popup" style=""></div>
                            </div>
                        </div>                        
                    </main>
                    <?php // END CONTENT
                } else {
                    ?>
                        <div class="Error">
                            <h1>Error: No Data found</h1>
                        </div>  
                    <?php
                }
            } else {
                // CREATE HTML TO SHOW 404 ERROR MESSAGE: PAGE NOT FOUND
                ?>
                    <div class="404ErrorMessage">
                        <h1>Error 404: PAGE NOT FOUND</h1>
                    </div>
                <?php
            }
        // END PHP ?>
    </body> 
    
    <!--SCRIPT-->
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/single-page.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3de_Ch6IoSD0OPDHppLS9HiWdI2zB5i4&callback=initMap"
    ></script>
</html>