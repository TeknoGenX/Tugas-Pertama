<?php
$koneksi = new mysqli("localhost", "root", "", "ecommerce");

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO products (nama, harga, deskripsi, stok)
        VALUES ('$nama', '$harga', '$deskripsi', '$stok')";

if ($koneksi->query($sql) === TRUE) {
    echo "Produk berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
