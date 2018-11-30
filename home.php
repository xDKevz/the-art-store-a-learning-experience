<!--// beginning of html -->
<?php
    $title = "Art Store Home"; // title of page
    include "include/header.php";
?>
    
    <body>
        <header>
            <?php include "include/navigation.php"; ?>
        </header>
        <main class="home">
            <div class="loading"></div>
            
            <div class="gallerylist">
                <h1>GALLERY LIST</h1>
                <ul class="galleryNames"></ul>
            </div>
            
            <div class="artist">
                <h1>ARTIST LIST</h1>
                 <ul class="artistList">
                    <!--<li><img src="images/temporary/square-small/001050.jpg"></li>-->
                    <!--<li><img src="images/temporary/square-small/001060.jpg"></li>-->
                    <!--<li><img src="images/temporary/square-small/001080.jpg"></li>-->
                    <!--<li><img src="images/temporary/square-small/001090.jpg"></li>-->
                </ul>
            </div>
            
            <div class="genreList">
                <h1>GENRE LIST</h1>
                <ul>
                    <!--li><img src="images/temporary/square-small/001130.jpg"></li>-->
                    <!--<li><img src="images/temporary/square-small/001180.jpg"></li>-->
                    <!--<li><img src="images/temporary/square-small/001170.jpg"></li><li><img src="images/temporary/square-small/001100.jpg"></li>-->
                </ul>
            </div>
        </main>
        
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
    </body>
</html>
