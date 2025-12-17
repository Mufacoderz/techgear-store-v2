<?php require_once 'checkSession.php'; ?>
<?php
include '../../config/koneksi.php';

$pesanan = mysqli_query(
    $conn,
    "SELECT * FROM orders ORDER BY created_at ASC"
);
?>

<?php include 'metaAdmin.php'; ?>

<body>
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="content-wrapper">

            <header>
                <h1>Daftar Pesanan</h1>
            </header>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $no = 1;
                    if ($pesanan && mysqli_num_rows($pesanan) > 0) {
                        while ($p = mysqli_fetch_assoc($pesanan)) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($p['customer_name']); ?></td>
                                <td><?= htmlspecialchars($p['phone']); ?></td>
                                <td>Rp <?= number_format($p['total'], 0, ',', '.'); ?></td>
                                <td><?= date('d M Y H:i', strtotime($p['created_at'])); ?></td>
                                <td>
                                    <a class="action-btn info"
                                        href="detailPesanan.php?id=<?= $p['id']; ?>">
                                        <i class="fa-solid fa-eye"></i>
                                        Detail
                                    </a>
                                    <a class="action-btn danger"
                                        href="../../controllers/deletePesanan.php?id=<?= $p['id']; ?>"
                                        onclick="return confirm('Hapus pesanan ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>

                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6" class="empty-data">
                                Belum ada pesanan masuk
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
<?php include 'footerAdmin.php'; ?>
