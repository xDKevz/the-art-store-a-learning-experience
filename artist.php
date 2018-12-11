<!DOCTYPE html>
<html>
    <head>
    <?php
        $title = "Artists - Art Store"; // title of page
        include "include/head.php";
    ?>
    </head>
    <?php include "include/navigation.php"; ?>
    <body>
        <div class="barTitleWrapper">
            <div class="barTitleBackground"></div>
            <div class="barTitleContent"><span>Artists</span></div>
        </div>
        <main class="container">
            <span id="type" class="artist"></span>
            <div class="display-lists">
            </div>
        </main>
        
    </body>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/generalLists.js"></script>
</html>
