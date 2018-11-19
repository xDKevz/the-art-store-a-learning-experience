<div class="logo"><img src="images/art_store_logo.png" alt="art store logo"></div>
    <div class="navigation">
        <div class="toggle"><i class="fa fa-bars mBars" aria-hidden="true"></i></div>
            <ul class="menu">
                <li><a href="home.php"><i class="fa fa-home"></i> HOME</a></li>
                <li><a href="artist.php"><i class="fa fa-paint-brush"></i> ARTISTS</a></li>
                <li><a href="galleries.php"><i class="fa fa-image"></i> GALLERIES</a></li>
                <li><a href="genre.php"><i class="fa fa-list-ul"></i> GENRES</a></li>
                <li><a href="about.php"><i class="fa fa-info"></i> ABOUT US</a></li>
                <li><a href="about.php"><i class="fa fa-heart"></i> FAVOURITES</a></li>
                <?php
                // starts the session
                session_start();
                
                // if logged in displays "log out" on nav bar
                if (isset($_SESSION["id"]))
                {
                    echo '<li><a href="logout.php"><i class="fa fa-sign-in"></i>LOGOUT</a></li>';

                }
                else
                // if not logged in
                {
                    echo '<li><a href="login.php"><i class="fa fa-sign-in"></i> LOG-IN</a></li>';
                }
                ?>
            </ul>
</div>