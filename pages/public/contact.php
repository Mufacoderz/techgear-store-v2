<?php include '../../includes/meta.php'; ?>
<?php include '../../includes/header.php'; ?>

<main class="container-contact">
    <section class="section-contact">
        <div class="get-in-touch">
            <h2>Hubungi Kami</h2>
            <p>Jangan ragu hubungi kami jika ada pertanyaan, keluhan atau hal lainnya</p>
            <div class="social-media">
                <p><i class="fa-brands fa-instagram"></i> @mufatechgear</p>
                <p><i class="fa-regular fa-envelope"></i> mufatechgear@gmail.com</p>
                <p><i class="fa-brands fa-whatsapp"></i> +62 857 5342 1213</p>
                <p><i class="fa-solid fa-location-dot"></i> Jln. Gerbang Dayaku, Kutai Kartanegara, Kalimantan Timur, Indonesia</p>
            </div>
        </div>
        <form action="../../includes/kirimPesan.php" method="POST">
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Nomor telepon" required>
            <textarea name="message" placeholder="Pesan" required></textarea>
            <button type="submit">Kirim</button>
        </form>

    </section>
</main>


<?php include '../../includes/footer.php'; ?>