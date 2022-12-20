<?php 

session_start();
if (isset($_SESSION['login'])){
  $_SESSION['username']=$username;
  header("location:index.php");
  exit;
}
require 'Koneksi.php';

if (isset($_POST["login"])){
  $username=$_POST["username"];
  $password=$_POST["password"];
  $_SESSION['username']=$username;
  $result = mysqli_query($conn,"SELECT * FROM login_admin WHERE username='$username'");

  //cek username
  if(mysqli_num_rows($result)===1){
    //cek password
    $row=mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])){
      //set session
      $_SESSION['login']=true;
      echo"<script>
      alert('Selamat datang $username!');
      document.location.href= 'index.php';
      </script>";
      
      exit;
    $exit=true;
    }else{
      echo"<script>
      alert('gagal login!');
      document.location.href= 'login.php';
      </script>";
    return false;
    }
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
    <title>Login</title>
    <style>
      .bg{
      background-image: url(assets/img/bgobat2.jpg); 
      background-repeat: no-repeat; 
      background-attachment: fixed;
      background-position: center;
      background-size: auto;
      }
    </style>
</head>
<body class="bg">
    <section>
        <div class="form-container">
            <h1 class="text-info">Login form</h1>
            <form action="" method="post">
                <div class="control">
                    <label for="username" class="text-info">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="control">
                    <label for="password" class="text-info">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <span><input type="checkbox">Remember me.</span>
                <div class="control">
                    <input type="submit" name="login" value="login">
                </div>
            </form>
            <div class="link1">
                <a href="register.php">Belum punya akun? Click here</a>
            </div>
        </div>
    </section>
</body>
</html>