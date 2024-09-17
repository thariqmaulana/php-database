<?php

// untuk mendapatkan id terakhir auto_increment

require __DIR__ . "/GetConnection.php";

$connection = getConnection();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('said@mail.com', 'hello')");
$id = $connection->lastInsertId();

echo $id . PHP_EOL;

$connection = null;