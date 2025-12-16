<?php

include __DIR__ . "/../config/koneksi.php";

$query = "
    SELECT products.*, categories.name AS category_name
    FROM products
    LEFT JOIN categories ON products.category_id = categories.id
    ORDER BY products.id ASC
";

$result = mysqli_query($conn, $query);

// List kategori
$lists = [
    "Keyboard" => [],
    "Mouse" => [],
    "Monitor" => [],
    "Headphone" => [],
    "Desk" => [],
    "Chair" => [],
    "Other" => []
];

// Masukkan produk ke kategori masing-masing
while ($row = mysqli_fetch_assoc($result)) {
    $cat = ucfirst($row['category_name']);

    if (!isset($lists[$cat])) {
        $lists[$cat] = [];
    }
    $lists[$cat][] = $row;
}

// Render produk admin
function renderItems($items, $id, $title)
{
    echo "<h2>$title</h2>";
    echo "<div id='$id' class='product-container'>";

    foreach ($items as $p) {

        // image sudah path final di DB: /uploads/products/xxx.webp
        $imageFull = "../.." . $p['image'];

        echo "
        <div class='admin-product-card' data-aos='fade-left'>
            <img src='$imageFull' alt='{$p['name']}'>

            <div class='admin-product-info'>
                <h3>{$p['name']}</h3>
                <p class='price'>Rp " . number_format($p['price'], 0, ',', '.') . "</p>
            </div>

            <div class='button'>
                <a class='edit' href='editProduct.php?id={$p['id']}'>
                    <i class='fa-solid fa-pen'></i>
                </a>

                <a class='delete' 
                    href='../../controllers/deleteProduct.php?id={$p['id']}'
                    onclick=\"return confirm('Hapus produk ini?')\">
                    <i class='fa-solid fa-trash'></i>
                </a>
            </div>
        </div>
        ";
    }

    echo "</div>";
}

?>

<section class="list-product-section">

    <?php
    renderItems($lists["Keyboard"], "keyboard-list", "Keyboard");
    renderItems($lists["Mouse"], "mouse-list", "Mouse");
    renderItems($lists["Monitor"], "monitor-list", "Monitor");
    renderItems($lists["Headphone"], "headphone-list", "Headphone");
    renderItems($lists["Desk"], "desk-list", "Desk");
    renderItems($lists["Chair"], "chair-list", "Chair");
    renderItems($lists["Other"], "accessories-list", "Other");
    ?>

    <a href="#top"><i class="fa-solid fa-arrow-up"></i></a>
</section>
