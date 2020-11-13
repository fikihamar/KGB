<?php
session_start();
include('config/connection.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $hash = md5($_POST['password']);
    $data = mysqli_query($con, "select * from user where username='$username' and password='$hash'");
    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION[''] = $hash;
        $_SESSION['status'] = "login";
        header("location:admin/index.php");
    } else {
        $error = "Login Gagal username atau password salah";
    }
}

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<script>alert('Login gagal username/password salah')</script>";
    } elseif ($_GET['pesan'] == "logout") {
        echo "<script>alert('Anda berhasil logout')</script>";
    } elseif ($_GET['pesan'] == "belum_login") {
        echo "<script>alert('Anda harus login untuk mengakses halaman Selanjutnya')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-KGB | Log in</title>
    <link rel="icon" type="image/png" href="assets/images/logo/damkar.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
     <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/stisla/style.css">
  <link rel="stylesheet" href="assets/stisla/components.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
<div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
             <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">E-KGB</span></h4>
            <p class="text-muted"><span class="font-weight-bold">E-KGB</span> adalah sistem aplikasi untuk mengatur Kenaikan Gaji Berkala dan Kenaikan Pangkat Reguler Secara mudah dan teratur</p>
            <form method="POST"  class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Harap isi username anda
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Harap isi password anda
                </div>
              </div>

              <div class="form-group text-right">
                <input type="submit" name="login" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4" value="Login">
              </div>
              <?php if (isset($error)) { ?>
              <div class="form-group text-center">
                  <div class="alert alert-primary eror-login">
                      <span><?=$error?></span>
                  </div>
              </div>
<?php } ?>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; 2020 Develop by SMKN 1 Cibinong
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="assets/images/alec-favale-b_cmaYs4eXM-unsplash.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Hello Admin</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bogor, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/b_cmaYs4eXM">Alec Favale</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
 <script>
       $(document).ready(function(){
    setTimeout(function() {
        $(".eror-login").alert('close');
    }, 3000);
    });
    $("[data-background]").each(function() {
    var me = $(this);
    me.css({
      backgroundImage: 'url(' + me.data('background') + ')'
    });
  });

  </script>
</html>