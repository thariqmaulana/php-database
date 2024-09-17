<?php

/*
Jadi tidak perlu diiterasi. dia hanya akan mengembalikan data pertama yang ditemukan
2nd fetch akan mengambil data ke 2
Jadi seperti di next
returnnya adalah array rownya
ketika sudah tidak ada data maka akan return FALSE
fetchall untuk mengambil semua data
*/

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "thariq";
$password = "thariq123";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?;";
$statement = $connection->prepare($sql);
$statement->execute([$username, $password]);

if ($row = $statement->fetch()) {
  echo "Sukses Login : {$row['username']}" . PHP_EOL;
} else {
  echo "Gagal Login" . PHP_EOL;
}

$connection = null;