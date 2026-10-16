<?php
if (isset($_SESSION['flash'])) {
    $pesanFlash = $_SESSION['flash'];
    unset($_SESSION['flash']);
} else {
    $pesanFlash = '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kantin Kampus</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="header">
    <h1>Kantin Kampus</h1>
    <p>Sistem Pemesanan Makanan dan Minuman</p>

    <nav>
        <a href="index.php">Daftar Menu</a>
        <a href="keranjang.php">Keranjang</a>
    </nav>
</header>

<main class="container">
<?php if ($pesanFlash != '') { ?>
    <div class="pesan">
        <?php echo aman($pesanFlash); ?>
    </div>
<?php } ?>