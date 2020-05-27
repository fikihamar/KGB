<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Upload File Arsip</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/arsip">Home Arsip</a></li>
                    <li class="breadcrumb-item active">Upload Arsip</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
include '../config/connection.php';
$nip = $_GET['nip'];
$sql = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip WHERE pegawai.nip='$nip'");
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Upload File Arsip</h4>
                            <p class="card-description"> Basic form layout </p>
                            <form method="POST" enctype="multipart/form-data" action="?module=arsip-kgb/proses&act=upload-data&nip=<?= $nip ?>">
                                <?php

                                while ($d = mysqli_fetch_array($sql)) { ?>
                                    <div class="form-group">
                                        <label for="">Pegawai</label>
                                        <select name="nip" class="form-control" required readonly>
                                            <option value="<?= $d['nip'] ?>"><?= $d['nip'] ?>||<?= $d['nama'] ?></option>
                                        </select>
                                        <input type="hidden" name="nip" value="<?= $d['nip'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun KGB</label>
                                        <input type="text" readonly name="tahun_kgb" class="form-control" value="<?= date('Y', strtotime(kenaikanSelanjutnya($d['tgl_kgb_terakhir'], $d['periode_kgb'], $d['percepatan_kgb'], $d['penundaan_kgb']))) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" class="form-control" name="file_upload" required>
                                        <sup><span style="color: red"><b>*Maksimal File Yang Di Upload adalah 1 MB</b></span></sup>
                                    </div>
                                    <input type="submit" class="btn btn-success mr-2" value="Submit">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>