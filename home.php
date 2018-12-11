<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Home - Art Store"; // title of page
            include "include/head.php";
        ?>
    </head>
    <?php include "include/navigation.php"; ?>
    <body>
        <div class="barTitleWrapper">
            <div class="barTitleBackground"></div>
            <div class="barTitleContent"><span>Home</span></div>
        </div>
        <img src="images/logo/animacia3.gif" class="loading">
        <main class="home">
            <div class="gallerylist">
                <h1>galleries</h1>
                <ul class="gallerylist-ul"></ul>
            </div>
            
            <div class="artistlist">
                <!--<div class="loading"></div>-->
                <!--This is where both rows of artists are generated-->
                <!--Sample elements shown below of how each artist is generated-->
                    <div class="box1">
                        <!--<div class="hpage">view1</div>-->
                        <!--<div class="hpage">view2</div>-->
                    </div>
                    <div class="box2">
                        <!--<div class="hpage">view1</div>-->
                        <!--<div class="hpage">view2</div>-->
                    </div>
            </div>
            
            <div class="genrelist">
                <!--<div class="loading"></div>-->
                <!--<h1>GENRE LIST</h1>-->
                <div class="surroundContainer">
                    <!--This is where both rows of genres are generated-->
                    <!--Sample elements shown below of how each genre is generated-->
                    <div class="box1">
                        <!--<div class="hpage">genre1</div>-->
                        <!--<div class="hpage">genre2</div>-->
                    </div>
                    <div class="box2">
                        <!--<div class="hpage">genre1</div>-->
                        <!--<div class="hpage">genre2</div>-->
                    </div>
                </div>
            </div>
        </main>
        
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/homepage.js"></script>
    </body>
</html>
