<?php
include '../config/koneksi.php';

if (isset($_GET['proses'])) {
    $id = (int) $_GET['proses'];
    mysqli_query(
        $conn,
        "UPDATE orders SET status='processing' WHERE id=$id"
    );
}

if (isset($_GET['selesai'])) {
    $id = (int) $_GET['selesai'];
    mysqli_query(
        $conn,
        "UPDATE orders SET status='completed' WHERE id=$id"
    );
}

if (isset($_GET['arsip'])) {
    $id = (int) $_GET['arsip'];
    mysqli_query(
        $conn,
        "UPDATE orders SET status='archived' WHERE id=$id"
    );
}

header("Location: ../pages/admin/manajemenPesanan.php");
exit;
