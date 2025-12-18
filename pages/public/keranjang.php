<?php
session_start();
include '../../includes/meta.php';
include '../../includes/header.php';
?>

<main class="cart-container">
    <h1 class="cart-title">Keranjang Belanja</h1>



<?php if (empty($_SESSION['cart'])): ?>
    <p class="cart-empty">Keranjang masih kosong.</p>
    <a href="product.php" class="cart-btn">Kembali Belanja</a>
<?php else: ?>

<div class="cart-table-wrapper">
<table class="cart-table">
<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$total = 0;
foreach ($_SESSION['cart'] as $id => $item):
$total += $item['price'] * $item['qty'];
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($item['name']); ?></td>
    <td>Rp <?= number_format($item['price'],0,',','.'); ?></td>
    <td><?= $item['qty']; ?></td>
    <td>
        <a class="cart-delete"
            href="../../controllers/deleteFromCart.php?id=<?= $id; ?>"
            onclick="return confirm('Hapus produk ini?')">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
</tr>
<?php endforeach; ?>

<tr class="cart-total">
    <th colspan="4">Total</th>
    <th>Rp <?= number_format($total,0,',','.'); ?></th>
</tr>
</table>
</div>

<div class="cart-action">
    <a href="product.php" class="cart-back">Lanjut Belanja</a>
    <a href="checkout.php" class="cart-checkout">Checkout</a>
</div>

<?php endif; ?>
</main>


<?php include '../../includes/footer.php'; ?>
