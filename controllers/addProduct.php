<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/koneksi.php';

$kategori = mysqli_query($conn, "SELECT * FROM categories");

if (isset($_POST['simpan'])) {

    $name        = mysqli_real_escape_string($conn, $_POST['name']);
    $price       = mysqli_real_escape_string($conn, $_POST['price']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);



    // opload foto
    $foto = $_FILES['image']['name'];
    $tmp      = $_FILES['image']['tmp_name'];
    $folder = "../uploads/products/";

    // nama file unik
    $fotoBaru = uniqid() . "_" . $foto;

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("Error upload file: " . $_FILES['image']['error']);
}

    // upload file
    if (!move_uploaded_file($tmp, $folder . $fotoBaru)) {
        die("Upload gambar gagal!");
    }

    $publicPath = "/uploads/products/" . $fotoBaru;


    $query = "
        INSERT INTO products (name, price, image, category_id)
        VALUES ('$name', '$price', '$publicPath', '$category_id')
    ";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Produk berhasil ditambahkan!');
                window.location='../pages/admin/manajemenProduct.php';
            </script>";
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}
?>
