<?php
    include 'auth.php';
    session_start();

    // jika bukan admin, maka batal
    if ($_SESSION['level'] !== "admin" && $_SESSION['level'] !== "kasir") {
        header("location: index.php?pesan=gagal");
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
        <h2>Transaksi Penjualan</h2>

        <form method="post" class="form-jual" id="form-jual">
        <input type="hidden" name="id_jual" id="id_jual">

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="id_barang" id="id_barang" class="form-control" required="true">
                        <p class="text-danger" id="err_id_barang"></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Diskon (%)</label>
                        <input type="text" name="diskon" id="diskon" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="qty" id="qty" class="form-control" required="true">
                        <p class="text-danger" id="err_qty"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="text" name="jml_stok" id="jml_stok" class="form-control" >
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Harga Total</label>
                        <input type="text" name="harga_total" id="harga_total" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" name="tambah" id="tambah" class="btn btn-primary">
                Tambahkan
                </button>
            </div>
        </form>
        <hr>
        <div class="data-jual"></div>
    </div>
<hr class="my-4">

<div class="text-center">&copy
    <?php echo date('Y'); ?> Chat Me : 
    <a href="https://api.whatsapp.com/send? phone=6285237585803"> Kaligrafi Lombok</a>
</div>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    

</script>
</body>
</html>