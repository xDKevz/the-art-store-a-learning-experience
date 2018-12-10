<!DOCTYPE html>
<html>
    <head>
    <?php
        $title = "Genres - Art Store"; // title of page
        include "include/head.php";
    ?>
    </head>
    <body>
        <header>
            <?php include 'include/navigation.php'; ?>
        </header>
        <main id="genre-display" class="container">
            <span id="type" class="genre"></span>
            <div class="display-lists">
            </div>
        </main>
    </body>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/generalLists.js"></script>
</html>
