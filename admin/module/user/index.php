<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Arsip KGB</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Arsip KGB</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
include '../config/connection.php.';

?>
<section class="content">

    <div class="box">
        <div class="box-body">
            <table class="table table-striped datatab">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="#" class="btn btn-info btn-xs" data-target="#add-admin" data-toggle="modal">Tambah Admin</a>
                    <div class="modal fade" id="add-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Admin</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form method="POST" enctype="multipart/form-data" action="?module=user/proses&act=add-user">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Nama Admin</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" required class="form-control" name="nama">
                                                </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Username</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" required class="form-control" name="username">
                                                </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Email</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="email" required class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Password</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="text" required class="form-control" name="password">
                                                </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Foto Profil</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="file" class="form-control" name="file_upload">
                                                    <sup><span style="color: red"><b>*Maksimal File Yang Di Upload adalah 1 MB</b></span></sup><br>
                                                    <sup><span style="color: red"><b>*File Yang Di Upload Harus Berformat JPG, JPEG, atau PNG</b></span></sup>
                                                </div>
                                            </div>
                                    </div>
                                    <div style="height: 15px;"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php
                        $no = 1;
                        $data1 = mysqli_query($con, "SELECT DISTINCT * FROM user ORDER BY id_user ASC");
                        while ($row1 = mysqli_fetch_array($data1)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row1['nama']; ?></td>
                                <td><?php echo $row1['username']; ?></td>
                                <td><?php echo $row1['email']; ?></td>
                                <td><?php for ($i = 0; $i < strlen($row1['password']); $i++) {
                                        echo "*";
                                    } ?></td>
                                <td><?php echo $row1['level']; ?></td>
                                <td><?php
                                    $user = $row1['username'];
                                    $user1 = $_SESSION['username'];
                                    if ($user === $user1) {
                                        echo "<div class='badge badge-success badge-pill'><span style='font-size:12px'>Online Now</span></div>";
                                    } else {
                                        echo "<div class='badge badge-secondary badge-pill'><span style='font-size:12px'>Offline</span></div>";
                                    } ?></td>
                                <td><?php
                                    if ($user !== $user1) { ?>
                                        <a class="btn btn-light btn-xs" data-toggle="modal" href="#edit-user<?= $row1['id_user'] ?>"> <i class="fa fa-folder-open"></i>Edit</a>
                                        <div class="modal fade bd-example" id="edit-user<?= $row1['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <?php $data3 = mysqli_query($con, "SELECT COUNT(id_user) FROM user WHERE id_user='" . $row1['id_user'] . "'");
                                                while ($i = mysqli_fetch_array($data3)) { ?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Profile Admin</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form method="POST" enctype="multipart/form-data" action="?module=user/proses&act=edit-user-1&id=<?= $row1['id_user'] ?>">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Nama Admin</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" required class="form-control" value="<?= $i['nama'] ?>" name="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Username</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" required class="form-control" value="<?= $i['username'] ?>" name="username">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Email</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="email" required class="form-control" value="<?= $i['email'] ?>" name="email">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Password Baru</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" class="form-control" id="pass" name="password">
                                                                            <!-- <span style="color: blue"><sup><b>*Apakah Anda Ingin Mengubah Password??</b></sup></span>
                                                                        <br>
                                                                        <input type="checkbox" class="fom-control" id="cek_pass" onclick="terms_changed_pass(this)"><sup> Ya</sup> -->
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Foto Profil</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" hidden name="y" value="<?= $i['images'] ?>">
                                                                            <input type="file" class="form-control" name="file_upload">
                                                                            <sup><span style="color: red"><b>*Maksimal File Yang Di Upload adalah 1 MB</b></span></sup><br>
                                                                            <sup><span style="color: red"><b>*File Yang Di Upload Harus Berformat JPG, JPEG atau PNG</b></span></sup>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger btn-xs" data-toggle="modal" title="Delete User" href="#delete-all<?= $row1['id_user']; ?>">
                                            <i class="fa fa-trash"></i>Delete</a>
                                        <div class="modal fade bd-example" id="delete-all<?= $row1['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <?php $data4 = mysqli_query($con, "SELECT * FROM user WHERE id_user='" . $row1['id_user'] . "'");
                                                while ($j = mysqli_fetch_array($data4)) { ?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Delete Admin</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form method="POST" enctype="multipart/form-data" action="?module=user/proses&act=delete-user&id=<?= $row1['id_user'] ?>">
                                                                    <div style="text-align: center">
                                                                        <span>Apakah Anda Yakin Ingin Menghapus Akun <b><?= $j['nama'] ?></b> ??</span>
                                                                        <br>
                                                                        <br>
                                                                        <br>
                                                                        <b>
                                                                            <h4 style="color: red">Peringatan!!!</h4><br><span> Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan
                                                                        </b></span>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span>Delete</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <a class="btn btn-light btn-xs" data-toggle="modal" href="#edit-user<?= $row1['id_user'] ?>"> <i class="fa fa-folder-open"></i>Edit</a>
                                        <div class="modal fade bd-example" id="edit-user<?= $row1['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <?php $data3 = mysqli_query($con, "SELECT * FROM user WHERE id_user='" . $row1['id_user'] . "'");
                                                while ($i = mysqli_fetch_array($data3)) { ?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Profile Admin</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form method="POST" enctype="multipart/form-data" action="?module=user/proses&act=edit-user&id=<?= $row1['id_user'] ?>">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Nama Admin</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" required class="form-control" value="<?= $i['nama'] ?>" name="nama">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Username</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" required class="form-control" value="<?= $i['username'] ?>" name="username">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Email</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="email" required class="form-control" value="<?= $i['email'] ?>" name="email">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Password Baru</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" class="form-control" id="pass" name="password">
                                                                            <!-- <span style="color: blue"><sup><b>*Apakah Anda Ingin Mengubah Password??</b></sup></span>
                                                                        <br>
                                                                        <input type="checkbox" class="fom-control" id="cek_pass" onclick="terms_changed_pass(this)"><sup> Ya</sup> -->
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Foto Profil</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" hidden name="y" value="<?= $i['images'] ?>">
                                                                            <input type="file" class="form-control" name="file_upload">
                                                                            <sup><span style="color: red"><b>*Maksimal File Yang Di Upload adalah 1 MB</b></span></sup><br>
                                                                            <sup><span style="color: red"><b>*File Yang Di Upload Harus Berformat JPG, JPEG atau PNG</b></span></sup>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger btn-xs" data-toggle="modal" title="Delete User" href="#delete-all">
                                            <i class="fa fa-trash"></i>Delete</a>
                                        <div class="modal fade bd-example" id="delete-all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><span style="color: red"><b>Peringatan!!!</b></span> </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div style="text-align: center">
                                                                <span>Anda tidak dapat menghapus user yang sedang di gunakan silahkan logout terlebih dahulu dan gunakan akun yang lain untuk menghapus akun ini</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span>Oke</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                </tbody>
            </table>

        </div>
    </div>
</section>