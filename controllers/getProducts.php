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

// Render produk
function renderItems($items, $id, $title)
{
    echo "<h2>$title</h2>";
    echo "<div id='$id' class='product-container'>";

    foreach ($items as $p) {

        $imageFull = "../.." . $p['image'];

        echo "
            <div class='product-card' data-aos='fade-up'>
                <img src='{$imageFull}' alt='{$p['name']}'>
                <h3>{$p['name']}</h3>
                <p>Rp " . number_format($p['price'], 0, ',', '.') . "</p>
                
                <a href='../../controllers/addToCart.php?id={$p['id']}' class='cart-btn'>
                    Add to Cart
                </a>
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

<a href="#top"><i class="fa-solid fa-arrow-up scroll-top"></i></a>
</section>
