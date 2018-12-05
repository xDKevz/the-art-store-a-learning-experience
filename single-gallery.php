<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Single Gallery";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/single-gallery.css" type="text/css" />
    </head>
    
    <body>
        <?php // START PHP

            if ( isset($_GET['id']) ) {

                // RETRIEVED GALLERY DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries WHERE GalleryID=?";
                $parameter = array($_GET['id']);
                $row = retrievedData($sql, $parameter);
                // END RETRIEVED
                
                // CHECK IF $row is not empty, otherwise inform user no data found.
                if (!empty($row)) {
                // START CONTENT
                    ?>
                    <header>
                        <?php include "include/navigation.php"; ?>
                    </header>
                    
                    <main class="single-gallery-container">
                        <div class="galleryinfo">
                            <h1>GALLERY INFO</h1>
                            <section class=info>
                                <h2 id="galleryName" class="<?=$row["GalleryID"]?>"><?php echo $row["GalleryName"]; ?></h2></br>
                                <span id="galleryNative"><?php echo $row["GalleryNativeName"]; ?></span></br>
                                <span id="galleryCity"><?php echo $row["GalleryCity"]; ?></span></br>
                                <span id="galleryAddress"><?php echo $row["GalleryAddress"]; ?></span></br> 
                                <span id="galleryCountry"><?php echo $row["GalleryCountry"]; ?></span></br>
                                <span><a href="" target='_blank' id="gallerySite"><?php echo $row["GalleryWebSite"]; ?></a></span></br> 
                            </section>
                        </div>
                        
                        <div class="map">
                        Location
                        </div>
                                
                        <div class="paintings">
                            <div class='boxheader'><h3>PAINTING LIST</h3></div>
                                <section class='paintingHeader'>
                                    <ul class='ulheader'>
                                        <li></li>
                                        <li class='hArtist'>Artist</li>
                                        <li class='hTitle'>Title</li>
                                        <li class='hYear'> Year</li>
                                    </ul>
                                </section>
                    
                                <section class='paintingRow'>
                                    <!--<ul class='ulrow'>-->
                                    <!--    <li class='pImage'><img src='images/temporary/square-small/001050.jpg'></li>-->
                                    <!--    <li class='pTitle'>Van Gogh</li>-->
                                    <!--    <li class='pArtist'>This is a work of art</li>-->
                                    <!--    <li class='pYear'>2019</li>-->
                                    <!--</ul>-->
                                    
                                    <!--<ul class='ulrow'>-->
                                    <!--    <li class='ulcol0'><img src='images/temporary/square-small/001020.jpg'></li>-->
                                     <!--    <li class='ulcol1'>Van Gogh</li>-->
                                    <!--    <li class='ulcol2'>This is a work of art</li>-->
                                    <!--    <li class='ulcol3'>2019</li>-->
                                    <!--</ul>-->
                                    <div id="painting-row-enlarge" style=""></div>
                                </section>
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
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/single-gallery.js"></script>
</html>