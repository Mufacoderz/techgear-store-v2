<?php
session_start();
include '../../includes/meta.php';
include '../../includes/header.php';

if (empty($_SESSION['cart'])) {
    header("Location: keranjang.php");
    exit;
}
?>

<main class="container-cart">
<h1>Checkout</h1>

<form action="../../controllers/addPesanan.php" method="POST" class="checkout-form">
    <input type="text" name="name" placeholder="Nama Lengkap" required>
    <input type="text" name="phone" placeholder="No HP" required>
    <textarea name="address" placeholder="Alamat Lengkap" required></textarea>

    <button type="submit" class="btn-checkout">Konfirmasi Pesanan</button>
    <a href="keranjang.php" class="btn-back">Kembali</a>
</form>
</main>

<?php include '../../includes/footer.php'; ?>
