<?php

/*
satu saja gagal maka semua akan digagalkan
namun auto_increment tidak akan kembali
auto increment yang sukses sebelum menemukan kegagalan tidak akan kembali
*/

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('test1@mail.com', 'transaction')");

// $connection->exec("INSERT INTO comments(emails, comment) VALUES ('testfail@mail.com', 'transaction')");
// $connection->exec("INSERT INTO comments(email, comment) VALUES ('testfail@mail.com', 'transaction')");
// $connection->exec("INSERT INTO comments(emails, comment) VALUES ('testfail@mail.com', 'transaction')");
// $connection->exec("INSERT INTO comments(email, comment) VALUES ('testfail@mail.com', 'transaction')");
// $connection->exec("INSERT INTO comments(email, comment) VALUES ('testfail@mail.com', 'transaction')");

$connection->commit();

$connection = null;