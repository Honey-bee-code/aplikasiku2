<?php
session_start();

    if ($_SESSION['level'] !== "admin") {
        header("location: index.php?pesan=gagal");
    }
?>
<table id="tblBarang" class="table table-striped table-bordered" style="width: 100%">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Barang</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Jumlah Stok</td>
            <td>Tanggal Input</td>
            <td>Opsi</td>
        </tr>
    </thead>
    <tbody>

        <?php
            include 'koneksi.php';
            function rp($angka) {
                $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                return $hasil_rupiah;
            }
            $no=1;
            $query = "SELECT * FROM tabel_barang ORDER BY id_barang DESC";
            $beecode = $koneksi ->prepare($query);
            $beecode -> execute();
            $hasil = $beecode->get_result();

            if ($hasil-> num_rows > 0) {
                while ($row = $hasil->fetch_assoc()){
                    $id_barang = $row['id_barang'];
                    $nama_barang = $row['nama_barang'];
                    $harga = $row['harga'];
                    $jml_stok = $row['jml_stok'];
                    $tgl_input = $row['tgl_input'];
        ?>

        <tr>
            <td style="text-align: center"><?php echo $no++; ?></td>
            <td style="text-align: right"><?php echo $id_barang; ?></td>
            <td><?php echo $nama_barang; ?></td>
            <td style="text-align: right;"><?php echo rp($harga); ?></td>
            <td style="text-align: right;"><?php echo $jml_stok; ?></td>
            <td style="text-align: right"><?php echo $tgl_input; ?></td>
            <td>
                <button id="<?php echo $id_barang; ?>" class="btn btn-success btn-sm edit_data" style="width: 80px;">Edit</button>
                <button id="<?php echo $id_barang; ?>" class="btn btn-danger btn-sm hapus_data" style="width: 80px;">Hapus</button>
            </td>
        </tr>

        <?php
                }
            } else { ?>
        <tr>
            <td colspan='7'>Tidak ada data ditemukan !</td>
        </tr>
        <?php
         }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tblBarang').DataTable();
    });

    function reset() {
        document.getElementById("err_nama_barang").innerHTML = "";
        document.getElementById("err_harga").innerHTML = "";
        document.getElementById("err_jml_stok").innerHTML = "";
        document.getElementById("err_tgl_input").innerHTML = "";
    }

    $(document).on('click', '.edit_data', function(){
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        var id_button = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "get_data.php",
            data: {id_post:id_button},
            dataType: 'json',
            success: function(response) {
                reset();
                $('html, body').animate({ scrollTop: 30}, 'fast');
                document.getElementById("id_barang").value = response.id_barang;
                document.getElementById("nama_barang").value = response.nama_barang;
                document.getElementById("harga").value = response.harga;
                document.getElementById("jml_stok").value = response.jml_stok;
                document.getElementById("tgl_input").value = response.tgl_input;
            }, error: function(response){
                console.log(response.responseText);
            }
        });
    });

    $(document).on('click', '.hapus_data', function() {
        var id_button = $(this).attr('id')
        $.ajax({
            type: 'POST',
            url: "hapus_data.php",
            data: {id_post:id_button},
            success: function() {
                $('.data-barang').load("data_barang.php");
            }, error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>