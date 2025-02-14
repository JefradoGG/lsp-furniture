<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">

                <form action="login_proses.php" method="POST">
                    
                    <div class="mb-3">
                        <img src="./img/furniture.jpg" alt="logo" 
                            class="img-thumbnail rounded mx-auto d-block w-50 bg-white">
                    </div>

                    <div class="mb-5">
                        <h2 class="fw-bold text-center">Selamat Datang di furniture</h2>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" name="login" class="btn btn-secondary fw-bold">Login</button>

                </form>

            </div>
        </div>
    </div>

    <!-- Memuat JavaScript Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
