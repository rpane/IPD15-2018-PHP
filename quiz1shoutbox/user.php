<?php
session_start();
require_once 'db.php';
?><!DOCTYPE html>

<html>
    <head>        
        <meta charset="UTF-8">
        <title>User</title>
    </head>
    <body>
        <div id="centeredContent">
            <?php
            if (isset($_GET['user'])) {
                $user = $_GET['user'];
                $query = sprintf("SELECT * " .
                        " FROM shouts WHERE name = '%s'", mysqli_real_escape_string($link, $user));
                $result = mysqli_query($link, $query);
                if (!$result) {
                    echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
                    exit;
                }
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>No records found!</p>";
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    $ts = $row['ts'];
                    $name = $row['name'];
                    $message = $row['message'];
                    printf("<div><ul><li>%s %s shouted: %s</li></ul></div>\n", $ts, $name, $message);
                }
            }
            ?>
        </div>
    </body>
</html>

