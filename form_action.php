<?php
session_start();

include 'koneksi.php';
include 'csrf.php';

$id_barang = stripslashes(strip_tags(htmlspecialchars($_POST['id_barang'], ENT_QUOTES)));
$nama_barang = stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'], ENT_QUOTES)));
$harga = stripslashes(strip_tags(htmlspecialchars($_POST['harga'], ENT_QUOTES)));
$jml_stok = stripslashes(strip_tags(htmlspecialchars($_POST['jml_stok'], ENT_QUOTES)));
$tgl_input = stripslashes(strip_tags(htmlspecialchars($_POST['tgl_input'], ENT_QUOTES)));

if($id_barang == ""){
    $query = "INSERT into tabel_barang (nama_barang, harga, jml_stok, tgl_input) VALUES (?, ?, ?, ?)";
    $beecode = $koneksi -> prepare($query);
    $beecode -> bind_param("ssss", $nama_barang, $harga, $jml_stok, $tgl_input);
    $beecode -> execute();
} else {
    $query = "UPDATE tabel_barang SET nama_barang=?, harga=?, jml_stok=?, tgl_input=? WHERE id_barang=?";
    $beecode = $koneksi->prepare($query);
    $beecode->bind_param("ssssi", $nama_barang, $harga, $jml_stok, $tgl_input, $id_barang);
    $beecode->execute();
}

echo json_encode(['success' => 'Mantab, berhasil, sukses']);

$koneksi -> close();
?>