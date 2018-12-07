<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "Single Painting";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/single-painting.css" type="text/css" />
    </head>
    
    <?php // START PHP
            if ( isset($_GET['id']) ) {
                // RETRIEVED ARTIST DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT a.FirstName, a.LastName, p.PaintingID, p.ImageFileName, p.Title, p.MuseumLink, p.CopyrightText, 
                p.Description, p.Excerpt, p.YearOfWork, p.Width, p.Height, p.Medium, p.GoogleLink, p.WikiLink, p.JsonAnnotations 
                FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID
                WHERE p.PaintingID = ?";
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
                    
                    <main class="container">
                        <div class="painting"> 
                            <h1 class="header">Painting</h1>
                            <img src="../services/imagescale.php?size=full&width=500&type=paintings&file=<?=$ImageFileName?>"> 
                        </div>  
                        
                        <div class="information">
                            <h1 class="header">Information</h1>
                            <div class="specifics">
                                <h2 class="title"> <?php echo "\"$Title\""; ?> </h2>
                                <h3> <?php echo $FirstName . " " . $LastName; ?> </h3>
                                <p> <?php echo $YearOfWork . ", ". $Medium . ", " . $Width . "\" x " . $Height . "\" , " . $CopyrightText; ?></p>
                                
                                <p class="links">
                                    <label>Links</label><br>
                                    <?php
                                        if ($GoogleLink != null) {
                                            echo "<a href=\"$GoogleLink\" target=\"_blank\" >";
                                                echo "Google Link";
                                            echo "</a><br>";
                                        }
                                        
                                        if ($MuseumLink != null) {
                                            echo "<a href=\"$MuseumLink\" target=\"_blank\" >";
                                                echo "Museum Link";
                                            echo "</a><br>";
                                        }
                                            
                                        if ($WikiLink != null) {
                                            echo "<a href=\"$WikiLink\" target=\"_blank\" >";
                                                echo "Wiki Link";
                                            echo "</a>";
                                        }
                                    ?>
                                </p>
                                <p class="details"> <?php echo $Description; ?> </p>
                            </div>
                            <div class="colorscheme">
                                <?php
                                    $colorscheme = json_decode($JsonAnnotations);
                                    foreach($colorscheme->dominantColors as $color) {
                                        $web = $color->web;
                                        $name = $color->name;
                                        echo "<p class=\"box\">";
                                            echo "<span class=\"color\" style=\"background-color:$web\"></span>";
                                            echo "<span class=\"name\"> $name </span>";
                                        echo "</p>";
                                    }
                                ?>
                            </div>
                            
                            <div class="favorites">
                                <button class="button"><span><a href="addtofavorites.php?id=<?=$PaintingID?>">Add to Favorites </a></span></button>
                                <button class="button"><span><a href="">View Favorites</a></span></button>
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
    <!--<script type="text/javascript" src="js/single-page.js"></script>-->
</html>