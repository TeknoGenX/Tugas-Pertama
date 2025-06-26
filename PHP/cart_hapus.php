<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$id_hapus = $data['id_produk'];

if (isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array_filter($_SESSION['cart'], function($id) use ($id_hapus) {
    return $id != $id_hapus;
  });
}

echo json_encode(["status" => "removed"]);
?>
