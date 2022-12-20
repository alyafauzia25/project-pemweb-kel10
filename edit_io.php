<?php
  session_start();
  if (!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
  }
  require 'Koneksi.php';
  //ngambil id
  $id_obat= $_GET["id"];

  $obat=query("SELECT * FROM informasi_obat WHERE id_obat='$id_obat'")[0];
  //var_dump($obat["nama_obat"]);

if (isset($_POST["submit"])){
  if(ubah_io($_POST)>0){
    echo"<script>
         alert('Data gagal diupdate!');
         document.location.href= 'index.php#deskripsi_obat.php';
        </script>";
  }else{
    echo"<script>
         alert('Data berhasil diupdate!');
         document.location.href= 'index.php#deskripsi_obat.php';
         </script>";
  }
}  

?>

<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Apotik Aria</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/profil.css">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <style>
      .center {
      text-align: center; 
      }
      @media only screen and (min-width: 768px) {
      /*For  desktop: (ukuran layar lebih besar dari 768px)*/
      .col-1 {width: 8.33%;}
      .col-2 {width: 16.66%;}
      .col-3 {width: 25%;}
      .col-4 {width: 33%;}
      .col-5 {width: 41.66%;}
      .col-6 {width: 50%;}
      .col-7 {width: 58.33%;}
      .col-8 {width: 66.66%;}
      .col-9 {width: 75%;}
      .col-10 {width: 83.33%;}
      .col-11 {width: 91.66%;}
      .col-12 {width: 100%;} 
      .col-13 {width: 25%;}
      .col-17 {width: 27.5%}
      }
      .navbar{
      position: relative;
      display: block;
      width: 80%;
      border-radius: auto;
      text-align: center;
      margin: auto;
      margin-bottom: 0px;
      font-size: medium;
      }
      .bg{
      background-image: url(assets/img/bg.png); 
      background-repeat: no-repeat; 
      background-attachment: fixed;
      background-position: center;
      background-size: 1280px 720px;
      }
    </style>
  </head>
  <body class="bg">
      <div style="padding-right:25%; padding-top:0.4%;">
      <div class="card">
        <div class="card-header text-center"><h2>Edit Deskripsi Obat</h2>
        </div>
        <div class="card-body">
          <form method="post" action="">
          <tr>
          <input type="hidden" name="id" value="<?= $obat["id_obat"]; ?>">
            <div style="width:100%;" class="row">
            <div class="mb-3" style="width: 100%;">
                <label for="nama_obat" class="form-label">Nama Obat:</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $obat["nama_obat"]; ?>" required>
              </div>
              <hr class="border-2 opacity-50 border-dark">
              <div class="mb-3" style="width: 100%;">
                <label for="link" class="form-label">Link Foto Obat:</label>
                <input type="text" class="form-control" id="link" name="link" value="<?= $obat["link"]; ?>" required>
              </div>
              <hr class="border-2 opacity-50 border-dark">
              <div class="mb-3" style="width: 100%;">
                <label for="khasiat" class="form-label">Obat Untuk :</label>
                <input type="text" class="form-control" name="khasiat" id="khasiat" value="<?= $obat["khasiat"]; ?>" required>
              </div>
              <hr class="border-2 opacity-50 border-dark">
              <div class="mb-3" style="width: 100%;">
                <label for="deskripsi" class="form-label">Deskripsi Obat :</label>
                <textarea type="textarea" class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder><?= $obat["deskripsi"]; ?></textarea>
              </div>
              <hr class="border-2 opacity-50 border-dark">
              <div class="mb-3" style="width: 100%;">
                <label for="aturan_pakai" class="form-label">Aturan Pakai :</label>
                <textarea type="textarea" class="form-control" id="aturan_pakai" name="aturan_pakai" rows="5" placeholder><?= $obat["aturan_pakai"]; ?></textarea>
              </div>
              <p></p>
              <hr class="border-2 opacity-50 border-dark">
              <div style="padding: 2%; width: 100%;" class=" justify-content-md-between">
            <a class="btn btn-primary" href="index.php#deskripsi_obat">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary"> Edit!</button>
          </div>
          </form>
        </div>
      </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>