<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "About Us - Art Store";
            include "include/head.php"; 
        ?>
        <link rel="stylesheet" href="css/about.css" type="text/css"/>
    </head>
    <?php include "include/navigation.php"; ?>
    <body>
        <div class="barTitleWrapper">
            <div class="barTitleBackground"></div>
            <div class="barTitleContent"><span>About The Team</span></div>
        </div>
        <main class="about">
            <div class="teamMembers">
                <h2>Team Members</h2>
                <div class="memojis">
                    <a href="https://github.com/xDKevz" target="_blank">
                        <div id="kevin">
                            <img src="images/about/memoji_kevin.png" alt="Kevin"/>
                            <h4>John Kevin Ruiz</h4>
                        </div>
                    </a>
                    <a href="https://github.com/leepalisoc" target="_blank">
                        <div id="lee">
                            <img src="images/about/memoji_lee.png" alt="Lee"/>
                            <h4>Charlemagne Palisoc</h4>
                        </div>
                    </a>
                    <a href="https://github.com/jvali655" target="_blank">
                        <div id="jeremiah">
                            <img src="images/about/memoji_jeremiah.png" alt="Jeremiah"/>
                            <h4>Jeremiah Valiente</h4>
                        </div>
                    </a>
                    <a href="https://github.com/Rancelot" target="_blank">
                        <div id="rafael">
                            <img src="images/about/memoji_rafael.png" alt="Rafael"/>
                            <h4>Rafael Angelo Pucut</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="repo">
                <h2>Repository</h2>
                <a href="https://github.com/xDKevz/comp3512-assignment2.git" target="_blank">
                    <img src="images/about/GitHub_Logo.png" alt="GitHub"/></a>
            </div>
        </main>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>