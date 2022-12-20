<?php
  //akun sql/xampp
  $host = "sql204.epizy.com";
  $user = "epiz_33221554";
  $pass = "JmQvuS2n9oE";
  $db = "epiz_33221554_ppemweb";
  $conn= mysqli_connect($host,$user,$pass,$db);
  //periksa koneksi, tampilkan pesan kesalahan jika gagal

function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
  }
  return $rows;
}

//input tabel data obat
function input_do($data){
  global $conn;

  //mengambil data tiap variabel
  $nama_obat= htmlspecialchars($data["nama_obat"]);
  $merek= htmlspecialchars($data["merek"]);
  $stok_obat=htmlspecialchars((float)$data["stok_obat"]);
  $harga_obat=htmlspecialchars($data["harga_obat"]);

  //query insert data
  $query= "INSERT INTO data_obat VALUES ('', '$nama_obat', '$merek', '$stok_obat', '$harga_obat')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//input tabel informasi obat
function input_des($data){
  global $conn;

  //mengambil data tiap variabel
  $link= htmlspecialchars($data["link"]);
  $nama_obat= htmlspecialchars($data["nama_obat"]);
  $khasiat= htmlspecialchars($data["khasiat"]);
  $deskripsi=htmlspecialchars($data["deskripsi"]);
  $aturan_pakai=htmlspecialchars($data["aturan_pakai"]);

  //query insert data
  $query= "INSERT INTO informasi_obat VALUES ('', '$link', '$nama_obat', '$khasiat', '$deskripsi', '$aturan_pakai')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapus_do($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM data_obat WHERE id_obat='$id'");
  return mysqli_affected_rows($conn);
}

function hapus_io($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM informasi_obat WHERE id_obat='$id'");
  return mysqli_affected_rows($conn);
}


//Edit Data Obat
function ubah_do($data){
  global $conn;

  //mengambil data tiap variabel
  $id=$data["id"];
  $nama_obat= htmlspecialchars($data["nama_obat"]);
  $merek= htmlspecialchars($data["merek"]);
  $stok_obat=htmlspecialchars((float)$data["stok_obat"]);
  $harga_obat=htmlspecialchars($data["harga_obat"]);

  //query insert data
  $query= "UPDATE data_obat SET
            nama_obat='$nama_obat', 
            merek = '$merek',
            stok_obat = '$stok_obat', 
            harga_obat = '$harga_obat' 
            WHERE id_obat='$id'";
  mysqli_query($conn, $query);
}

//Edit Informasi Obat
function ubah_io($data){
  global $conn;

  //mengambil data tiap variabel
  $id=$data["id"];
  $nama_obat= htmlspecialchars($data["nama_obat"]);
  $link= htmlspecialchars($data["link"]);
  $khasiat= htmlspecialchars($data["khasiat"]);
  $deskripsi=htmlspecialchars($data["deskripsi"]);
  $aturan_pakai=htmlspecialchars($data["aturan_pakai"]);

  //query insert data
  $query= "UPDATE informasi_obat SET
            nama_obat='$nama_obat', 
            link='$link',
            khasiat = '$khasiat',
            deskripsi= '$deskripsi', 
            aturan_pakai = '$aturan_pakai' 
            WHERE id_obat='$id'";
  mysqli_query($conn, $query);
}

//buat register
function register($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password= mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  //cek username sudah ada atau belum
  $upakai=mysqli_query($conn, "SELECT username FROM login_admin WHERE username='$username' ");
  if (mysqli_fetch_assoc($upakai)){
    echo"<script>
        alert('username sudah pernah dipakai!');
        </script>";
    return false;
  }

  //cek konfirmasi password
  if($password != $password2){
      echo"<script>
          alert ('konfirmasi password tidak sesuai!');
          </script>";
      return false;
  }
  
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO login_admin VALUES('','$username','$password')");

  return mysqli_affected_rows($conn);
}

//function cari buat data obat
function cari_do($keyword){
  $query= "SELECT * FROM data_obat WHERE
           nama_obat LIKE '%$keyword%' OR
           merek LIKE '%$keyword%' OR 
           stok_obat LIKE '%$keyword%' OR
           harga_obat LIKE '%$keyword%'
           ";
  return query($query);
}

//function cari buat informasi obat
function cari_des($keyword_des){
  $query= "SELECT * FROM informasi_obat WHERE
           nama_obat LIKE '%$keyword_des%' OR
           khasiat LIKE '%$keyword_des%' 
           ";
  return query($query);
}
?>