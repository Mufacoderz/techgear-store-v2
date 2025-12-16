<?php
include __DIR__ . "/../config/koneksi.php";

$id_produk = $_POST['id'] ?? null;


if (isset($_POST['simpan'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $query = "
        UPDATE products
        SET 
            name = '$name',
            price = '$price',
            category_id = '$category_id'
        WHERE id = '$id_produk'
    ";

    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/admin/manajemenProduct.php');
        exit();
    } else {
        echo "Gagal Mengupdate Data: " . mysqli_error($conn);
    }
}
