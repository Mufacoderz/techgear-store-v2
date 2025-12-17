<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: ../pages/admin/manajemenProduct.php?status=error");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// Ambl data imgnya
$get = mysqli_query($conn, "SELECT image FROM products WHERE id='$id' LIMIT 1");
$data = mysqli_fetch_assoc($get);

if ($data && !empty($data['image'])) {

    // image di DB
    $publicPath = $data['image'];

    // ubah ke path server
    $serverFile = ".." . $publicPath;

    // hapus file
    if (file_exists($serverFile)) {
        unlink($serverFile);
    }
}

// hapus di db
$query = "DELETE FROM products WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: ../pages/admin/manajemenProduct.php?status=success");
    exit();
} else {
    header("Location: ../pages/admin/manajemenProduct.php?status=error");
    exit();
}
