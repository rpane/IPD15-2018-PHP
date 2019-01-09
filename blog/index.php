<?php
session_start();
require_once 'db.php';
?>

<!DOCTYPE html>
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
        <h1>Welcome to my blog, read on!</h1>
        <?php
        $query = "SELECT a.id, a.creationTime, a.title, a.body, u.username FROM articles as a , users as u WHERE a.authorId = u.id"; //WHERE ='%s'", mysqli_real_escape_string($link, $userid));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL Database query error: " . mysqli_errno($link) . "</p>";
            exit;
        }        
        echo "<div id= articlesList>\n";
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $creationTime = $row['creationTime'];
            $title = $row['title'];
            $body = $row['body'];
            $authorName = $row['username'];
            printf("<div><a href=article.php");
        }        
        ?>
    </body>
</html>
