<?php
session_start();
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
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../assets/css/adminStyles.css">
</head>

<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">User</a></li>
            <li><a href="#">Berita</a></li>
            <li><a href="#">Galeri</a></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!</h1>
            <p>Anda sedang berada di halaman dashboard utama.</p>
            <!-- <button>☰ Menu</button> -->
        </header>

        <section class="cards">
            <div class="card">
                <h3>Total Pengguna</h3>
                <p>120</p>
            </div>
            <div class="card">
                <h3>Total Berita</h3>
                <p>45</p>
            </div>
            <div class="card">
                <h3>Total Galeri</h3>
                <p>82</p>
            </div>

        </section>
    </div>