<?php

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "thariq";
$password = "thariq123";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?;";
$statement = $connection->prepare($sql);
/* binding parameter
nanti secara otomatis di quote oleh prepare
*/
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
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