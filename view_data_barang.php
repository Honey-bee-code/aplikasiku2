<?php
    include 'auth.php';
    session_start();
    if ($_SESSION['level'] !== "admin" && $_SESSION['level'] !== "kasir") {
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
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php

    if ($_SESSION['level'] == "admin") {
       include 'navbar_admin.php';
    } else {
        include 'navbar_kasir.php';
    }

    ?>
    <div class="container-fluid">
        <h2 align="center">Data Barang</h2>
        <div class="data-barang-view"></div>
    </div>

<hr class="my-4">

<div class="text-center">&copy
    <?php echo date('Y'); ?> Chat Me : 
    <a href="https://api.whatsapp.com/send? phone=6285237585803"> Kaligrafi Lombok</a>
</div>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // kirim token keamanan
        $.ajaxSetup({
            headers : {
                'Csrf-Token' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.data-barang-view').load("data_barang_view.php");
    });
</script>
</body>
</html>