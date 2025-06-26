<?php
session_start();
include 'koneksi.php';

$cart = $_SESSION['cart'] ?? [];

$produkList = [];
if (!empty($cart)) {
  $ids = implode(",", array_map("intval", $cart));
  $result = $conn->query("SELECT * FROM produk WHERE id IN ($ids)");

  while ($row = $result->fetch_assoc()) {
    $id_produk = $row['id'];
    $jumlah = array_count_values($cart)[$id_produk] ?? 1;
    $row['jumlah'] = $jumlah;
    $produkList[] = $row;
  }
}

echo json_encode($produkList);
?>
