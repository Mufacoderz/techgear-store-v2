<?php
session_start();
include '../../includes/meta.php';
include '../../includes/header.php';
?>

<main class="container-cart">
    <h1>Keranjang Belanja</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p class="empty-cart">Keranjang masih kosong.</p>
    <a href="product.php" class="btn-back">Kembali Belanja</a>
<?php else: ?>

<div class="table-wrapper">
<table>
<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$total = 0;
foreach ($_SESSION['cart'] as $id => $item):
    $subtotal = $item['price'] * $item['qty'];
    $total += $subtotal;
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($item['name']); ?></td>
    <td>Rp <?= number_format($item['price'],0,',','.'); ?></td>
    <td><?= $item['qty']; ?></td>
    <td>Rp <?= number_format($subtotal,0,',','.'); ?></td>
    <td>
        <a href="../../controllers/deleteFromCart.php?id=<?= $id; ?>">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <th colspan="4">Total</th>
    <th colspan="2">Rp <?= number_format($total,0,',','.'); ?></th>
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
