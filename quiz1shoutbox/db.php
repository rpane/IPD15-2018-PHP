<?php

$db_user = 'quiz1shout';
$db_name = 'quiz1shout';
$db_pass = "NcB73rDTqamBe7Wu";
$db_port = 3333; //Class
$db_host = 'localhost';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}