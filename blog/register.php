<?php

require_once 'db.php';

function getForm($username = "", $email = "") {
    $form = <<< MARKER
<form method="post">
    Username: <input type="text" name="username" value="$username"><br>
    Email: <input type="email" name="email" value="$email"><br>
    Password <input type="password" name="pass1"><br>
    Password (repeated)<input type="password" name="pass2"><br>
    <input type="submit" value="Register">
</form> 
MARKER;
    return $form;
}

if (isset($_POST['username'])) { // State 2 or 3 - receiving submission
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $errorList = array();
    //
    if (strlen($username) < 4 || strlen($username) > 20) {
        array_push($errorList, "Username must be 4-20 characters long");
    } else {
        if (preg_match('/^[a-z0-9]+$/', $username) != 1) {
            array_push($errorList, "Username must be composed of lower case letters and numbers");
        } else {
            $query = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($link, $username));
            $result = mysqli_query($link, $query);
            if (!$result) {
                echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
                exit;
            }
            if (mysqli_fetch_assoc($result)) {
                array_push($errorList, "Username already in use");
            }
        }
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        array_push($errorList, "Email is invalid");
    } else {
        // make sure email is not already registered
        $query = sprintf("SELECT * FROM users WHERE email='%s'", mysqli_real_escape_string($link, $email));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }
        if (mysqli_fetch_assoc($result)) {
            array_push($errorList, "Email is already in use");
        }
    }
    // check passwords are not empty and identical
    if ($pass1 != $pass2 || $pass1 == "") {
        array_push($errorList, "Passwords must be identical and not empty");
    } else {
        // check password quality (use 3 seperate regular expressions)
        if ((preg_match('/[a-z]/', $pass1) != 1) ||
                (preg_match('/[A-Z]/', $pass1) != 1) ||
                (preg_match('/[0-9]/', $pass1) != 1)) {
            array_push($errorList, "Password must contain at least one uppercase, "
                    . "one lowercase letter and at least one digit");
        }
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
        echo getForm($username, $email);
    } else { // state 2: submission successful
        // insert record into users table
        $query = sprintf("INSERT INTO users VALUES (NULL, '%s', '%s', '%s')", mysqli_real_escape_string($link, $username), mysqli_real_escape_string($link, $email), mysqli_real_escape_string($link, $pass1));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }
        echo "<p>User registered. <a href=login.php>Login now</a>.</p>\n";
    }
} else { // state 1: first show
    echo getForm();
}