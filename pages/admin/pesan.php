<?php require_once 'checkSession.php'; ?>
<?php
include '../../config/koneksi.php';

$pesan = mysqli_query(
    $conn,
    "SELECT * FROM messages ORDER BY created_at ASC"
);
?>
<?php include 'metaAdmin.php'; ?>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="main-content">
        <div class="content-wrapper">

            <header>
                <h1>Pesan Masuk</h1>
            </header>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $no = 1;
                    if ($pesan && mysqli_num_rows($pesan) > 0) {
                        while ($p = mysqli_fetch_assoc($pesan)) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($p['name']); ?></td>
                                <td><?= htmlspecialchars($p['email']); ?></td>
                                <td><?= htmlspecialchars($p['phone']); ?></td>
                                <td><?= htmlspecialchars($p['message']); ?></td>
                                <td><?= date('d M Y', strtotime($p['created_at'])); ?></td>
                                <td>
                                    <a class="action-btn" href="deletePesan.php?id=<?= $p['id']; ?>" onclick="return confirm('Hapus pesan ini?')">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>

                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="empty-data">
                                Belum ada pesan masuk
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
    </div>
</body>