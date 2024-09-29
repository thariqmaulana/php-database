<?php

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$sql = "SELECT * FROM customers";
$statement = $connection->query($sql);

$customers = $statement->fetchAll();
foreach ($customers as $row) {
  var_dump($row);
}

// var_dump($customers);
var_dump($customers[0]["name"]);

$connection = null;