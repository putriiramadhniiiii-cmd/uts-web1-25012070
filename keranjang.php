<?php
session_start();

require_once __DIR__ . '/data/menu.php';
require_once __DIR__ . '/includes/fungsi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

$keranjang = $_SESSION['keranjang'];
$subtotal = hitungSubtotal($keranjang, $daftarMenu);
$total = hitungTotal($subtotal);
$diskon = $subtotal - $total;

require_once __DIR__ . '/includes/header.php';
?>

<h2>Keranjang Belanja</h2>

<?php if (count($keranjang) == 0) { ?>
    <div class="kosong">
        Keranjang masih kosong.
        <p><a href="index.php">Pilih menu sekarang</a></p>
    </div>
<?php } else { ?>

<div class="table-wrap">
<table>
    <thead>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($keranjang as $kode => $jumlah) {
        foreach ($daftarMenu as $menu) {
            if ($menu['kode'] == $kode) {
                $totalItem = $menu['harga'] * $jumlah;
    ?>
        <tr>
            <td><?php echo aman($menu['nama']); ?></td>
            <td><?php echo formatRupiah($menu['harga']); ?></td>
            <td><?php echo (int) $jumlah; ?></td>
            <td><?php echo formatRupiah($totalItem); ?></td>
            <td>
                <form method="POST" action="proses.php">
                    <input type="hidden" name="aksi" value="hapus">
                    <input type="hidden" name="kode"
                        value="<?php echo aman($kode); ?>">
                    <button type="submit" class="tombol-hapus">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    <?php
                break;
            }
        }
    }
    ?>
    </tbody>
</table>
</div>

<div class="ringkasan">
    <p>Subtotal: <strong><?php echo formatRupiah($subtotal); ?></strong></p>
    <p>Diskon: <strong><?php echo formatRupiah($diskon); ?></strong></p>
    <h3>Total Bayar: <?php echo formatRupiah($total); ?></h3>

    <?php if ($subtotal >= 50000) { ?>
        <p class="diskon">Selamat! Kamu mendapatkan diskon 10%.</p>
    <?php } else { ?>
        <p>Diskon 10% berlaku untuk subtotal minimal Rp 50.000.</p>
    <?php } ?>

    <form method="POST" action="proses.php"
        onsubmit="return confirm('Yakin ingin mengosongkan keranjang?');">
        <input type="hidden" name="aksi" value="kosongkan">
        <button type="submit" class="tombol-hapus">
            Kosongkan Keranjang
        </button>
    </form>

    <a href="index.php" class="tombol">+ Tambah Menu Lagi</a>
</div>

<?php } ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>