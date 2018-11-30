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
                <ul class="galleryList"></ul>
            </div>
            
            <div class="artist">
                <h1>ARTIST LIST</h1>
                 <ul class="artistList">
                </ul>
            </div>
            
            <div class="genreList">
                <h1>GENRE LIST</h1>
                <ul>
                </ul>
            </div>
        </main>
        
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
    </body>
</html>
