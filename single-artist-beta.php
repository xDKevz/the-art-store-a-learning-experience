<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "Single Artist";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/single-artist.beta.css" type="text/css" />
    </head>
    
    <?php // START PHP
            if ( isset($_GET['id']) ) {
                // RETRIEVED ARTIST DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists where ArtistID=?";
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
                        <div class="information">
                            <h1>Artist Information</h1>
                            <div class="image">
                                <img id="<?=$ArtistID?>" class="artist" src="images/artists/full/<?=$ArtistID?>.jpg">
                            </div>
                            <div class="specifics">
                                <h2>
                                    <span class="name"> <?php echo $FirstName . " " . $LastName; ?> </span>,
                                    <span class="year"> <?php echo "(" . $YearOfBirth . "-" . $YearOfDeath . ")" ?> </span>,
                                    <span class="nation"> <?php echo $Nationality; ?> </span>
                                </h2>
                                <span class="link"> <a href="<?=$ArtistLink?>"> <?php echo $ArtistLink; ?> </a> </span>
                                <span class="details"> <p> <?php echo $Details ?> </p> </span>
                            </div>
                        </div>
        
                        <div class="list">
                            <h1>Painting List</h1>
                            <div class="sort">  
                                <label id="artist"></label>
                                <label id="title">Title</label> |
                                <label id="year">Year</label>
                            </div>
                            
                            <div class="painting">
                                <ul>
                                    <!--<li>-->
                                    <!--  <img src="images/artists/square/1.jpg" >-->
                                    <!--  <h3>The Grasslands</h3>-->
                                    <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>-->
                                    <!--</li>-->
                                      
                                    <!--<li>-->
                                    <!--  <img src="images/artists/square/2.jpg" >-->
                                    <!--  <a href="_#"><h3>Paradise Found</h3></a>-->
                                    <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--  <img src="images/artists/square/5.jpg" >-->
                                    <!--  <h3>Smoke On The Water</h3>-->
                                    <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--  <img src="images/artists/square/8.jpg" >-->
                                    <!--  <h3>Headline</h3>-->
                                    <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod ultrices ante, ac laoreet nulla vestibulum adipiscing. Nam quis justo in augue auctor imperdiet.</p>-->
                                    <!--</li>-->
                                </ul>
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
</html>