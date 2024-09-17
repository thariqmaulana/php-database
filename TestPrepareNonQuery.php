<?php

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "INSERT INTO admin(username, password) VALUES (?, ?)";
$statement = $connection->prepare($sql);
$statement->execute(["fajri", "fajri123"]);


$connection = null;