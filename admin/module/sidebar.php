<?php
include '../config/connection.php';
$admin = mysqli_query($con, "SELECT * FROM user WHERE username='" . $_SESSION['username'] . "'");
$a = mysqli_fetch_array($admin);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KGB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel optional -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if ($a['images']) {
                    echo  '<img class="img-circle elevation-2" alt="User Image" src="../assets/file-gambar/' . $a['images'] . ' " />';
                } else {
                    echo '<img class="img-circle elevation-2" alt="User Image" src="../assets/file-gambar/undraw_male_avatar_323b.png " />';
                }  ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><b><?= $a['nama'] ?><sup>
                            <div class='badge badge-success badge-pill'><span>Online</span></div>
                        </sup></b> </a> </div>
        </div> <!-- Sidebar Menu -->
        <nav class="wrapper">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="index.php" class="nav-link active" id="home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="?module=pegawai/index" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>
                            Promosi Pangkat
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?module=naik-pangkat/index" class="nav-link" id="data-dokter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update Kepangkatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?module=naik-pangkat/penundaan" class="nav-link" id="spesialis">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penundaan Promosi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>
                            Kenaikan Gaji Berkala
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?module=kgb/index" class="nav-link" id="data-dokter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update KGB</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?module=kgb/penundaan" class="nav-link" id="spesialis">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penundaan KGB</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="?module=gaji-pokok/index&act=tampil&golongan=I" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Gaji Pokok
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="?module=arsip-kgb/index" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Arsip KGB
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="?module=instansi/index" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Instansi
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="?module=user/index" class="nav-link ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>