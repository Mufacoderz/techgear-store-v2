<?php require_once 'auto_guard.php'; ?>

<?php
include '../../config/koneksi.php';
?>

<?php include 'metaAdmin.php'; ?>



<body>
    <?php include 'sidebar.php'; ?>

    <!-- buat popup berhasul dan gagal hpus produk -->

    <?php if (isset($_GET['status'])): ?>

        <?php if ($_GET['status'] == 'error'): ?>
            <script>
                alert("Gagal menghapus produk!");
            </script>
        <?php endif; ?>

    <?php endif; ?>



    <div class="main-content" id="top">
        <div class="content-wrapper">
            <div class="add-product">
            <h3>Tambah produk</h3>
            <a class="add-product-btn" href="/projek-uas/pages/admin/tambahProduct.php">
                <p>+</p>
            </a>
        </div>


        <div class="categories">
            <h3>Kategori Produk</h3>
            <div class="categories-list">
                <a href="#keyboard-list" class="list-category">Keyboard</a>
                <a href="#mouse-list" class="list-category">Mouse</a>
                <a href="#monitor-list" class="list-category">Monitor</a>
                <a href="#headphone-list" class="list-category">Headphone</a>
                <a href="#desk-list" class="list-category">Meja</a>
                <a href="#chair-list" class="list-category">Kursi</a>
                <a href="#accessories-list" class="list-category">Lainnya</a>
            </div>
        </div>

            <?php include __DIR__ . '/../../controllers/getProductsAdmin.php'; ?>


        </div>
        <?php include 'footerAdmin.php'; ?>
