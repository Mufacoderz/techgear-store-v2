<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../admin/login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM testimonials WHERE id='$id'");

header("Location: ../pages/admin/testimoni.php");
exit();
