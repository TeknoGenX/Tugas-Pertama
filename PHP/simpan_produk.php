<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO produk (nama, harga, stok, deskripsi) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdis", $nama, $harga, $stok, $deskripsi);
$stmt->execute();

header("Location: ../HTML/Tugas_8.html");
exit();
?>
