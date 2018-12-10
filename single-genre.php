<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "Art Store";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/single-page.css" type="text/css" />
    </head>
    <header>
        <?php include "include/navigation.php"; ?>
    </header>
    <?php // START PHP
            if ( isset($_GET['id']) ) {
                // RETRIEVED ARTIST DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres WHERE GenreID=?";
                $parameter = array($_GET['id']);
                $row = retrievedData($sql, $parameter);
                extract($row);
                // END RETRIEVED
                
                if (!empty($row)) {
                // START CONTENT
                    ?>
                    <main class="container">
                        <span id="type" class="genre"></span>
                        <div id="<?=$GenreID?>" class="information">
                            <h1 class="header">Genre Information</h1>
                            <div class="image">
                                <img src="services/imagescale.php?width=400&file=<?=$GenreID?>">
                            </div>
                            <div class="specifics">
                                <h2 class="genreName"><?php echo $GenreName; ?></h2>
                                <p class="link"><a href="<?=$Link ?>" target='_blank'><?php echo $Link; ?></a></p>
                                <span class="details"> <p> <?php echo $Description; ?> </p> </span>
                            </div>
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
                    <div class="error">
                            <img src="images/logo/Page-not-found.png" > 
                    </div>   
                    <?php
                }
            } else {
                // CREATE HTML TO SHOW 404 ERROR MESSAGE: PAGE NOT FOUND
                ?>
                    <div class="error">
                            <img src="images/logo/Page-not-found.png" > 
                    </div>   
                <?php
            }
        // END PHP ?>
    </body> 
    
    <!--SCRIPT-->
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/single-page.js"></script>
</html>