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

    
