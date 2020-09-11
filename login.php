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
    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Iconic icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/background_login.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="">
                    <span style="color: #fff;display:block;" class="text-center fs-15 m-b-34">Selamat Datang Di Aplikasi Kenaikan Gaji Bekala Dinas Pemadam Kabupaten Bogor</span>
                    <span class="login100-form-logo m-t-100">
                        <img src="assets/images/logo/damkar.png" alt="" srcset="">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>
                    <div style="color: #fff;" class="text-center mt-4 pt-9"> <span class="badge badge-custom"><?php
                                                                                                                if (isset($error)) {
                                                                                                                    echo $error;
                                                                                                                } ?></span></div>
                </form>

            </div>

        </div>
        <p class="text-center mb-0">copyright © <?php $text = 2020;
                                                if ($text == date('Y')) {
                                                    echo 2020;
                                                } else {
                                                    echo 2020 . '-' . date('Y');
                                                } ?> e-kgb. All rights reserved.</p>
    </div>

</body>
<script src="assets/js/jquery-3.4.1.min.js"></script>

</html>