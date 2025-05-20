<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO produk (nama, harga, stok, deskripsi) VALUES ('$nama', '$harga', '$stok', '$deskripsi')";
if (mysqli_query($conn, $sql)) {
    header("Location: ../Tugas_7.html"); // Redirect ke halaman utama
} else {
    echo "Gagal menyimpan produk: " . mysqli_error($conn);
}
?>
