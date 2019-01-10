<?php
session_start();
require_once 'db.php';
?><!DOCTYPE html>

<html>
    <head>
        <link href="styles.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Logout</title>
    </head>
    <body>
        <div id="centeredContent">
            <?php
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
            }
            echo "<p>You've been logged out. <a href=index.php>Click to continue</a>.</p>\n";
            ?>
        </div>
    </body>
</html>
