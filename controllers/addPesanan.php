<?php
session_start();
include '../config/koneksi.php';

if (empty($_SESSION['cart'])) {
    header("Location: ../pages/public/keranjang.php");
    exit;
}

$name    = mysqli_real_escape_string($conn, $_POST['name']);
$phone   = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['qty'];
}

// simpan ke orders
mysqli_query($conn, "
    INSERT INTO orders (customer_name, phone, address, total)
    VALUES ('$name', '$phone', '$address', '$total')
");

$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $item) {
    mysqli_query($conn, "
        INSERT INTO order_items (order_id, product_name, price, qty)
        VALUES (
            '$order_id',
            '{$item['name']}',
            '{$item['price']}',
            '{$item['qty']}'
        )
    ");
}

unset($_SESSION['cart']);

header("Location: ../pages/public/product.php?success=1");
exit;
