<?php require_once 'auto_guard.php'; ?>

<?php
include '../../config/koneksi.php';

$testimoni = mysqli_query(
    $conn,
    "SELECT * FROM testimonials ORDER BY created_at ASC"
);

?>

<?php include 'metaAdmin.php'; ?>



<body>
    <?php include 'sidebar.php'; ?>
    <div class="main-content">
        <div class="content-wrapper">

            <header>
                <h1>Daftar Testimoni</h1>
            </header>


            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $no = 1;
                    if ($testimoni && mysqli_num_rows($testimoni) > 0) {
                        while ($t = mysqli_fetch_assoc($testimoni)) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($t['nama']); ?></td>
                                <td><?= htmlspecialchars($t['pesan']); ?></td>
                                <td><?= date('d M Y', strtotime($t['created_at'])); ?></td>
                                <td>
                                    <a class="action-btn"
                                        href="../../controllers/deleteTestimoni.php?id=<?= $t['id']; ?>"
                                        onclick="return confirm('Hapus testimoni ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5" class="empty-data">
                                Belum ada testimoni
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>


        </div>