<?php
$id = $_GET['id'];

include "datadummy.php";

$tambahan = 0;
$totalharga = 0;
$pembayaran = 0;
$kembalian = 0;
$diskonText = "Tidak ada diskon";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notransaksi = $_POST['notransaksi'] ?? "";
    $namacustomer = $_POST['namacustomer'] ?? "";
    $tanggal = $_POST['tanggal'] ?? "";
    $voucher = $_POST['voucher'] ?? "";

    $tambahan = isset($_POST['tambahan']) ? (int) $_POST['tambahan'] : 0;
    $pembayaran = (int) ($_POST['pembayaran'] ?? 0);
    $harga = (int) ($_POST['harga'] ?? 0);
    $jumlah = (int) ($_POST['jumlah'] ?? 0);
    $totalharga = (int) ($_POST['totalharga'] ?? 0);

    if (isset($_POST['hitung'])) {
        $subtotal = $harga * $jumlah;
        if ($voucher === "FURNITUREMERDEKA") {
            $totalharga = $subtotal * 0.85; // Diskon 15%
            $diskonText = "Diskon 15%";
        } elseif ($voucher === "FURNITUREJAYA") {
            $totalharga = $subtotal * 0.80; // Diskon 20%
            $diskonText = "Diskon 20%";
        } elseif ($voucher === "FURNITUREMAS") {
            $totalharga = $subtotal * 0.75; // Diskon 25%
            $diskonText = "Diskon 25%";
        } else {
            $totalharga = $subtotal; // Tidak ada diskon
        }
        $totalharga += $tambahan;
    }

    if (isset($_POST['hitungkembalian'])) {
        if ($pembayaran < $totalharga) {
            echo "<script>alert('Pembayaran tidak boleh kurang dari total harga!');</script>";
        } else {
            $kembalian = $pembayaran - $totalharga;
        }
    }

    if (isset($_POST['simpan'])) {
        echo "<script>alert('Transaksi berhasil disimpan'); window.location.href = 'beranda.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar bg-success navbar-success shadow">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Furniture</a>
            <ul class="navbar-nav d-flex flex-row gap-4">
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="beranda.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <h2 class="text-center text-success fw-bold">TRANSAKSI</h2>
                            <div class="mb-3">
                                <label class="form-label">No Transaksi</label>
                                <input type="text" class="form-control" name="notransaksi">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="namacustomer">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Produk</label>
                                <input type="text" class="form-control" value="<?= $datafurniture[$id][0] ?>" name="pilih" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Produk</label>
                                <input type="text" class="form-control" value="<?= $datafurniture[$id][2] ?>" name="harga" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Voucher</label>
                                <input type="text" class="form-control" name="voucher">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jasa Antar</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="0" <?= $tambahan == 0 ? 'checked' : "" ?> >
                                    <label class="form-check-label">Tidak Diantar - 0</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="500000" <?= $tambahan == 500000 ? 'checked' : "" ?> >
                                    <label class="form-check-label">Diantar - 500.000</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mb-3 mt-3" name="hitung">Hitung Total</button>
                            <div class="mb-3">
                                <label class="form-label">Diskon</label>
                                <input type="text" class="form-control" name="diskon" value="<?= $diskonText ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="totalharga" value="<?= $totalharga ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pembayaran</label>
                                <input type="text" class="form-control" name="pembayaran" value="<?= $pembayaran ?>">
                            </div>
                            <button type="submit" class="btn btn-success mb-3 mt-3" name="hitungkembalian">Hitung Kembalian</button>
                            <div class="mb-3">
                                <label class="form-label">Kembalian</label>
                                <input type="text" class="form-control" name="kembalian" value="<?= $kembalian ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-success mb-3 mt-3" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>

<!-- Tantangan -->
<!-- Membuat diskon 3 dengan voucher juga -->