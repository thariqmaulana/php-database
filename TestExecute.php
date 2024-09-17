<?php

require __DIR__ . "/GetConnection.php";

$connection = getConnection();

$sql = <<<MULTILINE
  INSERT INTO customers(id, name, email)
  VALUE ('thariq', 'Thariq', 'thariq@mail.com');
MULTILINE;

$sql2 = <<<SQL
  INSERT INTO customers(id, name, email)
  VALUE ('said', 'Said', 'said@mail.com');
SQL;

$connection->exec($sql);
$connection->exec($sql2);

$connection = null;