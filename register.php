<?php 
require 'Koneksi.php';

if( isset($_POST["register"]) ){

    if(register($_POST)>0){
        echo"<script>
            alert('user baru berhasil ditambahkan!';)
            </script>";
    }else{
        echo mysqli_error($conn);
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Buat Baru</title>
    <style>
      .bg{
      background-image: url(assets/img/bgobat2.jpg); 
      background-repeat: no-repeat; 
      background-attachment: fixed;
      background-position: center;
      background-size: 1280px 720px;
      }
    </style>
</head>
<body class="bg">
    <section>
        <div class="form-container">
            <h1 class="text-info">Register form</h1>
            <form action="" method="post">
                <div class="control">
                    <label for="username" class="text-info">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="control">
                    <label for="password" class="text-info">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="control">
                    <label for="password2" class="text-info">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2">
                </div>
                <div class="control">
                    <input type="submit" name="register" value="Buat baru">
                </div>
            </form>
            <div class="link1">
                <a href="login.php">Sudah punya akun? Kembali</a>
            </div>
        </div>
    </section>
</body>
</html>