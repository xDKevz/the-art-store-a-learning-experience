<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Art Store Home"; // title of page
            include "include/head.php";
        ?>
    </head>

    <body>
        <header>
            <?php include "include/navigation.php"; ?>
        </header>
        <main class="home">
            <div class="loading"></div>
            
            <div class="gallerylist">
                <h1>GALLERY LIST</h1>
                <ul class="gallerylist"></ul>
            </div>
            
            <div class="artistlist">
                <h1>ARTIST LIST</h1>
                <ul class="one"></ul>
                <ul class="two"></ul>
            </div>
            
            <div class="genrelist">
                <h1>GENRE LIST</h1>
                <ul class="one"></ul>
                <ul class="two"></ul>
            </div>
        </main>
        
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
    </body>
</html>
