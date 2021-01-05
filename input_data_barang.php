<?php
    include 'auth.php';
    session_start();

    // jika bukan admin, maka batal
    if ($_SESSION['level'] !== "admin") {
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
    <?php include 'navbar_admin.php'; ?>

    <div class="container-fluid">
        <h2 align="center">Input Data Barang</h2>
        <form method="post" class="form-data" id="form-data">
            <input type="hidden" name="id_barang" id="id_barang">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" required="true">
                        <p class="text-danger" id="err_nama_barang"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" required="true">
                        <p class="text-danger" id="err_harga"></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="text" name="jml_stok" id="jml_stok" class="form-control" required="true">
                        <p class="text-danger" id="err_jml_stok"></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input type="date" name="tgl_input" id="tgl_input" class="form-control" required="true">
                        <p class="text-danger" id="err_tgl_input"></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                Simpan
                </button>
            </div>
        </form>
        <hr>

        <div class="data-barang"></div>
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
        $('.data-barang').load("data_barang.php");

        $("#simpan").click(function() {
            var data_barang = $('.form-data').serialize();
            var nama_barang = document.getElementById("nama_barang").value;
            var harga = document.getElementById("harga").value;
            var jml_stok = document.getElementById("jml_stok").value;
            var tgl_input = document.getElementById("tgl_input").value;

            if (nama_barang == "") {
                document.getElementById("err_nama_barang").innerHTML = "Nama barang harus diisi";
            } else {
                document.getElementById("err_nama_barang").innerHTML = "";
            }
            if (harga == "") {
                document.getElementById("err_harga").innerHTML = "Harga barang harus diisi";
            } else {
                document.getElementById("err_harga").innerHTML = "";
            }
            if (jml_stok == "") {
                document.getElementById("err_jml_stok").innerHTML = "Jumlah Stok harus diisi";
            } else {
                document.getElementById("err_jml_stok").innerHTML = "";
            }
            if (tgl_input == "") {
                document.getElementById("err_tgl_input").innerHTML = "Tanggal input harus diisi";
            } else {
                document.getElementById("err_tgl_input").innerHTML = "";
            }

            if (nama_barang !="" && harga !="" && jml_stok !="" && tgl_input !="") {
                $.ajax({
                    type: 'POST',
                    url: "form_action.php",
                    data: data_barang,
                    success: function() {
                        $('.data-barang').load("data_barang.php");
                        document.getElementById("id_barang").value = "";
                        document.getElementById("form-data").reset();
                    }, error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
        });
    });
</script>
</body>
</html>