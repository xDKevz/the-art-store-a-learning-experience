<!--// beginning of html -->
<!-- If not supplied with query string id, show a 404 page not found error message-->
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
                    <img src="images/artists/full/<?=$row['ArtistID']?>.jpg">
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
            <?php
            $pdo = null;
        }
        catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
?>
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
                            <ul class='ulrow'>
                                <li class='ulcol0'><img src='images/temporary/square-small/001050.jpg'></li>
                                <li class='ulcol1'>Van Gogh</li>
                                <li class='ulcol2'>This is a work of art</li>
                                <li class='ulcol3'>2019</li>
                            </ul>
                            
                                <ul class='ulrow'>
                                <li class='ulcol0'><img src='images/temporary/square-small/001020.jpg'></li>
                                <li class='ulcol1'>Van Gogh</li>
                                <li class='ulcol2'>This is a work of art</li>
                                <li class='ulcol3'>2019</li>
                            </ul>
                        </section>
        </div>
    
    </main>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
    