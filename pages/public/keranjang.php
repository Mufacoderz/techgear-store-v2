<?php
session_start();
include '../../includes/meta.php';
include '../../includes/header.php';
?>

<main class="container-cart">
    <h1>Keranjang Belanja</h1>

<!-- jika kosog  -->
<?php if (empty($_SESSION['cart'])): ?>
    <p class="empty-cart">Keranjang masih kosong.</p>
    <a href="product.php" class="btn-back">Kembali Belanja</a>

<!-- jika gk kosong -->
<?php else: ?>

<div class="table-wrapper">
<table>
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
        <a href="../../controllers/deleteFromCart.php?id=<?= $id; ?>"
            onclick="return confirm('Hapus produk ini?')">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <th colspan="4" style="text-align:right;">Total</th>
    <th>Rp <?= number_format($total,0,',','.'); ?></th>
</tr>
</table>
</div>

<div class="cart-action">
    <a href="product.php" class="btn-back">Lanjut Belanja</a>
    <a href="checkout.php" class="btn-checkout">Checkout</a>
</div>

<?php endif; ?>
</main>

<?php include '../../includes/footer.php'; ?>
