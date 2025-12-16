<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {

    $id = $_SESSION['user_id'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);

    $query = "
        UPDATE users 
        SET username='$username', nama_lengkap='$nama'
        WHERE id='$id'
    ";

    if (mysqli_query($conn, $query)) {

        $_SESSION['nama_lengkap'] = $nama;
        $_SESSION['username'] = $username;

        echo "<script>
        alert('Profile berhasil diperbarui');
        window.location='../pages/admin/profileAdmin.php';
    </script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
