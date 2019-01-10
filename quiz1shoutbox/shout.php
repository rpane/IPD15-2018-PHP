<?php
session_start();
require_once 'db.php';
?><!DOCTYPE html>

<html>
    <head>        
        <meta charset="UTF-8">
        <title>Shout</title>
    </head>
    <body>               
        <?php
        if (!isset($_SESSION["count"])) {
            $_SESSION["count"] = 0;
        }

        function getForm($name = "") {
            $form = <<< MARKER
 <form method="post">
            Name:<input type="text" name="name"><br>
            Message:<input type="text" name="message"><br>
            <input type="submit" value="Shout">
        </form>  
MARKER;
            return $form;
        }

        if (isset($_POST['name'])) { // State 2 or 3 - receiving submission
            $name = $_POST['name'];
            $message = $_POST['message'];

            $errorList = array();
            //
            if (strlen($name) < 2 || strlen($message) > 20) {
                array_push($errorList, "Name must be 2-20 characters long");
                if (preg_match('/^[a-zA-Z0-9_\s]+$/', $name) != 1) {
                    array_push($errorList, "Name must be composed of lowercase, uppercase characters, numbers, spaces and underscores");
                }
            }
            if (strlen($message) < 1 || strlen($message) > 100) {
                array_push($errorList, "Message must be 1-100 characters long");
            }
            //
            if ($errorList) { // state 3: errors
                // echo "State 3: errors\n";
                // print_r($errorList);
                echo "<h3>Problems detected</h3>";
                echo "<ul>";
                foreach ($errorList as $error) {
                    echo "<li>" . $error . "</li>\n";
                }
                echo "</ul>";
                echo getForm($name);
            } else { // state 2: submission successful
                $_SESSION['count'] ++;
                echo getForm();
                $query = sprintf("INSERT INTO shouts VALUES (NULL, '%s', '%s', NULL)", mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $message));
                $result = mysqli_query($link, $query);

                if (!$result) {
                    echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
                    exit;
                }
            }
        } else { // state 1: first show
            echo getForm();
        }

        $query = "SELECT ts, name, message" .
                " FROM shouts ORDER BY ts DESC LIMIT 10";
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }

        echo "<div id=shoutList>\n";
        while ($row = mysqli_fetch_assoc($result)) {
            $ts = $row['ts'];
            $name = $row['name'];
            $message = $row['message'];
            printf("<div><ul><li>%s %s shouted: %s</li></ul></div>", $ts, $name, $message);
        }
        echo "You have shouted _" . $_SESSION['count'] . "_times from this browser session.";        
        ?>
    </body>
</html>