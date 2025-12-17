<?php require_once 'checkSession.php'; ?>
<?php

include '../../config/koneksi.php';
$id = $_SESSION['user_id'];

// ambil data admin
$query = mysqli_query($conn, "SELECT username, email, nama_lengkap FROM users WHERE id='$id' LIMIT 1");
$user = mysqli_fetch_assoc($query);
?>

<?php include 'metaAdmin.php'; ?>

<body>

<?php include 'sidebar.php'; ?>
<div class="main-content">
<div class="content-wrapper">
    <div class="profile-box">
    <h3>Profile Admin</h3>

    <form method="POST" action="../../controllers/updateAdmin.php">
        <label>Username</label>
        <input type="text" name="username" value="<?= $user['username']; ?>" required>

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>

        <label>Email</label>
        <input type="email" value="<?= $user['email']; ?>" disabled>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</div>
</div>

<?php include 'footerAdmin.php'; ?>



