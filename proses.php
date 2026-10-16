<?php
session_start();

require_once __DIR__ . '/data/menu.php';
require_once __DIR__ . '/includes/fungsi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

$aksi = isset($_POST['aksi']) ? $_POST['aksi'] : '';

if ($aksi == 'tambah') {
    $kode = isset($_POST['kode']) ? $_POST['kode'] : '';
    $inputJumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';

    if ($inputJumlah === '') {
    $_SESSION['flash'] = 'Jumlah pesanan wajib diisi.';
    header('Location: index.php');
    exit;
}

if (!preg_match('/^[0-9]+$/', (string) $inputJumlah)) {
    $_SESSION['flash'] = 'Jumlah harus berupa bilangan bulat.';
    header('Location: index.php');
    exit;
}
    $jumlah = (int) $inputJumlah;

    if ($jumlah < 1 || $jumlah > 10) {
        $_SESSION['flash'] = 'Jumlah pesanan harus antara 1 sampai 10.';
        header('Location: index.php');
        exit;
    }

    $menuDitemukan = false;

    foreach ($daftarMenu as $menu) {
        if ($menu['kode'] == $kode) {
            $menuDitemukan = true;
            break;
        }
    }

    if (!$menuDitemukan) {
        $_SESSION['flash'] = 'Kode menu tidak terdaftar.';
        header('Location: index.php');
        exit;
    }

    $jumlahLama = isset($_SESSION['keranjang'][$kode])
        ? $_SESSION['keranjang'][$kode] : 0;

    if ($jumlahLama + $jumlah > 10) {
        $_SESSION['flash'] =
            'Gagal! Maksimal 10 item untuk satu jenis menu. Keranjang tidak berubah.';
        header('Location: index.php');
        exit;
    }

    $_SESSION['keranjang'][$kode] = $jumlahLama + $jumlah;
    $_SESSION['flash'] = 'Menu berhasil ditambahkan ke keranjang.';

    header('Location: keranjang.php');
    exit;
}

if ($aksi == 'hapus') {
    $kode = isset($_POST['kode']) ? $_POST['kode'] : '';

    if (isset($_SESSION['keranjang'][$kode])) {
        unset($_SESSION['keranjang'][$kode]);
        $_SESSION['flash'] = 'Menu berhasil dihapus.';
    } else {
        $_SESSION['flash'] = 'Menu tidak ditemukan dalam keranjang.';
    }

    header('Location: keranjang.php');
    exit;
}

if ($aksi == 'kosongkan') {
    $_SESSION['keranjang'] = array();
    $_SESSION['flash'] = 'Keranjang berhasil dikosongkan.';

    header('Location: keranjang.php');
    exit;
}

if ($aksi == 'favorit') {
    $kategori = isset($_POST['kategori'])
        ? $_POST['kategori'] : '';

    if ($kategori == '' ||
        !kategoriTersedia($kategori, $daftarMenu)) {
        $_SESSION['flash'] = 'Kategori favorit tidak valid.';
        header('Location: index.php');
        exit;
    }

    setcookie(
        'kategori_favorit',
        $kategori,
        time() + (7 * 24 * 60 * 60),
        '/'
    );

    $_SESSION['flash'] = 'Kategori favorit tersimpan selama 7 hari.';
    header('Location: index.php');
    exit;
}

$_SESSION['flash'] = 'Aksi tidak dikenal.';
header('Location: index.php');
exit;
?>