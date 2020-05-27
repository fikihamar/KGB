<?php
include '../config/connection.php.';
$nip = $_GET['nip'];
$data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'ORDER BY nip ASC");
$a = mysqli_fetch_array($data);
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <span style="font-size:20px;" class="m-0 text-dark">Arsip KGB </span>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/arsip-kgb/index">Home</a></li>
                    <li class="breadcrumb-item active">Arsip KGB</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div style="height: 10px"></div>
        <div class="row">
            <div class="col-md-1">
                <label>Nama</label>
            </div>
            <div class="col-md-1">
                <label> :</label>
            </div>
            <div class="col-md-10">
                <?= $a['nama'] ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
                <label>NIP</label>
            </div>
            <div class="col-md-1">
                <label>:</label>
            </div>
            <div class="col-md-10">
                <?= $a['nip'] ?>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<section class="content">

    <div class="box">
        <div class="box-body">
            <table class="table table-striped datatab">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun KGB</th>
                        <th>Tanggal Di Arsipkan</th>
                        <th>File KGB</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                        <div style="padding-left: 20px" class="col-md-10">
                            <a href="?module=/arsip-kgb/index" class="btn btn-warning btn-xs">Kembali</a>
                        </div>
                        <div style="padding-right: 0px" class="col-md-2">
                            <a href="#" class="btn btn-info btn-xs" data-target="#upload-detail" data-toggle="modal">Upload Arsip</a>
                        </div>
                    </div>
                    <div style="height: 10px"></div>
                    <div class="modal fade" id="upload-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=add-file-detail">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label style="position:relative; top:7px;">Pegawai</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <select readonly name="nip" class="form-control" required>
                                                        <option readonly value="<?= $a['nip'] ?>"><?= $a['nip'] ?>||<?= $a['nama'] ?></option>
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
                    $data1 = mysqli_query($con, "SELECT * FROM arsip_kgb INNER JOIN pegawai ON arsip_kgb.nip=pegawai.nip WHERE arsip_kgb.nip='$nip' ORDER BY arsip_kgb.kgb_tahun ASC");
                    while ($row1 = mysqli_fetch_array($data1)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row1['kgb_tahun']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row1['tgl_arsip'])); ?></td>
                            <td><?php echo $row1['file_kgb']; ?></td>
                            <td> <a href="download-proses.php?nip=<?= $row1['nip'] ?>&tahun=<?= $row1['kgb_tahun'] ?>" class="btn btn-info btn-xs">Download</a>
                                <a href="#editfile<?= $row1['id_arsip'] ?>" class="btn btn-info btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Edit</a>
                                <div class="modal fade bd-example-modal-lg" id="editfile<?php echo $row1['id_arsip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <?php $data3 = mysqli_query($con, "SELECT * FROM arsip_kgb INNER JOIN pegawai ON arsip_kgb.nip=pegawai.nip WHERE arsip_kgb.id_arsip='" . $row1['id_arsip'] . "'");
                                        while ($i = mysqli_fetch_array($data3)) { ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit File</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=edit-file-detail&nip=<?= $nip ?>&id=<?= $row1['id_arsip'] ?>">
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <label style="position:relative; top:7px;">Pegawai</label>
                                                                </div>
                                                                <div class="col-xl-8">
                                                                    <select readonly name="nip" class="form-control" required>
                                                                        <option readonly value="<?= $a['nip'] ?>"><?= $a['nip'] ?> || <?= $a['nama'] ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div style="height: 10px;"></div>
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <label style="position:relative; top:7px;">Tahun KGB</label>
                                                                </div>
                                                                <div class="col-xl-8">
                                                                    <input type="text" readonly class="form-control" value="<?= $i['kgb_tahun'] ?>" name="tahun_kgb" required>
                                                                </div>
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
                                            <?php } ?>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                            </div>
                                            </form>
                                            </div>
                                    </div>
                                </div>
                                <a href="#deletefile<?= $row1['id_arsip'] ?>" class="btn btn-danger btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Delete</a>

                                <div class="modal fade bd-example" id="deletefile<?= $row1['id_arsip'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <?php $data4 = mysqli_query($con, "SELECT * FROM arsip_kgb INNER JOIN pegawai ON arsip_kgb.nip=pegawai.nip WHERE arsip_kgb.id_arsip='" . $row1['id_arsip'] . "'");
                                        while ($j = mysqli_fetch_array($data4)) { ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Delete File</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <form method="POST" enctype="multipart/form-data" action="delete-arsip.php?tahun=<?= $row1['kgb_tahun'] ?>&nip=<?= $row1['nip'] ?>">
                                                            <span>Apakah Anda Yakin Ingin Menghapus File Arsip KGB tahun <b><?= $j['kgb_tahun'] ?></b> Pegawai <b><?= $j['nama'] ?></b>??</span>
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