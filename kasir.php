<?php
    include 'auth.php';
    session_start();

    // jika bukan admin, maka batal
    if ($_SESSION['level'] !== "kasir") {
        header("location: index.php?pesan=gagal");
    } else {
        include 'koneksi.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Csrf Token -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AplikasiKu</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include 'navbar_kasir.php'; ?>
    <div class="jumbotron">
        <h1 align="center">Halo <b><?php echo $_SESSION['nama']; ?></b></h1>
        <hr>
        <h6 align="center">Anda telah masuk sebagai <b><?php echo $_SESSION['level'];?></b></a></h6>
    </div>
</body>
</html>