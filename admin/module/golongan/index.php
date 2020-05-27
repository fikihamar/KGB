<?php
include '../config/connection.php';
$data1 = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan ASC");
// if (isset($_POST['submit'])) {

//     $id_user = $_POST['id_user'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $hak = "dokter";
//     $nama = $_POST['nama'];
//     $usia = $_POST['usia'];
//     $spealisasi = $_POST['spealisasi'];
//     $alamat = $_POST['alamat'];
//     $sql = mysqli_query($koneksi, "INSERT INTO tbl_login (id_user,nama,username,password,hak_akses) VALUES ('$id_user','$nama','$username','$password','$hak')");
//     $sql1 = mysqli_query($koneksi, "INSERT INTO dokter (id_dokter,id_user,nama,usia,spealisasi,alamat) VALUES ('','$id_user','$nama','$usia','$spealisasi','$alamat')");
//     if ($sql && $sql1) {
//         $message = "Selamat Anda Berhasil Menambahkan Dokter Silahkan Refresh Halaman";
//     } else {
//         $message = "Anda Gagal menambahkan Dokter Silahkan Coba lagi";
//     }
// }
// if (isset($_POST['delete'])) {
//     $id = $row1['id_user'];
//     $delete1 = mysqli_query($koneksi, "DELETE * FROM tbl_login WHERE id_user='$id'");
//     $delete2 = mysqli_query($koneksi, "DELETE * FROM dokter WHERE id_user='$id'");
//     if ($delete1 && $delete2) {
//         $delete = "Selamat anda berhasil menghapus satu dokter silahkan refresh halaman";
//     } else {
//         $delete = "Hapus Dokter Gagal Silahkan Coba Lagi";
//     }
// }
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Golongan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Golongan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="box">
        <div class="box-body">
            <table class="table table-striped datatab">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Golongan</th>
                        <th>Nama Golongan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row1 = mysqli_fetch_array($data1)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row1['id_golongan']; ?></td>
                            <td><?php echo $row1['nama_golongan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<div id="modal-tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" action="?module=dokter/input">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Menambahkan Dokter</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Id User</label>
                        <input class="form-control" id="nama" name="id_user">
                        <!-- <p style="color:red" id="error_nama"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" id="nama" name="username">
                        <!-- <p style="color:red" id="error_nama"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" id="nama" name="password">
                        <!-- <p style="color:red" id="error_nama"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" id="nama" name="nama">
                        <!-- <p style="color:red" id="error_nama"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Usia</label>
                        <input class="form-control" id="usia" name="usia">
                        <!-- <p style="color:red" id="error_jenis_kelamin"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Spealisasi</label>
                        <select class="form-control" name="spealisasi" id="spealisasi">
                            <option value="">Spealisasi</option>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM spealisasi ORDER BY spealisasi");
                            while ($d = mysqli_fetch_array($sql)) { ?> <option value="<?php echo $d['spealisasi']; ?>"><?php echo $d['spealisasi']; ?></option>
                            <?php }
                            ?>
                        </select>
                        <!-- <p style="color:red" id="error_telepon"></p> -->
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
                        <p style="color:red" id="error_alamat"></p>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-info" data-dismiss="modal">Batal</input>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="myModal<?php echo $row1['id_dokter']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" id="form-edit" method="post" action="input.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Dokter</h4>
                </div>
                <?php
                $id = $row1['id_dokter'];
                $edit = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id'");
                while ($row = mysqli_fetch_assoc($edit)) {
                ?>

                    <div class="modal-body">
                        <div id="data-edit">
                            <form role="form" id="form-edit" method="post" action="update.php">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="id_mahasiswa" value="<?php echo $row['id_dokter']; ?>">
                                    <input class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                                    <p style="color:red" id="error_edit_nama"></p>
                                </div>
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input class="form-control" id="usia" name="usia" value="<?php echo $row['usia']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input class="form-control" name="telepon" value="<?php echo $row['telepon']; ?>">
                                    <p style="color:red" id="error_edit_telepon"></p>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3"><?php echo $row['alamat']; ?></textarea>
                                    <p style="color:red" id="error_edit_alamat"></p>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<div id="delete<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Delete Data User</h4>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin ingin menghapus dokter <?php echo $row1['nama']; ?><strong><span class="grt"></span></strong> ?</h4>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-info" data-dismiss="modal" value="Batal">
                <form action="" method="post">
                    <input type="submit" name="delete" class="btn btn-primary" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>