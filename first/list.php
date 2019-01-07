<?php

require_once 'db.php';

$query = "SELECT * FROM people";
$result = mysqli_query($link, $query);
if (!$result) {
    echo "<p>Error: SQL Database query error: " . mysqli_errno($link) . "</p>";
    exit;
}

echo "<table border =1><tr><th>#</th><th>name</th><th>age</th></tr>\n";
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];
    $age = $row['age'];
    echo "<tr><td>$id</td><td>$name</td><td>$age</td></tr>\n";
}
echo "</table>";
