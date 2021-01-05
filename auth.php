<?php
// membuat token keamanan ajax request
session_start();
if (empty($_SESSION['csrf_token']))
{
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// cek login user jika ada tambahkan di bawah ini

?>