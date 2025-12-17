<?php
require_once '../pages/admin/checkSession.php';
include '../config/koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../pages/admin/manajemenPesanan.php");
    exit;
}

$order_id = (int) $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM order_items WHERE order_id = $order_id"
);

mysqli_query(
    $conn,
    "DELETE FROM orders WHERE id = $order_id"
);

header("Location: ../pages/admin/manajemenPesanan.php");
exit;
