    <div class="header">
        <div class="logo">
            <img src="images/art_store_logo_white.png" alt="art store logo">
        </div>
    </div>
    <!--<div class="toggle"><i class="fa fa-bars mBars" aria-hidden="true"></i></div>-->
    <nav class="navigation">
        <li><a href="home.php">home</a></li>
        <li><a href="artist.php">artists</a></li>
        <li><a href="galleries.php">galleries</a></li>
        <li><a href="genre.php">genres</a></li>
        <li><a href="about.php">about</a></li>
        <li><a href="about.php">favourites</a></li>
        <?php
            // starts the session
            session_start();
            
            // if logged in displays "log out" on nav bar
            if (isset($_SESSION["email"])) {
                echo '<li><a href="logout.php">log out</a></li>';
            } // if not logged in
            else {
                echo '<li><a href="login.php">log in</a></li>';
            }
        ?>
    
    </nav>
