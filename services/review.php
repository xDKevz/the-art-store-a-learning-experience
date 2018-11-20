<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review API</title>
</head>
<body>
<?php // To Test, use https://comp3512-asg2-leepalisoc.c9users.io/services/review.php?painting=15
require_once('database-functions.inc.php');

    // declares an empty array
    $json_array = array();
    
    //calls the function above for database connection using pdo
    $connection=setConnectionInfo();
    
    // checks if the method is get        
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // checks if there is a painting id
        if (isset($_GET['painting']) && $_GET['painting'] > 0) {
            $sql = 'SELECT RatingID, PaintingID, ReviewDate, Rating, Comment FROM Reviews WHERE PaintingID=?';
             $statement = runQuery($connection, $sql, $_GET['painting']);
        
        //prints json array from function
        echo json_encode(jsonArray($statement));
        $connection=null;
        }
    }
?>

</body>
</html>