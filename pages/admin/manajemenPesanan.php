<?php require_once 'checkSession.php'; ?>
<?php require_once '../../config/koneksi.php'; ?>
<?php include 'metaAdmin.php'; ?>

<?php
// get pesanan
$pending = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE status='pending' ORDER BY created_at ASC"
);

$processing = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE status='processing' ORDER BY created_at ASC"
);

$completed = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE status='completed' ORDER BY created_at ASC"
);

$archived = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE status='archived' ORDER BY created_at ASC"
);
?>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="content-wrapper">

    <!-- pemding -->
            <h2>Pesanan Masuk</h2>
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
                    if ($pending && mysqli_num_rows($pending) > 0):
                        while ($p = mysqli_fetch_assoc($pending)):
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
                                        <i class="fa-solid fa-circle-info"></i> Detail
                                    </a>

                                    <a class="action-btn process"
                                        href="../../controllers/updatePesanan.php?proses=<?= $p['id']; ?>"
                                        onclick="return confirm('Proses pesanan ini?')">
                                        <i class="fa-solid fa-play"></i> Proses
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="6" class="empty-data">Belum ada pesanan masuk</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

            <!-- proses -->
            <h2>Diproses</h2>
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
                    if ($processing && mysqli_num_rows($processing) > 0):
                        while ($p = mysqli_fetch_assoc($processing)):
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
                                        <i class="fa-solid fa-circle-info"></i> Detail
                                    </a>

                                    <a class="action-btn done"
                                        href="../../controllers/updatePesanan.php?selesai=<?= $p['id']; ?>"
                                        onclick="return confirm('Selesaikan pesanan ini?')">
                                        <i class="fa-solid fa-check"></i> Selesai
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="6" class="empty-data">Belum ada pesanan diproses</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>


        <!-- done -->
            <h2>Selesai</h2>
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
                    if ($completed && mysqli_num_rows($completed) > 0):
                        while ($p = mysqli_fetch_assoc($completed)):
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
                                        <i class="fa-solid fa-circle-info"></i> Detail
                                    </a>

                                    <a class="action-btn arsip"
                                        href="../../controllers/updatePesanan.php?arsip=<?= $p['id']; ?>"
                                        onclick="return confirm('Arsipkan pesanan ini?')">
                                        <i class="fa-solid fa-box-archive"></i> Arsipkan
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="6" class="empty-data">Belum ada pesanan selesai</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>



<!-- arsip -->
            <h2 class="archive-title">Riwayat Pesanan</h2>
            <div class="archive-wrapper">

                <?php
                if ($archived && mysqli_num_rows($archived) > 0):
                    while ($a = mysqli_fetch_assoc($archived)):
                ?>
                        <div class="archive-card">
                            <div class="archive-header">
                                <div>
                                    <div class="archive-name"><?= htmlspecialchars($a['customer_name']); ?></div>
                                    <div class="archive-date"><?= date('d M Y', strtotime($a['created_at'])); ?></div>
                                </div>
                            </div>

                            <div class="archive-body">
                                <div>No HP: <?= htmlspecialchars($a['phone']); ?></div>
                                <div>Total: Rp <?= number_format($a['total'], 0, ',', '.'); ?></div>
                            </div>

                            <div class="archive-badge">ARSIP</div>
                        </div>
                    <?php endwhile;
                else: ?>
                    <p class="archive-empty">Belum ada arsip pesanan</p>
                <?php endif; ?>

            </div>

        </div>
    </div>

    <?php include 'footerAdmin.php'; ?>
</body>