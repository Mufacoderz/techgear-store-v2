<?php
session_start();

$id    = $_POST['id'];
$name  = $_POST['name'];
$price = $_POST['price'];

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
        'name'  => $name,
        'price' => $price,
        'qty'   => 1
    ];
} else {
    $_SESSION['cart'][$id]['qty']++;
}

header("Location: ../pages/public/keranjang.php");
exit;
