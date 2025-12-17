<?php require_once 'checkSession.php'; ?>
<?php
include '../../config/koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: pesanan.php");
    exit;
}

$id = (int) $_GET['id'];

/* ambil data pesanan */
$order = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE id = $id"
);

$data = mysqli_fetch_assoc($order);

if (!$data) {
    header("Location: pesanan.php");
    exit;
}

/* ambil item pesanan */
$items = mysqli_query(
    $conn,
    "SELECT * FROM order_items WHERE order_id = $id"
);
?>

<?php include 'metaAdmin.php'; ?>

<body>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="content-wrapper">

        <header>
            <h1>Detail Pesanan</h1>
        </header>

        <div class="order-info">
            <p><strong>Nama:</strong> <?= htmlspecialchars($data['customer_name']); ?></p>
            <p><strong>No HP:</strong> <?= htmlspecialchars($data['phone']); ?></p>
            <p><strong>Alamat:</strong> <?= htmlspecialchars($data['address']); ?></p>
            <p><strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($data['created_at'])); ?></p>
        </div>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>

                <?php
                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_assoc($items)):
                    $subtotal = $row['price'] * $row['qty'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['product_name']); ?></td>
                    <td>Rp <?= number_format($row['price'],0,',','.'); ?></td>
                    <td><?= $row['qty']; ?></td>
                    <td>Rp <?= number_format($subtotal,0,',','.'); ?></td>
                </tr>
                <?php endwhile; ?>

                <tr>
                    <th colspan="4" style="text-align:right;">Total</th>
                    <th>Rp <?= number_format($total,0,',','.'); ?></th>
                </tr>
            </table>
        </div>

        <div class="cart-action">
            <a href="manajemenPesanan.php" class="btn-back">Kembali</a>
        </div>

    </div>



<?php include 'footerAdmin.php'; ?>

