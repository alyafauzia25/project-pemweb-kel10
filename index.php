<?php 
session_start();
if (!isset($_SESSION['login'])){
  $_SESSION['username'];
  header("location:login.php");
  exit;
}

include 'Koneksi.php';

//BAGIAN DESKRIPSI OBAT
//pagination deskripsi obat
$data_perhalaman_des=6;
$jumlah_data_des= count(query("SELECT * FROM data_obat"));
$jumlah_halaman_des = ceil($jumlah_data_des / $data_perhalaman_des);
$halaman_aktif_des = (isset($_GET['halamand']))? $_GET['halamand']:1;
$data_awal_des = ($data_perhalaman_des * $halaman_aktif_des) - $data_perhalaman_des;
//halaman aktof =2, awal data=2

//menampilkan deskripsi obat dengan tabel informasi_obat
$obatdes=query("SELECT *FROM informasi_obat LIMIT $data_awal_des, $data_perhalaman_des");
//tombol cari ditekan
if (isset($_POST["cari_des"])){
  $obatdes= cari_des($_POST["keyword_des"]);
  
}

//input deskripsi obat
if(isset($_POST["submit_des"])){
  // cek data udah dieditatau belum.
  if(input_des($_POST)>0){
    echo"<script>
        alert('Data berhasil ditambahkan!');
        document.location.href= 'index.php?halaman=$jumlah_halaman_des#deskripsi_obat';
        </script>";
  }else{
    echo"<script>
        alert('Data gagal ditambahkan!');
        document.location.href= 'index.php?halaman=$jumlah_halaman_des#deskripsi_obat';
        </script>";
  }

}


//BAGIAN INFORMASI DATA OBAT
//pagination
$data_perhalaman=5;
$jumlah_data= count(query("SELECT * FROM data_obat"));
$jumlah_halaman = ceil($jumlah_data / $data_perhalaman);
$halaman_aktif = (isset($_GET['halaman']))? $_GET['halaman']:1;
$data_awal = ($data_perhalaman * $halaman_aktif) - $data_perhalaman;
//halaman aktof =2, awal data=2


//menampilkan data obat dari tabel data obat
$obat=query("SELECT *FROM data_obat LIMIT $data_awal, $data_perhalaman");
//tombol cari ditekan
if (isset($_POST["cari"])){
  $obat= cari_do($_POST["keyword"]);
  
}

//input data obat
if(isset($_POST["submit_do"])){
  // cek data udah dieditatau belum.
  if(input_do($_POST)>0){
    echo"<script>
        alert('Data berhasil ditambahkan!');
        document.location.href= 'index.php?halaman=$jumlah_halaman#info_obat';
        </script>";
  }else{
    echo"<script>
        alert('Data gagal ditambahkan!');
        document.location.href= 'index.php?halaman=$jumlah_halaman#info_obat';
        </script>";
  }
}

// KELOMPOK 10 PEMROGRAMAN WEB
// APOTIK ARIA
// - AHMAD NURDIN       (3337210052)
// - ALYA FAUZIA AZIZAH (3337210054)
// - IRSYAD HADI ANNAFI (3337210034)
// - RIJAL FAUZI        (3337210003)
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>APOTIK ARIA</title>
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
        
    </head>
    <body id="page-top" style="background-color: #292930;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Apotik Aria</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/apotik.png" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#deskripsi_obat">Deskripsi Obat</a></li>
                    <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li> -->
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#info_obat">Data Obat</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Our Team</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Log Out</a></li>
                    
                    <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li> -->
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0"  >
            <!-- deskripsi obat-->
            <section class="resume-section" id="page-top">
                <div class="resume-section-content">
                    <h1 class="mb-0 text-white">
                        Apotik
                        <span class="text-info">ARIA</span>
                    </h1>
                  <br>
                  <!--SECTION DESKRIPSI OBAT-->
                  <section>
                    <p style="padding:2%;"></p>
                  <h2 class="mb-5 text-center text-light">Data Obat</h2>
                  <!--Tambah/Add Obat deskripsi obat-->
                  <div class="card" id="deskripsi_obat"> 
                    <div class="card-header text-dark bg-primary fw-bold">
                      <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#input_des">Tambah Obat</button>
                    </div>
                    <!--Modal Tambah/Add Obat deskripsi obat-->
                    <div class="modal fade" id="input_des" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="input_des">Input Obat</h1>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post">
                            <tr>
                              <div class="mb-3" style="width: 100%;">
                                <label for="exampleFormControlInput1" class="form-label dark">Link foto Obat</label>
                                <textarea type="textarea" class="form-control" id="link" name="link" rows="1" required></textarea>
                              </div>
                            </tr>
                            <hr class="border-2 opacity-75 border-dark">
                            <p></p>
                            <tr>
                              <div class="mb-3" style="width: 100%;">
                                <label for="exampleFormControlInput1" class="form-label dark">Nama Obat</label>
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" required></input>
                              </div>
                            </tr>
                            <hr class="border-2 opacity-75 border-dark">
                            <p></p>
                            <tr>
                              <div class="mb-3" style="width: 100%;">
                                <label for="exampleFormControlInput1" class="form-label">Khasiat</label>
                                <input type="text" class="form-control" id="khasiat" name="khasiat" required></input>
                              </div>
                            </tr>
                            <hr class="border-2 opacity-50 border-dark">
                            <p></p>
                            <tr>
                              <div class="mb-3" style="width: 100%;">
                                <label for="exampleFormControlInput1" class="form-label dark">Deskripsi</label>
                                <textarea type="textarea" class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                              </div>
                            </tr>
                            <hr class="border-2 opacity-75 border-dark">
                            <p></p>
                            <tr>
                              <div class="mb-3" style="width: 100%;">
                                <label for="exampleFormControlInput1" class="form-label dark">Aturan Pakai</label>
                                <textarea type="textarea" class="form-control" id="aturan_pakai" name="aturan_pakai" rows="5" required></textarea>
                              </div>
                            </tr>
                            <hr class="border-2 opacity-75 border-dark">
                            <p></p>
                            <button class="btn btn-info" type="submit" name="submit_des">Tambah</button>
                        </form>                              
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
                <!--Tabel Data Obat-->
                <div class="card-body">
                  <!--Searching/proses pencarian deskripsi obat-->
                <form action="" method="post" class="out">
                  <input type="text" name="keyword_des" size="40" placeholder="Masukkan yang mau dicari" autocomplete="off">
                  <button type="submit" name="cari_des" class="btn btn-primary">Cari</button>
                </form>
                </div>
            </div>
                <div class="row mt-4">
                <!-- perulangan card -->
                <?php foreach($obatdes as $row): ?>
                  <?php $nod=1 ?>
                    <!-- menampilkan perulangan card -->
                    <div class="col-md-4 mb-3">
                        <div class="card ">
                          <img src="<?php echo $row['link']?>" class="card-img-top" alt="icon" />
                          <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['nama_obat'] ?></h5>
                            <p class=" text-center">Obat <?php echo $row['khasiat'] ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail_<?php echo $row['id_obat']?>">
                             Detail
                            </button>
                          </div>
                        </div>
                      </div>
                      <!-- Modal card obat-->
                      <div class="modal fade" id="detail_<?php echo $row['id_obat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="detail_<?php echo $row['id_obat']?>"><?php echo $row['nama_obat'] ?></h1>
                              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                              <img style="width: 50% ;" src="<?php echo $row['link']?>" class="card-img-top" alt="icon" /> <br><br>
                              <p class="card-text">Deskripsi</p>
                              <p class="card-text" style="text-align: justify;">
                                <?php echo $row['deskripsi'] ?>
                                <br>
                              </p>
                              <p class="card-text">Aturan Pakai</p>
                              <p class="card-text" style="text-align: justify;">
                                <?php echo $row['aturan_pakai'] ?>
                                <br>
                              </p>                              
                            </div>
                            <div class="center" style="padding:2%; padding-left:35%;">
                              <?php //tombol edit dan hapus data
                              echo'<td >
                              <a href="edit_io.php?id='.$row['id_obat'].'" class="btn btn-primary bi bi-pencil-square"> Edit</a>
                              <a href="hapus_io.php?id='.$row['id_obat'].'"
                                onclick="return confirm(\'Anda yakin akan menghapus data?\')" class="btn btn-primary bi bi-trash3-fill"> Hapus</a>
                            </td>';
                              ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <!--Pagenation card yang dibagi menjadi 6 card-->
                    <div class="out">
                      <nav aria-label="Page navigation example" >
                        <ul class="pagination justify-content-center" style="padding-right: 4%;">
                          <li class="page-item">
                            <?php if($halaman_aktif_des>1) :?>
                            <a class="page-link btn-primary" href="?halamand=<?= $halaman_aktif_des-1; ?>#deskripsi_obat"aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                            <?php endif; ?>
                          </li>
                          <?php for($nod=1; $nod <= $jumlah_halaman_des; $nod++):?>
                            <?php if($nod==$halaman_aktif_des): ?>
                              <li class="page-item"><a class="page-link" href="?halamand=<?= $nod;?>#deskripsi_obat" style="font-weight:bold;"><?= $nod; ?> </a></li>
                            <?php else : ?>
                              <li class="page-item"><a class="page-link" href="?halamand=<?= $nod;?>#deskripsi_obat"> <?= $nod; ?></a></li>
                            <?php endif; ?>
                          <?php endfor; ?>
                          <li class="page-item">
                          <?php if($halaman_aktif_des<$jumlah_halaman_des) :?>
                            <a class="page-link" href="?halamand=<?= $halaman_aktif_des+1; ?>#deskripsi_obat" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          <?php endif; ?>
                          </li>
                        </ul>
                      </nav>
                      </div>
                      </section>
                      </section>
            <!-- List Data Obat-->
            <section class="resume-section" id="info_obat">
                <div class="resume-section-content">
                    <h2 class="mb-5 text-center text-light">Data Obat</h2>
                    <div class="card"> 
                        <div class="card-header text-dark bg-primary fw-bold">
                          <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#input_do">Tambah Obat</button>
                        </div>
                        <!--Modal Tambah/Add Obat-->
                        <div class="modal fade" id="input_do" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="input_do">Input Data Obat</h1>
                            </div>
                            <div class="modal-body">
                            <form action="" method="post">
                                <tr>
                                  <div class="mb-3" style="width: 100%;">
                                    <label for="exampleFormControlInput1" class="form-label dark">Nama Obat</label>
                                    <textarea type="textarea" class="form-control" id="nama_obat" name="nama_obat" rows="2" ></textarea>
                                  </div>
                                </tr>
                                <hr class="border-2 opacity-75 border-dark">
                                <p></p>
                                <tr>
                                  <div class="mb-3" style="width: 100%;">
                                    <label for="exampleFormControlInput1" class="form-label">Merek</label>
                                    <input type="text" class="form-control" id="merek" name="merek" required></input>
                                  </div>
                                </tr>
                                <hr class="border-2 opacity-50 border-dark">
                                <p></p>
                                <tr>
                                  <div class="mb-3" style="width: 100%;">
                                    <label for="exampleFormControlInput1" class="form-label dark">Stok Obat</label>
                                    <input type="text" class="form-control" id="stok_obat" name="stok_obat" required></input>
                                  </div>
                                </tr>
                                <hr class="border-2 opacity-75 border-dark">
                                <p></p>
                                <tr>
                                  <div class="mb-3" style="width: 100%;">
                                    <label for="exampleFormControlInput1" class="form-label dark">Harga Obat</label>
                                    <input type="text" class="form-control" id="harga_obat" name="harga_obat" required></input>
                                  </div>
                                </tr>
                                <hr class="border-2 opacity-50 border-dark">
                                <button class="btn btn-info" type="submit" name="submit_do">Tambah</button>
                            </form>                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>
                        <!--Tabel Data Obat-->
                        <div class="card-body">
                        <form action="" method="post" class="out">
                            <input type="text" name="keyword" size="40" placeholder="Masukkan yang mau dicari" autocomplete="off">
                            <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                          </form>
                            <table class="table">
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
                                echo '<td >
                                  <a href="edit_do.php?id='.$row['id_obat'].'" class="btn btn-primary bi bi-pencil-square"></a>
                                  <a href="hapus_do.php?id='.$row['id_obat'].'"
                                    onclick="return confirm(\'Anda yakin akan menghapus data?\')" class="btn btn-primary bi bi-trash3-fill"></a>
                                </td>';
                                echo "</tr>";
                                $no++; // menambah nilai nomor urut
                              endforeach;
                              ?>
                            </table>
                        </div>
                        <!--PAGINATION-->
                        <div class="out">
                            <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-center" style="padding-right: 4%;">
                              <div style="padding-left=2%";>
                              <a href="cetak.php" class="justify-content-center btn btn-primary"  target="_blank">CETAK</a>
                              </div>
                                <li class="page-item">
                                  <?php if($halaman_aktif>1) :?>
                                  <a class="page-link btn" href="?halaman=<?= $halaman_aktif-1; ?>#info_obat"aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                  <?php endif; ?>
                                </li>
                                <?php for($no=1; $no <= $jumlah_halaman; $no++):?>
                                  <?php if($no==$halaman_aktif): ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $no;?>#info_obat" style="font-weight:bold;"><?= $no; ?> </a></li>
                                  <?php else : ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $no;?>#info_obat"> <?= $no; ?></a></li>
                                  <?php endif; ?>
                                <?php endfor; ?>
                                <li class="page-item">
                                <?php if($halaman_aktif<$jumlah_halaman) :?>
                                  <a class="page-link" href="?halaman=<?= $halaman_aktif+1; ?>#info_obat" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                <?php endif; ?>
                                </li>
                              </ul>
                            </nav>
                            </div>
                    </div>
                          </div>
                    </div>
                </div>
                </div>
            </section>
            <!--SECTION TEAMS-->
            <section class="resume-section" id="team">
                <div class="resume-section-content">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col mt-5">
                                   <h2 class="text-light">OUR TEAMS!</h2>  
                                </div>
                            </div>
                            <!--rijal-->
                            <div class="row mt-5 text-center">
                                <div class="col-md-3 mb-3">
                                    <div class="kartu">
                                        <img src="assets/img/rijal.jpg" class="kartu-img-top" alt="rijal">
                                        <div class="kartu-body">
                                        <h5 class="kartu-title ">Rijal Fauzi</h5>
                                          <p class="kartu-text">Web Programming</p>
                                          <p class="kartu-text">3337210002</p>
                                          <a href="https://www.instagram.com/rijal_fauzi13/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="col- mt2 bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                          </svg></a> 
                                          <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-3 me-3 bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                          </svg></a>
                                          <a href=""> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                          </svg></a>
                                        </div>
                                      </div>
                                </div>
                                <!--ALYA-->
                                <div class="col-md-3 mb-3">
                                    <div class="kartu">
                                        <img src="assets/img/Alya Fauzia.jpg" class="kartu-img-top" alt="rijal">
                                        <div class="kartu-body">
                                        <h5 class="kartu-title ">Alya Fauzia</h5>
                                          <p class="kartu-text">Web Programming</p>
                                          <p class="kartu-text">3337210054</p>
                                          <a href="https://www.instagram.com/aylya_a/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" col- mt2 bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                          </svg></a> 
                                          <a href="https://web.facebook.com/campaign/landing.php?campaign_id=1654852700&extra_1=s%7Cc%7C318683836456%7Ce%7Cfacebook%20login%7C&placement&creative=318683836456&keyword=facebook%20login&partner_id=googlesem&extra_2=campaignid%3D1654852700%26adgroupid%3D63261960853%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D%26target%3D%26targetid%3Dkwd-1409285535%26loc_physical_ms%3D1007716%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=Cj0KCQiA4uCcBhDdARIsAH5jyUl_4ELfo6iBeOLTgIh8rEA_aywiBYnELmZAY193SgAs0VWstg-tsHUaAkw2EALw_wcB&_rdc=1&_rdr"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-3 me-3 bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                          </svg></a>
                                          <a href="https://github.com/alyafauzia25"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                          </svg></a>
                                        </div>
                                      </div>
                                </div>
                                <!--NURDIN-->
                                <div class="col-md-3 mb-3">
                                    <div class="kartu">
                                        <img src="assets/img/nurdin.jpg" class="kartu-img-top" alt="rijal">
                                        <div class="kartu-body">
                                        <h5 class="kartu-title ">Ahmad Nurdin</h5>
                                          <p class="kartu-text">Web Programming</p>
                                          <p class="kartu-text">3337210052</p>
                                          <a href="https://www.instagram.com/dinnurdin14/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" col- mt2 bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                          </svg></a> 
                                          <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook ms-3 me-3" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                          </svg>
                                          <a href="https://github.com/NurdinDin"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                          </svg></a>
                                        </div>
                                      </div>
                                </div>
                                <!--IRSYAD-->
                                <div class="col-md-3 mb-3">
                                    <div class="kartu">
                                        <img src="assets/img/irsyad.jpg" class="kartu-img-top" alt="rijal">
                                        <div class="kartu-body">
                                        <h5 class="kartu-title ">Irsyad Hadi</h5>
                                          <p class="kartu-text">Web Programming</p>
                                          <p class="kartu-text">3337210034</p>
                                          <a href="https://www.instagram.com/rijal_fauzi13/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" col- mt2 bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                          </svg></a> 
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-3 me-3 bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                          </svg>
                                          <a href=""> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                          </svg></a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </section>
          
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
