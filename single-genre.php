<!DOCTYPE html>
<html>
    <?php
        $title = "Single Genre";
        include "include/head.php";
    ?>

    <body>
        <?php // START PHP

            if ( isset($_GET['id']) ) {

                // RETRIEVED GALLERY DATA FROM DB
                require_once("services/database-functions.inc.php");
                $sql = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres WHERE GenreID=?";
                $parameter = array($_GET['id']);
                $row = retrievedData($sql, $parameter);
                // END RETRIEVED
                
                // START CONTENT
                    ?>
                    <header>
                        <?php include "include/navigation.php"; ?>
                    </header>
                    
                    <main class="single-genre-containter">
                        <div class="genreinfo">
                            <h1>GENRE INFO</h1>
                            <div class="image">
                                <img class="aImage" id="<?=$row['GenreID']?>" src="images/genres/<?=$row['GenreID']?>.jpg">
                            </div>
                            <section class=info>
                                <h2 id="genreName"><?php echo $row["GenreName"]; ?></h2>
                                <span id="era"><?php echo $row["EraID"]; ?></span> 
                                <span id="description"><?php echo $row["Description"]; ?></span>  
                                <span><a href="" target='_blank' id="genreSite"><?php echo $row["Link"]; ?></a></span> 
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
    <script type="text/javascript" src="js/single-genre.js"></script>
</html>