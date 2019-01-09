<?php
session_start();
require_once 'db.php';
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $query = "SELECT a.id, a.creationTime, a.title, a.body, u.username authorName " .
                " FROM articles as a, users as u WHERE a.authorId = u.id";
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
            printf("<div><a href=article.php?id=%s><b>%s</b></a><br>\nPosted by %s on %s<br>\n%s",
                    $id, $title, $authorName, $creationTime, $body);
        }
        echo "</div>\n";
        ?>
    </body>
</html>