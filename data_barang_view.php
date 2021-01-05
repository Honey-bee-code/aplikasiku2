<?php
session_start();
if ($_SESSION['level'] !== "admin" && $_SESSION['level'] !== "kasir") {
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
        </tr>

        <?php
                }
            } else { ?>
        <tr>
            <td colspan='6'>Tidak ada data ditemukan !</td>
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


</script>