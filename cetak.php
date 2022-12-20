<?php 
session_start();
if (!isset($_SESSION['login'])){
  header("location:login.php");
  exit;
}
include 'Koneksi.php';

//menampilkan
$obat=query("SELECT *FROM data_obat ");
//tombol cari ditekan
if (isset($_POST["cari"])){
  $obat= cari_do($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <title>APOTIK ARIA</title>
    <link href="main_nf.css" rel="stylesheet"/>
    <style>
      @media print {
        .out{
          display: none;
        }
      }
    </style>
  </head>
  <body>
  <div class="col-12 deafult-header" >
      <nav class="navbar sticky-top" >
        <div class="container-fluid col-12">
          <img src="assets/img/apotik.png" style=" width: 20%; padding-left: 5%;" class="col-3"/>
          <div class="text-dark navbar-brand" style="padding-right: 30%; padding-top: 1%; size: 5%; font-size: 30px;">
            <h2>DATA OBAT</h2>
            <h3>APOTIK ARIA</h3>
          </div>
        </div>
      </nav>
    </div>
    <!--tampilan awal index-->
    <div style=" padding-left: 7%; padding-right: 7%;">
    <br>
    <table class="table table-bordered p-2 mb-2 border-dark text-center " border="0" width="100%" >
      <tr>
        <th>#</th>
        <th >Nama Obat</th>
        <th >Merek</th>
        <th >Stok</th>
        <th >Harga</th>
      </tr>
      <?php

      //buat perulangan untuk input tabel dimulai dari nomor1
      $no = 1;
      foreach($obat as $row):
        //menampilkan data ke dalam tabel
        echo "<tr>";
        echo "<td>$no</td>"; 
        echo "<td>$row[nama_obat]</td>";
        echo "<td>$row[merek]</td>";
        echo "<td>$row[stok_obat]</td>";
        echo "<td>Rp.$row[harga_obat]</td>";
        $no++; // menambah nilai nomor urut
      endforeach;
      ?>
    </table>
    </div>
    <script>window.print()</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>