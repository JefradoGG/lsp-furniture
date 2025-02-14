<?php
    include "datadummy.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Awal Navbar -->
    <nav class="navbar bg-success navbar-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="#">Furniture</a>
            
            <ul class="navbar-nav d-flex flex-row gap-4">
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Home</a> <!-- Menu Home -->
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="transaksi.php">Transaksi</a> <!-- Menu Transaksi -->
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="#">Logout</a> <!-- Menu Logout -->
                </li>
            </ul>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Hero Section (Bagian Pengenalan) -->
    <div class="mb-4 p-5 bg-success-subtle">
        <div class="container-fluid row">
            <div class="col">
                <img src="./img/furniture.jpg" alt="logo" class="img-fluid mx-auto d-block">
            </div>
        </div>
    </div>
    <!-- Akhir Hero Section -->

    <!-- Bagian Daftar Produk -->
    <div class="container mb-5" id="daftar-travel">
        <h2 class="text-center text-success fw-bold mb-5">Daftar Produk Furniture</h2>
        <div class="row">
            <?php
                foreach($datafurniture as $furniture => $data){
            ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <img src="./img/<?= $data[3] ?>" alt="gambar" class="img-fluid mb-3">
                        <h5 class="card-title fw-bold"><?= $data[0] ?></h5>
                        <p class="card-text"><?= $data[1] ?></p>
                        <p class="card-text">Rp <?= number_format($data[2], 0, ',', '.') ?></p>
                        <a href="transaksi.php?id=<?= $furniture ?>" class="btn btn-success">Pilih Produk</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Akhir Daftar Travel -->

    <!-- Menyertakan file JavaScript Bootstrap untuk fungsi-fungsi interaktif -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>