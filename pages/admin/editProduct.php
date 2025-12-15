<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../../config/koneksi.php';
$kategori = mysqli_query($conn, "SELECT * FROM categories");

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$produk = mysqli_fetch_assoc($query);



?>

<?php include 'metaAdmin.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="main-content">

    <section class="cards">
        <div class="card form-container">

            <h2>Edit Produk</h2>

            <form action="../../controllers/updateProduct.php" method="POST"  class="product-form">

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="name" value="<?= $produk['name'] ?>" placeholder="Masukkan nama produk" required>
                </div>

                <div class="form-group">
                    <label>Harga Produk</label>
                    <input type="number" name="price" value="<?= $produk['price'] ?>" placeholder="Masukkan harga tanpa titik" required>
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


                <button type="submit" name="simpan" class="btn-submit">Simpan</button>

            </form>
        </div>
    </section>

</div>



</body>

</html>