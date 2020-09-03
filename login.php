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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/vendor/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendor/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/vendor/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendor/css/vendor.bundle.addons.css">
    <link rel="icon" type="image/png" href="assets/images/logo/damkar.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="assets/css/adminlte.min.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="label"><b>Username</b></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label"><b>Password</b></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="*********">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="login" class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>
                                <?php if (isset($error)) {
                                    echo "<div class='form-group'>
                                    <div style='text-align:center;' class='alert alert-info'><p >$error</p></div>
                                </div>";
                                } ?>
                            </form>
                        </div>
                        <p class="footer-text text-center mb-0">copyright © <?php $text = 2020;
                                                                            if ($text == date('Y')) {
                                                                                echo 2020;
                                                                            } else {
                                                                                echo 2020 . '-' . date('Y');
                                                                            } ?> e-kgb. All rights reserved.</p>
                    </div>
                </div>
            </div>


            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
</body>

</html>