<?php
function aman($teks) {
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

function formatRupiah($angka) {
    return 'Rp ' . number_format(
        $angka,
        0,
        ',',
        '.'
    );
}

function kategoriTersedia($kategori, $daftarMenu) {
    if ($kategori == '') {
        return true;
    }

    foreach ($daftarMenu as $menu) {
        if ($menu['kategori'] == $kategori) {
            return true;
        }
    }

    return false;
}

function hitungSubtotal($keranjang, $daftarMenu) {
    $subtotal = 0;

    foreach ($keranjang as $kode => $jumlah) {
        foreach ($daftarMenu as $menu) {
            if ($menu['kode'] == $kode) {
                $subtotal += $menu['harga'] * $jumlah;
                break;
            }
        }
    }

    return $subtotal;
}

function hitungTotal($subtotal) {
    if ($subtotal >= 50000) {
        $diskon = $subtotal * 10 / 100;
    } else {
        $diskon = 0;
    }

    return $subtotal - $diskon;
}

function jumlahUnitKeranjang($keranjang) {
    $jumlah = 0;

    foreach ($keranjang as $qty) {
        $jumlah += $qty;
    }

    return $jumlah;
}
?>