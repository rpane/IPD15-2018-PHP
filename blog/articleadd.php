<?php
session_start();
require_once 'db.php';

function getForm($title = "", $body = "") {
    $form = <<< MARKER
<form method="post">
    Title: <input type="text" name="title" value="$title"><br>
    <textarea name="body">$body</textarea><br>
    <input type="submit" value="Publish Article">
</form> 
MARKER;
    return $form;
}

if(!isset($_SESSION['user'])){
    echo "<p>Unauthorized. <a href=login.php>Login first</a>.</p>";
    exit;
}


if (isset($_POST['title'])) { // State 2 or 3 - receiving submission
    $title = $_POST['title'];
    $body = $_POST['body'];
   
    $errorList = array();
    //
    if(strlen($title) < 2 || strlen($title) > 200){
        array_push($errorList,"Title must be 2-200 characters long");
    }
    if(strlen($body) < 2 || strlen($body) > 10000){
        array_push($errorList, "Body must be 2-10000 characters long");
    }
    //
    if ($errorList) { // state 3: errors
        // echo "State 3: errors\n";
        // print_r($errorList);
        echo "<h3>Problems detected</h3>";
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . $error . "</li>\n";
        }
        echo "</ul>\n";
        echo getForm($title, $body);
    } else { // state 2: submission successful
        // insert record into users table
        $userid = $_SESSION['user']['id'];
        $query = sprintf("INSERT INTO articles VALUES (NULL, '%s', NULL, '%s', '%s')",
                mysqli_real_escape_string($link, $userid),
                mysqli_real_escape_string($link, $title),
                mysqli_real_escape_string($link, $body));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }
        echo "<p>Article added <a href=index.php>Go to index now</a>.</p>\n";
    }
} else { // state 1: first show
    echo getForm();
}