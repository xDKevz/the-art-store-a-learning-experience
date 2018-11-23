    <div class="header">
        <div class="logo">
            <img src="images/art_store_logo_white.png" alt="art store logo">
        </div>
        <div class="navigation">
            <div class="toggle"><i class="fa fa-bars mBars" aria-hidden="true"></i></div>
                <ul class="menu">
                    <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="artist.php"><i class="fa fa-paint-brush"></i>Artists</a></li>
                    <li><a href="galleries.php"><i class="fa fa-image"></i>Galleries</a></li>
                    <li><a href="genre.php"><i class="fa fa-list-ul"></i>Genres</a></li>
                    <li><a href="about.php"><i class="fa fa-info"></i>About</a></li>
                    <li><a href="about.php"><i class="fa fa-heart"></i>Favourites</a></li>
                    <?php
                        // starts the session
                        session_start();
                        
                        // if logged in displays "log out" on nav bar
                        if (isset($_SESSION["email"])) {
                            echo '<li><a href="logout.php"><i class="fa fa-sign-in"></i>Log out</a></li>';
                        }
                        // if not logged in
                        else {
                            echo '<li><a href="login.php"><i class="fa fa-sign-in"></i>Log in</a></li>';
                        }
                    ?>
                    
                </ul>
        </div>
    </div>
        
