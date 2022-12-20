<?php 
include 'Koneksi.php';


//pagination
$data_perhalaman=5;
$jumlah_data= count(query("SELECT * FROM data_obat"));
$jumlah_halaman = ceil($jumlah_data / $data_perhalaman);
$halaman_aktif = (isset($_GET['halaman']))? $_GET['halaman']:1;
$data_awal = ($data_perhalaman * $halaman_aktif) - $data_perhalaman;
//halaman aktof =2, awal data=2


//menampilkan
$obat=query("SELECT *FROM data_obat");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <title>APOTIK UHUY</title>
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
    <h3 class="text-center" style="padding:2%;">DATA OBAT</h3>
    <!--tampilan awal index-->
    <div style="padding-top: 2%; padding-left: 7%; padding-right: 4%;">
    <a href="input_do.php" class="out">Tambah Obat</a>
    <br></br>
    <form action="" method="post" class="out">
      <input type="text" name="keyword" size="40" placeholder="Masukkan yang mau dicari" autocomplete="off" autofocus>
      <button type="submit" name="cari" >Cari</button>
    </form>
    <br>
    <table class="table table-bordered border-dark text-center " border="1" width="100%" cellpadding="5" cellspacing="0">
      <tr>
        <th>#</th>
        <th >Nama Obat</th>
        <th >Merek</th>
        <th >Stok</th>
        <th >Harga</th>
        <th class="out">Aksi</th>
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
        echo "<td>Rp$row[harga_obat]</td>";

        // membuat link untuk mengedit dan menghapus data
        echo '<td class="out">
          <a href="edit_do.php?id='.$row['id_obat'].'" class="btn btn-primary bi bi-pencil-square"></a>
          <a href="hapus_do.php?id='.$row['id_obat'].'" class="btn btn-primary bi bi-trash"
      		  onclick="return confirm(\'Anda yakin akan menghapus data?\')"></a>
        </td>';
        echo "</tr>";
        $no++; // menambah nilai nomor urut
      endforeach;
      ?>
    </table>
    <div class="out">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item">
            <?php if($halaman_aktif>1) :?>
            <a class="page-link" href="?halaman=<?= $halaman_aktif-1; ?>"aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
            <?php endif; ?>
          </li>
          <?php for($no=1; $no <= $jumlah_halaman; $no++):?>
            <?php if($no==$halaman_aktif): ?>
              <li class="page-item"><a class="page-link" href="?halaman=<?= $no;?>" style="font-weight:bold;"><?= $no; ?> </a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link" href="?halaman=<?= $no;?>"> <?= $no; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>
          <li class="page-item">
          <?php if($halaman_aktif<$jumlah_halaman) :?>
            <a class="page-link" href="?halaman=<?= $halaman_aktif+1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          <?php endif; ?>
          </li>
        </ul>
      </nav>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>