<!DOCTYPE html>
<html>
    <head>
        <?php 
            $title = "About Us";
            include "include/head.php"; 
        ?>
        <link rel="stylesheet" href="css/about.css" type="text/css"/>
    </head>
    <header>
        <?php include "include/navigation.php"; ?>
    </header>
    <body>
        <div class="barTitleWrapper">
            <div class="barTitleBackground"></div>
            <div class="barTitleContent"><span>About The Team</span></div>
        </div>
        <main class="about">
            <div class="teamMembers">
                <h2>Team Members</h2>
                <a href="https://github.com/xDKevz" target="_blank">
                    <div>
                        <img src="images/about/memoji_kevin.png" alt="Kevin"/>
                        <h4>John Kevin Ruiz</h4>
                    </div>
                </a>
                <a href="https://github.com/leepalisoc" target="_blank">
                    <div>
                        <img src="images/about/memoji_lee.png" alt="Lee"/>
                        <h4>Charlemagne Palisoc</h4>
                    </div>
                </a>
                <a href="https://github.com/jvali655" target="_blank">
                    <div>
                        <img src="images/about/memoji_jeremiah.png" alt="Jeremiah"/>
                        <h4>Jeremiah Valiente</h4>
                    </div>
                </a>
                <a href="https://github.com/Rancelot" target="_blank">
                    <div>
                        <img src="images/about/memoji_rafael.png" alt="Rafael"/>
                        <h4>Rafael Angelo Pucut</h4>
                    </div>
                </a>
            </div>
            <div class="repo">
                <h1>Repository</h1>
                <a href="https://github.com/xDKevz/comp3512-assignment2.git" target="_blank">
                    <img src="images/about/GitHub_Logo.png" alt="GitHub"/></a>
            </div>
        </main>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>