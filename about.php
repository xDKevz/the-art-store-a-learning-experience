<?php
    $title = "About Us"; // title of page
    include "include/header.php";
?>
    <body>
        <header><?php include "include/navigation.php"; ?>
        </header>
        <main class="about">
            <h1>About</h1>
            <h2>Team Members</h2>
            <div class="teamMembers">
                <a href="https://github.com/xDKevz" target="_blank">
                    <div>
                        <img src="about/images/memoji_kevin.png" alt="Kevin"/>
                        <h4>John Kevin Ruiz</h4>
                    </div>
                </a>
                <a href="https://github.com/leepalisoc" target="_blank">
                    <div>
                        <img src="about/images/memoji_lee.png" alt="Lee"/>
                        <h4>Charlemagne Palisoc</h4>
                    </div>
                </a>
                <a href="https://github.com/jvali655" target="_blank">
                    <div>
                        <img src="about/images/memoji_jeremiah.png" alt="Jeremiah"/>
                        <h4>Jeremiah Valiente</h4>
                    </div>
                </a>
                <a href="https://github.com/Rancelot" target="_blank">
                    <div>
                        <img src="about/images/memoji_rafael.png" alt="Rafael"/>
                        <h4>Rafael Angelo Pucut</h4>
                    </div>
                </a>
            </div>
            <div class="repo">
                <h1>Repository</h1>
                <a href="https://github.com/xDKevz/comp3512-assignment2.git" target="_blank">
                    <img src="about/images/GitHub_Logo.png" alt="GitHub"/></a>
            </div>
        </main>
        <script type="text/javascript" src="../js/main.js"></script>
    </body>
</html>