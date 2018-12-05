<?php
/*not needed in the assignment, just testing a different way*/
        /*$url = 'https://comp3512-asg2-leepalisoc.c9users.io/services/artist.php';
        $content = file_get_contents($url);
        //$jsonData = stripslashes(html_entity_decode($content));
        $json = json_decode($content, true);
        echo $json[0]['FirstName'];*/
        
?>


<?php require_once('services/config.inc.php'); ?>


<!DOCTYPE html>
<html>
<body>
<h1>Database Tester (PDO)</h1>
<?php

//to test "https://comp3512-asg2-leepalisoc.c9users.io/test.php?id=5 <-----id comes from query string, id from home page 
        if (isset($_GET['id'])) {
                try {
                        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "select * from Artists where ArtistID=".$_GET['id'];
                        $result = $pdo->query($sql);
                        $row = $result->fetch();
                        echo "<label>First Name: </label>".$row['FirstName'] . "<br/>" . $row['LastName'] . "<br/>";
                        
                $pdo = null;
                }
                catch (PDOException $e) {
                        die( $e->getMessage() );
                }
        }


?>

<!--DONT DELETE-->
<!--<!DOCTYPE HTML>-->
<!--<HTML>-->
    <!--HEAD-->
<!--    <?php -->
<!--        $title = "Single-Gallery";-->
<!--        include "include/head.php";-->
<!--    ?>-->
    <!--END HEAD-->
    
    <!--BODY-->
<!--    <BODY>-->
        <!--LOGO + NAVIGATION-->
<!--        <HEADER>-->
<!--            <? include "include/header.php" ?>-->
<!--        </HEADER>-->
        
<!--        <MAIN>-->
<!--            <div class="info-panel">-->
<!--                <section id="<? $row['GalleryID']; ?>">-->
<!--                    <h2 id="galleryName"><? $row['']?></h2>-->
<!--                    <span id="galleryNative"></span> -->
<!--                    <span id="galleryCity"></span>  -->
<!--                    <span id="galleryAddress"></span> -->
<!--                    <span id="galleryCountry"></span>  -->
<!--                    <span><a href="" target='_blank' id="galleryHome"></a></span> -->
<!--                </section>-->
<!--            </div>-->
            
<!--            <div class="map-panel">-->
                
<!--            </div>-->
            
<!--            <div class="paintings-panel">-->
<!--                <section class="paintings-header">-->
<!--                    <ul class="list-header">-->
<!--                        <li></li>-->
<!--                        <li class="artist-header">Artist</li>-->
<!--                        <li class="title-header">Title</li>-->
<!--                        <li class="year-header">Year</li>-->
<!--                    </ul>-->
                    <!--CREATE BELOW A LIST CONTAINING DATAS-->
<!--                </section>-->
                
<!--            </div>-->
<!--        </MAIN>-->
        
<!--    </BODY>-->
<!--</HTML>-->

    
 <!--HEAD-->
	<?php

	?>
	<!-- BODY-->
	<body>
        
            <!--LOGO + NAVIGATION-->
            <header>
                
                <?php 

                    include "include/navigation.php" 
                ?>
            </header>
            
            <main>
                <div class="info-panel">
                    <section>
                        <h2 id="galleryName">TEST GALLERY</h2>
                        <span id="galleryNative">NATIVE GALLERY</span> 
                        <span id="galleryCity">GALLERY CITY</span>  
                        <span id="galleryAddress">GALLERY ADDRESS</span> 
                        <span id="galleryCountry">GALLERY COUNTRY</span>  
                        <span><a href="" target='_blank' id="galleryHome">GALLERY WEBSITE</a></span> 
                    </section>
                </div>
                
                <div class="map-panel">
                MAP
                </div>
                
                <div class="paintings-panel">
                    <section class="paintings-header">
                        <ul class="list-header">
                            <li></li>
                            <li class="artist-header">Artist</li>
                            <li class="title-header">Title</li>
                            <li class="year-header">Year</li>
                        </ul>
                    </section>
                    
                    <section class="paintings-data">
                        
                    </section>
                </div>
            </main>
            
     </body>
     <script type="text/javascript" src="js/single-gallery.js"></script>

</html>


<!--SINGLE ARTIST .PHP-->
<?php
    
    if (isset($_GET['id'])) {
        $title = "Single-Artist"; // title of page
        include "include/header.php";
        require_once('services/config.inc.php');
        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select * from Artists where ArtistID=".$_GET['id'];
            $result = $pdo->query($sql);
            $row = $result->fetch();
            
        ?>
        <body>
        <header>
            <?php include "include/navigation.php"; ?>
        </header>
        <main class="single-artist-container">
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
            <?php
            $pdo = null;
        }
        catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
?>
        
    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/single-artist.js"></script>
</body>
</html>

<!--echo "<img src='lab12-test02.php?width=100&file=$i'/>";-->

                                
                                <span id="first-name"><?php echo $row["FirstName"]; ?></span><br>
                                <span id="last-name"><?php echo $row["LastName"] ?></span><br>
                                <span id="nationality"><?php echo $row["Nationality"] ?></span><br>
                                <span id="gender"><?php echo $row["Gender"] ?></span><br>
                                <span id="yearofbirth"><?php echo $row["YearOfBirth"] ?></span><br>
                                <span id="yearofdeath"><?php echo $row["YearOfDeath"] ?></span><br>
                                <span id="details"><?php echo $row["Details"] ?></span><br>
                                <span id="link"><a href="<?=$row['ArtistLink']?>"><?php echo $row["ArtistLink"] ?></a></span><br>