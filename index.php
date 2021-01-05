<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="jumbotron">
        <h1 style="text-align: center;">Selamat Datang di AplikasiKu</h1>
    </div>
    <?php
    if (isset($_GET['pesan'])) {
        if($_GET['pesan'] == 'gagal') {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="container-sm">
            <p><center><h3>Silahkan Masuk</h3></center></p>
                <form class="form-group" action="login_cek.php" method="post">
                    <div class="form-group">
                        <label for="inputUser">Username</label>
                        <input type="text" name="username" class="form-control" id="inputUser" placeholder="Username ..." required="required">
                    </div>
                    <div class="form-group">
                        <label for="inputPass">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPass" placeholder="Password ..." required="required">
                    </div>
                    <input type="submit" class="btn btn-primary" value="LOGIN">
                    <hr>
                    <div class="text-center">                
                        <small>Lupa user dan password, contact me :  
                        <a href="https://api.whatsapp.com/send? phone=6285237585803"> Kaligrafi Lombok</a></small> 
                    </div>                
                </form>
            </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery.js"></script>
</body>
</html>