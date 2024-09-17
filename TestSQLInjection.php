<?php

require __DIR__ . "/GetConnection.php";

$connection = getConnection();

// misal adalah input dari form
$username = $connection->quote("admin'; #"); // tanpa # sudah bisa
$password = $connection->quote("admin");
// $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
$sql = "SELECT * FROM admin WHERE username = $username AND password = $password;";

// jadi setelah # itu dianggap komentar
// jadi dimanipulasi dengan ;(akhir statement) dan '(untuk akhir string)

$statement = $connection->query($sql);

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

// solusinya jangan membuat query dengan substitusi secara bulat-bulat
// query dan exec tidak bisa menangani karakter mencurigakan secara otomatis
// kalau tidak butuh input user tidak mengapa menggunakan query dan exec

// cara Penggunaan quote adalah langsung di variabel
// tidak direkomendasikan menggunakan quote. khawatir lupa
// lebih baik menggunakan prepare