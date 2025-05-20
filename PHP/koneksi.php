<?php
$host = "localhost"; // Ganti jika beda
$user = "phpmyadmin"; // Ganti jika beda
$pass = "@Sukaslamet123"; // Ganti jika ada password
$db = "Tugas7"; // Nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
