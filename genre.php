<!DOCTYPE html>
<html>
    <head>
    <?php
        $title = "Genres - Art Store"; // title of page
        include "include/head.php";
    ?>
    </head>
    <?php include "include/navigation.php"; ?>
    <body>
        <div class="barTitleWrapper">
            <div class="barTitleBackground"></div>
            <div class="barTitleContent"><span>Genres</span></div>
        </div>
        <main id="genre-display" class="container">
            <span id="type" class="genre"></span>
            <div class="display-lists">
            </div>
        </main>
    </body>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/generalLists.js"></script>
</html>
