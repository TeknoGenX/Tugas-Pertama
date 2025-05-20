<?php
include 'koneksi.php';

$kategori = $_GET['kategori'] ?? 'all';
$query = "SELECT * FROM produk";

if ($kategori != 'all') {
    $query .= " WHERE kategori = '$kategori'";
}

$result = mysqli_query($conn, $query);
$produk = [];

while ($row = mysqli_fetch_assoc($result)) {
    $produk[] = $row;
}

header('Content-Type: application/json');
echo json_encode($produk);
?>
