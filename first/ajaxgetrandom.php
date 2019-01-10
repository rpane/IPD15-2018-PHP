<?php

if (!isset($_GET['min']) || !isset($_GET['max'])) {
    die("Error: min and max parameters are missing");
}

$min = $_GET['min'];
$max = $_GET['max'];

if (!is_numeric($min) || !is_numeric($max)) {
    die("Error: both min and max must be provided as numbers");
}

if ($min > $max) {
    die("Error: minimum can not be greater than maximum");
}

$result = rand($min, $max);

echo $result;