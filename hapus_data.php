<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id_barang = $_POST['id_post'];

$query = "DELETE FROM tabel_barang WHERE id_barang=?";
$beecode = $koneksi -> prepare($query);
$beecode -> bind_param("i", $id_barang);
$beecode -> execute();

echo json_encode(['success' => 'Mantab, sukses hapus data']);

$koneksi -> close();

?>