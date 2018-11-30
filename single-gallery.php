    <!--// beginning of html -->
    <?php
        $title = "Single-Gallery"; // title of page
        include "include/header.php";
    ?>

<body>
    <header>
        <?php include "include/navigation.php"; ?>
    </header>
    <main class="single-artist-container">
        <div class="artistinfo">
            <h1>ARTIST INFO</h1>
            <div class="image">
                <img src="images/artists/full/19.jpg">
            </div>
            
            <section class="info">
                <span id="first-name">Vincent</span><br>
                <span id="last-name">Van Gogh</span><br>
                <span id="nationality">Netherlands</span><br>
                <span id="gender">M</span><br>
                <span id="yearofbirth">1853</span><br>
                <span id="yearofdeath">1890</span><br>
                <span id="details">Artist details</span><br>
                <span id="link">http://link.com</span><br>
            </section>
            
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
        </div>
        
        <div class="map">
            <h1>GALLERY MAP</h1>
        </div>
    
    </main>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
    