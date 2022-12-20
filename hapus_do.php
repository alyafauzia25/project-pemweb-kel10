<?php

  session_start();
  if (!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
  }

  include("Koneksi.php");
  //mengecek apakah di url ada GET id
  $id=$_GET["id"];
  if (hapus_do($id)>0){
    echo"<script>
          alert('Data berhasil dihapus!');
          document.location.href= 'index.php?#info_obat.php';
          </script>";
  }else{
    echo"<script>
          alert('Data gagal dihapus!');
          document.location.href= 'index.php?#info_obat.php';
          </script>";
  }
?>