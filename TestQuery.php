<?php

// Query untuk perintah yang mendapatkan return value;
/*

*/

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

// $sql = "SELECT * FROM customers";
$sql = "SELECT id, name, email FROM customers";
$statement = $connection->query($sql);
// var_dump($statement);


foreach ($statement as $index => $row) {
  // statement = pdoObject yang berisi array result
  var_dump($index);
  var_dump($row);
  echo "{$row["id"]} {$row["name"]} {$row["email"]} ". PHP_EOL;
}

$connection = null;

// var_dump($statement->);