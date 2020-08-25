<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
include '../config/connection.php.';
$data = mysqli_query($con, "SELECT * FROM user WHERE username='$_SESSION[username]'");
$d = mysqli_fetch_array($data);
?>
<section class="content">
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <img <?php if ($d['images'] == "") {
                                        echo "src='../assets/file-gambar/undraw_male_avatar_323b.png'";
                                    } else { ?> src="../assets/file-gambar/<?= $d['images'] ?>" <?php } ?>class="profile-user-img img-fluid img-circle" alt="admin-profile-picture">
                            <div class="m-3"><?php
                                                if ($d['images'] != "") {
                                                    echo " <form method='POST' enctype='multipart/form-data' action='?module=user/proses&act=delete-pict'><input type='hidden' name='a' value='$d[images]'><input type='submit' class='btn btn-xs btn-custom-blue' value='Delete Pict'></form>
                            ";
                                                } ?></div>
                        </div>
                        <h3 class="profile-username text-center"><?= $d['nama'] ?></h3>
                        <p class="text-muted text-center">Admin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Biodata</h3>
                    </div>
                    <div class="body">
                        <form method="POST" enctype="multipart/form-data" action="?module=user/proses&act=edit-user">
                            <div class="row m-4" action="">
                                <div class="col-sm-2">
                                    <label for="">Username</label>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly value="<?= $d['username'] ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row m-4" action="">
                                <div class="col-sm-2">
                                    <label for="">Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input name="nama" value="<?= $d['nama'] ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row m-4" action="">
                                <div class="col-sm-2">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <input name="email" value="<?= $d['email'] ?>" type="email" class="form-control">
                                </div>
                            </div>
                            <div class="row m-4" action="">
                                <div class="col-sm-2">
                                    <label for="">Change Password</label>
                                </div>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="row m-4" action="">
                                <div class="col-sm-2">
                                    <label for="">Picture</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="hidden" name="y" value="<?= $d['images'] ?>">
                                    <input name="file_upload" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="m-2 text-center">
                                <input type="submit" value="Ubah" class="btn btn-warning"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>