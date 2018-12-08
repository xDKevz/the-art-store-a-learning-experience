


<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "View Favorites";
            include "include/head.php";
        ?>
        <link rel="stylesheet" href="css/viewfavorites.css"/>
    </head>
    
    <body>
        <header>
            <?php include "include/navigation.php"; ?>
        </header>
        
        <main class="container">
            <h1>Favorites</h1>
            
            <div class="content">
                    <?php
                        if ($_SESSION['favorites']) {
                            $favorites = $_SESSION['favorites'];
                            if (count($favorites) > 0) {
                            ?> <ul class="ul-favorite"> <?php
                                foreach($favorites as $f) {
                                    require_once("services/database-functions.inc.php");
                                    $sql = "SELECT a.FirstName, a.LastName, p.ArtistID, p.PaintingID, p.ImageFileName, p.Title, p.YearOfWork
                                    FROM Artists as a INNER JOIN Paintings as p ON a.ArtistID = p.ArtistID
                                    WHERE p.PaintingID = ?";
                                    $parameter = array($f);
                                    $row = retrievedData($sql, $parameter);
                                    extract($row);
                                    
                                    // set names to empty string so that there is no null printed in html
                                    if ($FirstName == null) { $FirstName = ""; }
                                    if ($LastName == null) { $LastName == ""; }
                                    
                                    echo "<li class='favorite'>";
                                        echo "<img class=\"image\" src=\"../services/imagescale.php?size=full&width=100&type=paintings&file=$ImageFileName\">";
                                        echo "<a href=\"single-artist.php?id=$ArtistID\">";
                                            echo "<span class=\"title\"> $FirstName $LastName </span>";
                                        echo "</a>";
                                        
                                        echo "<a href=\"single-painting.php?id=$PaintingID\">";
                                            echo "<span class=\"artist\"> $Title </span>";
                                         echo "</a>";
                                        echo "<span class=\"year\"> $YearOfWork </span>";
                                        echo "<button class=\"button\"><span><a href=\"services/removefavorites.php?id=<?=$PaintingID?>\"> Remove </a></span></button>";
                                    echo "</li>";
                                }
                            ?> 
                                </ul> 
                                <button class="button"><span><a target="" href="services/removefavorites.php?remove=all">Remove All</a></span></button>
                            <?php
                            }
                        } else {
                            ?> 
                                <div class="nofavorites"> 
                                    <h1>No favorites found.</h1>
                                    <p>You have no favorite items yet.</p>
                                </div>
                            <?php
                        }
                    ?>
            </div>
        </main>
        
        
    </body>
    
    
</html>