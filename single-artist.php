<!DOCTYPE html>
<html>
    <?php
        $title = "Single Artist";
        include "include/head.php";
    ?>
    
    <body>
        <?php // START PHP
            if ( isset($_GET['id']) ) {
                // RETRIEVED ARTIST DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists where ArtistID=?";
                $parameter = array($_GET['id']);
                $row = retrievedData($sql, $parameter);
                // echo $row;
                // END RETRIEVED
                
                // START CONTENT
                    ?>
                    <header>
                        <?php include "include/navigation.php"; ?>
                    </header>
                    
                    <main class="single-artist-containter">
                        <div class="artistinfo">
                            <h1>ARTIST INFO</h1>
                            <div class="image">
                                <img class="aImage" id="<?=$row['ArtistID']?>" src="images/artists/full/<?=$row['ArtistID']?>.jpg">
                                <!--<img class="aImage" id="<?=$row['ArtistID']?>" src="services/imagescale.php?file=<?=$row['ArtistID']?>">-->
                            </div>
                            
                            <section class="info">
                                <span id="first-name"><?php echo $row["FirstName"]; ?></span><br>
                                <span id="last-name"><?php echo $row["LastName"] ?></span><br>
                                <span id="nationality"><?php echo $row["Nationality"] ?></span><br>
                                <span id="gender"><?php echo $row["Gender"] ?></span><br>
                                <span id="yearofbirth"><?php echo $row["YearOfBirth"] ?></span><br>
                                <span id="yearofdeath"><?php echo $row["YearOfDeath"] ?></span><br>
                                <span id="details"><?php echo $row["Details"] ?></span><br>
                                <span id="link"><a href="<?=$row['ArtistLink']?>"><?php echo $row["ArtistLink"] ?></a></span><br>
                            </section>
                        </div>
        
                        <div class="paintings">
                            <div class='boxheader'><h3>PAINTING LIST</h3></div>
                                <section class='paintingHeader'>
                                    <ul class='ulheader'>
                                        <li></li>
                                        <!--<li class='hArtist'>Artist</li>-->
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
                // } catch ( PDOException $e ) {
                //     die ( $e->getMessage() );
                // }
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
    <script type="text/javascript" src="js/single-artist.js"></script>
</html>