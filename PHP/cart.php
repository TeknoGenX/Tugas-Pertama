<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id_produk'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$_SESSION['cart'][] = $id;

echo json_encode(["status" => "added", "cart" => $_SESSION['cart']]);
?>
