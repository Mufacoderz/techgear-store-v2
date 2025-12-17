<?php
include '../config/koneksi.php'; // koneksi ke DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO messages (name, email, phone, message) 
              VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location='../pages/public/contact.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
