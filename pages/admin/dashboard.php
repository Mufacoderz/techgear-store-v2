<?php
require_once 'checkSession.php';
include '../../config/koneksi.php';

//total planggan
$totalCustomers = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(DISTINCT customer_name) AS total FROM orders"
    )
)['total'];

//total produk
$totalProducts = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM products")
)['total'];

//produk di pesan
$totalOrdered = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COALESCE(SUM(qty), 0) AS total FROM order_items"
    )
)['total'];

//prouk perkategori
$categoryCounts = [];

$catQuery = "
    SELECT categories.name AS category_name, COUNT(products.id) AS total
    FROM categories
    LEFT JOIN products ON products.category_id = categories.id
    GROUP BY categories.id
";
$catResult = mysqli_query($conn, $catQuery);

while ($row = mysqli_fetch_assoc($catResult)) {
    $categoryCounts[ucfirst($row['category_name'])] = $row['total'];
}
?>

<?php include 'metaAdmin.php'; ?>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="content-wrapper">

        <header class="dashboard-header">
            <h1>Halaman Dashboard</h1>
            <p>Selamat datang kembali, <strong><?= $_SESSION['nama_lengkap']; ?></strong></p>
        </header>

        <section class="cards">

            <div class="card">
                <h3>Total Pelanggan</h3>
                <p><?= $totalCustomers; ?></p>
                <span class="card-desc">Pelanggan terdaftar</span>
            </div>

            <div class="card">
                <h3>Total Produk</h3>
                <p><?= $totalProducts; ?></p>
                <span class="card-desc">Produk tersedia</span>
            </div>

            <div class="card">
                <h3>Produk Dipesan</h3>
                <p><?= $totalOrdered; ?></p>
                <span class="card-desc">Item dipesan</span>
            </div>

        </section>


        <section class="category-summary">
            <h3 class="section-title">Total Produk per Kategori</h3>

            <div class="category-cards">
                <?php
                $categories = ["Keyboard","Mouse","Monitor","Headphone","Desk","Chair","Other"];
                foreach ($categories as $cat):
                ?>
                    <div class="category-card">
                        <span><?= $cat; ?></span>
                        <strong><?= $categoryCounts[$cat] ?? 0; ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</div>

<?php include 'footerAdmin.php'; ?>
</body>
