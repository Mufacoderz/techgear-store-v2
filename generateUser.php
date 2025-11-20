<?php 
include 'config/koneksi.php';

    $username = "admin";
    $email = "admin@admin.com";
    $password = password_hash("123456", PASSWORD_DEFAULT);
    $nama_lengkap = "Administrator";

    $query = "
        INSERT INTO users (username, email, password, nama_lengkap) 
        VALUES ('$username', '$email','$password', '$nama_lengkap')
        ";

    if(mysqli_query($conn, $query)){
        echo 'Akun admin telah tersedia';
    } else{
        echo 'Gagal membuat akun'. mysqli_error($conn);
    }



?>