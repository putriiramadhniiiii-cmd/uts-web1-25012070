<?php
session_start();

require_once __DIR__ . '/data/menu.php';
require_once __DIR__ . '/includes/fungsi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

$pencarian = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$kategori = isset($_GET['kategori']) ? trim($_GET['kategori']) : '';

if ($kategori != '' && !kategoriTersedia($kategori, $daftarMenu)) {
    $kategori = '';
}

if ($kategori == '' && isset($_COOKIE['kategori_favorit'])) {
    $cookieKategori = $_COOKIE['kategori_favorit'];

    if (kategoriTersedia($cookieKategori, $daftarMenu)) {
        $kategori = $cookieKategori;
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <h2>Selamat Datang di Kantin Kampus!</h2>
    <p>Pilih makanan dan minuman favoritmu.</p>
</section>

<section class="panel">
    <h2>Cari Menu</h2>

    <form method="GET" action="index.php" class="form-cari">
        <input type="text" name="cari"
            placeholder="Cari nama menu..."
            value="<?php echo aman($pencarian); ?>">

        <select name="kategori">
            <option value="">Semua Kategori</option>
            <?php
            $kategoriPilihan = array(
                'Makanan', 'Camilan', 'Minuman'
            );

            foreach ($kategoriPilihan as $pilihan) {
                $selected = ($kategori == $pilihan)
                    ? 'selected' : '';

                echo '<option value="' . aman($pilihan) . '" '
                    . $selected . '>'
                    . aman($pilihan) . '</option>';
            }
            ?>
        </select>

        <button type="submit">Cari</button>
        <a class="tombol tombol-abu" href="index.php">Reset</a>
    </form>

    <form method="POST" action="proses.php" class="favorit">
        <input type="hidden" name="aksi" value="favorit">

        <label>Favoritkan kategori:</label>
        <select name="kategori" required>
            <option value="">Pilih kategori</option>
            <option value="Makanan">Makanan</option>
            <option value="Camilan">Camilan</option>
            <option value="Minuman">Minuman</option>
        </select>

        <button type="submit">Simpan Favorit 7 Hari</button>
    </form>
</section>

<h2>Daftar Menu</h2>

<div class="menu-grid">
<?php
$jumlahHasil = 0;

foreach ($daftarMenu as $menu) {
    $cocokCari = ($pencarian == '')
        || (stripos($menu['nama'], $pencarian) !== false)
        || (stripos($menu['kode'], $pencarian) !== false);

    $cocokKategori = ($kategori == '')
        || ($menu['kategori'] == $kategori);

    if ($cocokCari && $cocokKategori) {
        $jumlahHasil++;
?>
    <div class="menu-card">
        <span class="kategori">
            <?php echo aman($menu['kategori']); ?>
        </span>

        <h3><?php echo aman($menu['nama']); ?></h3>
        <p>Kode: <?php echo aman($menu['kode']); ?></p>
        <p class="harga">
            <?php echo formatRupiah($menu['harga']); ?>
        </p>

        <form method="POST" action="proses.php">
            <input type="hidden" name="aksi" value="tambah">
            <input type="hidden" name="kode"
                value="<?php echo aman($menu['kode']); ?>">

            <label>Jumlah (1–10)</label>
            <input type="number" name="jumlah"
                 <input
    type="number"
    name="jumlah"
    min="1"
    max="10"
    value="1"
    required
>
            <button type="submit" class="tombol-penuh">
                + Tambah ke Keranjang
            </button>
        </form>
    </div>
<?php
    }
}

if ($jumlahHasil == 0) {
    echo '<p class="kosong">Menu tidak ditemukan. Coba kata kunci lain.</p>';
}
?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>