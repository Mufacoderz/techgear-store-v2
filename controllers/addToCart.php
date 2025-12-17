<?php
session_start();
include __DIR__ . '/../config/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: ../pages/public/product.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT id, name, price FROM products WHERE id = $id"
);

$product = mysqli_fetch_assoc($query);

if (!$product) {
    header("Location: ../pages/public/product.php");
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// tmbh ke kerannjang
if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
        'name'  => $product['name'],
        'price' => $product['price'],
        'qty'   => 1
    ];
} else {
    $_SESSION['cart'][$id]['qty']++;
}

header("Location: ../pages/public/keranjang.php");
exit;
