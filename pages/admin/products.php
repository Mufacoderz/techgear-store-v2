<?php
session_start();
include '../../config/koneksi.php';  // koneksi DB
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href="../../assets/css/adminStyles.css">
    <link rel="stylesheet" href="../../assets/css/product.css">
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <?php include 'sidebar.php'; ?>
        <?php include __DIR__ . '/../../includes/listProducts.php'; ?>
    </div>
    <script src="/projek-uas/assets/js/data.js"></script>
    <script src="/projek-uas/assets/js/script.js"></script>
</body>

</html>