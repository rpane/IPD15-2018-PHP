<?php
require_once 'db.php';

$username = $_GET['username'];

$query = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($link, $username));
        $result = mysqli_query($link, $query);
        if (!$result) {
            echo "<p>Error: SQL database query error: " . mysqli_error($link) . "</p>";
            exit;
        }
        if (mysqli_fetch_assoc($result)) {
            echo "Username already in use";
        }
        
