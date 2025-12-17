<?php
include __DIR__ . "/../config/koneksi.php";

if (isset($_POST['simpan'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $old_image = $_POST['old_image'];

    $folder = "../uploads/products/";

    // bawaannya pakai gambar lama
    $publicPath = $old_image;


    if (!empty($_FILES['image']['name'])) {

        $foto = $_FILES['image']['name'];
        $tmp  = $_FILES['image']['tmp_name'];

        $fotoBaru = uniqid() . "_" . $foto;

        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            die("Error upload file: " . $_FILES['image']['error']);
        }

        if (!move_uploaded_file($tmp, $folder . $fotoBaru)) {
            die("Upload gambar gagal!");
        }
        // hapus gambar lama
        if (!empty($old_image)) {
            $oldFile = ".." . $old_image;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $publicPath = "/uploads/products/" . $fotoBaru;
    }


    $query = "
        UPDATE products SET
            name = '$name',
            price = '$price',
            image = '$publicPath',
            category_id = '$category_id'
        WHERE id = '$id'
    ";

    if (mysqli_query($conn, $query)) {
        header('Location: ../pages/admin/manajemenProduct.php');
        exit();
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
