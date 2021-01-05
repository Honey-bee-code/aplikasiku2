<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id_barang = $_POST['id_post'];
$query  = "SELECT * FROM tabel_barang WHERE id_barang = ? ORDER BY id_barang DESC";
$beecode = $koneksi->prepare($query);
$beecode->bind_param('i', $id_barang);
$beecode->execute();
$hasil = $beecode->get_result();
while ($row = $hasil->fetch_assoc()) {
    $tampilkan['id_barang']     = $row["id_barang"];
    $tampilkan['nama_barang']   = $row["nama_barang"];
    $tampilkan['harga']         = $row["harga"];
    $tampilkan['jml_stok']      = $row["jml_stok"];
    $tampilkan['tgl_input']     = $row["tgl_input"];
}
echo json_encode($tampilkan);

$koneksi->close();
?>