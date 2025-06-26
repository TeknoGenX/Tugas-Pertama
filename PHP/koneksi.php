<?php
$host = "localhost";
$user = "ecomuser";
$pass = "passwordku";
$db = "ecommerce";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
