<?php include '../../includes/meta.php'; ?>
<?php include '../../includes/headerSecond.php'; ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // start session hanya jika belum aktif
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<main id="product" class="container-product">
    <section class="hero-section">
        <div class="banner"></div>

        <div class="admin-card">
            <div class="admin-text">
                <h2>Halo, <?php echo $_SESSION['nama_lengkap']; ?>!</h2>
                <p>Selamat datang di halaman manajemen produk.</p>
            </div>
            <div class="admin-actions">
                <button class="btn-add">+ Tambah Produk</button>
            </div>
        </div>

        <div class="search">
            <input type="search" placeholder="Cari barang...">

            <div class="categories">
                <a href="#keyboard-list" class="list-category">Keyboard</a>
                <a href="#mouse-list" class="list-category">Mouse</a>
                <a href="#monitor-list" class="list-category">Monitor</a>
                <a href="#headphone-list" class="list-category">Headphone</a>
                <a href="#desk-list" class="list-category">Meja</a>
                <a href="#chair-list" class="list-category">Kursi</a>
                <a href="#accessories-list" class="list-category">Lainnya</a>
            </div>
            <div class="icon-category">
                <i class="fa-solid fa-chevron-down openCategory"></i>
                <i class="fa-solid fa-chevron-up closeCategory"></i>
            </div>
        </div>

    </section>

    <section class="list-product-section">
        <h2>Keyboard</h2>
        <div id="keyboard-list"></div>

        <h2>Mouse</h2>
        <div id="mouse-list"></div>

        <h2>Monitor</h2>
        <div id="monitor-list"></div>

        <h2>Headphone</h2>
        <div id="headphone-list"></div>

        <h2>Meja</h2>
        <div id="desk-list"></div>

        <h2>Kursi Gaming</h2>
        <div id="chair-list"></div>

        <h2>Aksesoris / Lainnya</h2>
        <div id="accessories-list"></div>

        <a href="#product"><i class="fa-solid fa-arrow-up"></i></a>

    </section>

</main>



<?php include '../../includes/footer.php'; ?>