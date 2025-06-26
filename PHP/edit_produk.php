<?php
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nama = $data['nama'];
$harga = $data['harga'];
$stok = $data['stok'];
$deskripsi = $data['deskripsi'];

$sql = "UPDATE produk SET nama=?, harga=?, stok=?, deskripsi=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdssi", $nama, $harga, $stok, $deskripsi, $id);
$stmt->execute();

echo json_encode(["status" => "success"]);
?>
