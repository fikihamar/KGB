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
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Arsip</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="#" class="btn btn-info btn-xs" data-target="#add-file" data-toggle="modal">Upload Arsip</a>
                    <div class="modal fade" id="add-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload File</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=add-file">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Pegawai</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <select name="nip" class="form-control" required>
                                                        <?php
                                                        $sql = mysqli_query($con, "SELECT * FROM pegawai");
                                                        while ($d = mysqli_fetch_array($sql)) { ?>
                                                            <option value="<?= $d['nip'] ?>"><?= $d['nip'] ?>||<?= $d['nama'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Tahun KGB</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <select class="form-control" name="tahun_kgb">
                                                        <option value="">Pilih Tahun</option>
                                                        <?php for ($i = date('Y'); $i >= '1980'; $i--) { ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php } ?>
                                                    </select> </div>
                                            </div>
                                            <div style="height: 10px;"></div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">File</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input type="file" class="form-control" name="file_upload" required>
                                                    <sup><span style="color: red"><b>*Maksimal File Yang Di Upload adalah 1 MB</b></span></sup>
                                                </div>
                                            </div>
                                    </div>
                                </div>
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
                    $data1 = mysqli_query($con, "SELECT DISTINCT nip,nama FROM arsip_kgb ORDER BY nip ASC");
                    while ($row1 = mysqli_fetch_array($data1)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row1['nip']; ?></td>
                            <td><?php echo $row1['nama']; ?></td>
                            <td><a class="btn btn-light btn-xs" href="?module=arsip-kgb/detail-arsip&nip=<?= $row1['nip'] ?>"> <i class="fa fa-folder-open"></i>Detail</a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" title="Delete Pegawai" href="#delete-all<?= $row1['nip']; ?>">
                                    <i class="fa fa-trash"></i>Delete</a>
                                <div class="modal fade bd-example" id="delete-all<?= $row1['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <?php $data4 = mysqli_query($con, "SELECT DISTINCT nip,nama FROM arsip_kgb  WHERE nip='" . $row1['nip'] . "'");
                                        while ($j = mysqli_fetch_array($data4)) { ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Delete Arsip</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=delete-all&nip=<?= $row1['nip'] ?>">
                                                            <div style="text-align: center">
                                                                <span>Apakah Anda Yakin Ingin Menghapus Arsip Data Pegawai <b><?= $j['nama'] ?></b> ??</span>
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
                            </td>
                        </tr>
                    <?php }
                    ?>


                </tbody>
            </table>

        </div>
    </div>
</section>