<?php

/*
auto increment tidak akan kembali
*/

// Walaupun sukses semua, kalau rollback maka akan dibatalkan semua;

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");

$connection->rollBack();

$connection = null;