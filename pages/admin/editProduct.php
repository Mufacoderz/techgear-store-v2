<?php require_once 'auto_guard.php'; ?>

<?php

include '../../config/koneksi.php';
$kategori = mysqli_query($conn, "SELECT * FROM categories");

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$produk = mysqli_fetch_assoc($query);



?>

<?php include 'metaAdmin.php'; ?>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">

        <div class="content-wrapper">
            <section class="cards-form">
                <div class=" form-container">

                    <h2>Edit Produk</h2>

                    <form action="../../controllers/updateProduct.php"
                        method="POST"
                        enctype="multipart/form-data"
                        class="product-form">

                        <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                        <input type="hidden" name="old_image" value="<?= $produk['image']; ?>">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="name" value="<?= $produk['name'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" name="price" value="<?= $produk['price'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" required>
                                <?php while ($row = mysqli_fetch_assoc($kategori)) { ?>
                                    <option value="<?= $row['id']; ?>"
                                        <?= ($row['id'] == $produk['category_id']) ? 'selected' : ''; ?>>
                                        <?= $row['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Gambar Produk (opsional)</label>
                            <input type="file" name="image" accept="image/*">
                            <small>Biarkan kosong jika tidak ingin mengganti</small>
                        </div>

                        <button type="submit" name="simpan" class="btn-submit">Simpan</button>
                    </form>

                </div>
            </section>
        </div>



        <?php include 'footerAdmin.php'; ?>