<!-- LOGO -->
    <div class="header">
        <div class="logo">
            <img src="images/logo/art_store_logo_white.png" alt="art store logo">
        </div>
    </div>
    <nav class="navigation">
        <li id="toggle"><a href="#" id="burger">&#9776;</a></li>
        <div id="menu">
            <li><a href="home.php">home</a></li>
            <li><a href="artist.php">artists</a></li>
            <li><a href="galleries.php">galleries</a></li>
            <li><a href="genre.php">genres</a></li>
            <li><a href="about.php">about</a></li>
        </div>
        <li id="user"><img src="/images/logo/user_icon.png"></li>
        <?php
            // Starts the session
            session_start();
            echo '<aside id="user-options">';
            echo '<div class="user-options-content">';
            
            // If no user has logged in, display something to welcome the anon as well as the "Sign in" button
            // Otherwise, say hello to the user
            if (isset($_SESSION["loginstatus"])) {
                $username = $_SESSION['username'];
                echo "<p>Hello, $username!</p>";
                echo '<nav class="user-options-nav">';
                echo '<ul class="user-options-nav-list">';
                echo '<li><a href="viewfavorites.php">favourites</a></li>';
                echo '<li><a href="logout.php">sign out</a></li>';
            } else {
                echo '<p>Hello, stranger.</p>';
                echo '<nav class="user-options-nav">';
                echo '<ul class="user-options-nav-list">';
                echo '<li><a href="login.php">sign in</a></li>';
            }
            
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        echo '</aside>';
        ?>
    </nav>
