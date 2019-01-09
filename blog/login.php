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
        <link href="styles.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>
        <div id="centeredContent">
            <?php

function getForm($username = "") {
    $form = <<< MARKER
<form method="post">
    Username: <input type="text" name="username" value="$username"><br>
    Password <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form> 
MARKER;
    return $form;
}

if (isset($_POST['username'])) { // State 2 or 3 - receiving submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isLoginSuccessful = false;
    //
    $query = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($link, $username));
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
        exit;
    }
    if ($user = mysqli_fetch_assoc($result)) {
        if ($user['password'] == $password) {
            $isLoginSuccessful = true;
        }
    }
    //
    if (!$isLoginSuccessful) { // state 3: errors
        // echo "State 3: errors\n";
        // print_r($errorList);
        echo "<h3>Login failed</h3>";
        echo "<p>Login credentials do not match our records. You can try again or ";
        echo "<a href=register.php>register</a>.";
        echo getForm($username);
    } else { // state 2: submission successful
        unset($user['password']);
        $_SESSION['user'] = $user;
        echo "<p>Login successful</p>\n";
    }
} else { // state 1: first show
    echo getForm();
}
?>
        </div>
    </body>
</html>
