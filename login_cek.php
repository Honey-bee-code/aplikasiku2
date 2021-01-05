<?php
session_start();
include 'koneksi.php';

$username = md5($_POST['username']);
$password = md5($_POST['password']);
// menyeleksi data user yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password ditemukan di database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    // jika login sebagai admin
    if ($data['level'] == "1") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = 'admin';
        $_SESSION['nama'] = $data['nama'];
        // alihkan ke halaman dashboard admin
        header("location: admin.php");
    }
    // jika login sebagai user
    elseif ($data['level'] == "2")
    {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = 'kasir';
        $_SESSION['nama'] = $data['nama'];
        // alihkan ke halaman dashboard admin
        header("location: kasir.php");
    }
    else
    {
        // alihkan ke halaman login
        header("location: index.php?pesan=gagal");
    }
}
else
{
    header("location: index.php?pesan=gagal");
}
?>
