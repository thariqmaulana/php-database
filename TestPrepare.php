<?php

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = :username AND password = :gakharussama;";
$statement = $connection->prepare($sql);
/* binding parameter
nanti secara otomatis di quote oleh prepare
*/
$statement->bindParam("username", $username);
$statement->bindParam("gakharussama", $password);
$statement->execute();
// semua hasilnya disimpan di statement

$success = false;
$find_user = null;

foreach ($statement as $row) {
  $success = true;
  $find_user = $row['username'];
}

if ($success) {
  echo "Sukses Login : $find_user" . PHP_EOL;
} else {
  echo "Gagal Login" . PHP_EOL;
}


$connection = null;