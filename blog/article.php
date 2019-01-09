<?php
session_start();
require_once 'db.php';
?><!DOCTYPE html>

<html>
    <head>
        <link href="styles.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Article</title>
    </head>
    <body>
        <div id="centeredContent">
            <?php
            $id = $_GET['id'];
             $query = sprintf("SELECT a.id, a.creationTime, a.title, a.body, u.username authorName " .
                " FROM articles as a JOIN users as u ON a.authorId = u.id WHERE   u.id = '%s'",  mysqli_real_escape_string($link, $id));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }
        
        echo "<div id=articlesList>\n";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $creationTime = $row['creationTime'];
            $title = $row['title'];
            $body = $row['body'];
            $authorName = $row['authorName'];
            // print_r($row); echo "<br>\n";
            printf("<div><h1>%s</h1></a><br>\nPosted by %s on %s<br>\n%s",
                     $title, $authorName, $creationTime, $body);
        }
        echo "</div>\n";
            ?>
        </div>
    </body>
</html>