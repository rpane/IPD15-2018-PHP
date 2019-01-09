<?php

$db_user = 'blog';
$db_name = 'blog';
$db_pass = "KE9lj2B7St1xLzpV";
$db_port = 3306; //Home
//$db_port = 3333; //Class
$db_host = 'localhost';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}