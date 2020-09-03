<?php
include '../config/connection.php';
$cek = mysqli_query($con, "SELECT nip_kepala_instansi FROM instansi");
$z = mysqli_fetch_array($cek);
$nip = $z['nip_kepala_instansi'];
$data = mysqli_query($con, "SELECT * FROM instansi left JOIN pegawai ON instansi.nip_kepala_instansi=pegawai.nip ");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Instansi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Instansi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php while ($a = mysqli_fetch_array($data)) {
?>
    <section class="content">
        <a class="btn btn-info " href="#edit-instansi<?= $a['id_instansi'] ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit Instansi</a>
        <div class="modal fade bd-example-modal-lg" id="edit-instansi<?= $a['id_instansi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Instansi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" action="?module=instansi/proses&act=edit-instansi&id=<?= $a['id_instansi'] ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label style="position:relative; top:7px;">Pemerintah</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="pemerintah" class="form-control" value="<?= $a['pemerintah'] ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Nama Instansi</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" name="instansi" class="form-control" value="<?= $a['nama_instansi']; ?>">
                                    </div>
                                </div>
                                <div style=" height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Pimpinan</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <select name="pimpinan" class="form-control">
                                            <option value="">Pilih Pimpinan</option>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM pegawai ORDER BY nip");
                                            while ($d = mysqli_fetch_array($sql)) { ?>
                                                <option <?php if ($a['nip_kepala_instansi'] === $d['nip']) {
                                                            echo 'selected';
                                                        } ?> value="<?= $d['nip'] ?>"><?php echo $d['nip']; ?> || <?php echo $d['nama']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Alamat</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="alamat" class="form-control" value="<?= $a['alamat'] ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">No Instansi</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="number" name="no_instansi" class="form-control" value="<?= $a['no_instansi'] ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Kode Pos</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="number" name="kd_pos" class="form-control" value="<?= $a['kd_pos'] ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Kecamatan</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="kecamatan" class="form-control" value="<?= $a['kecamatan']; ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Kota/Kabupaten</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="nama_status" class="form-control" value="<?= $a['nama_status']; ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Status</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <select name="status" class="form-control" id="">
                                            <option <?php if ($a['status'] == "Kabupaten") {
                                                        echo 'selected="selected"';
                                                    } ?> value="Kabupaten">Kabupaten</option>
                                            <option <?php if ($a['status'] == "Kota") {
                                                        echo 'selected="selected"';
                                                    } ?>value="Kota">Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="height:15px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Provinsi</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="provinsi" class="form-control" value="<?= $a['provinsi']; ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Telepon</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="telepon" class="form-control" value="<?= $a['telepon']; ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Fax</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="fax" class="form-control" value="<?= $a['fax']; ?>">
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Email</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="email" required name="email" class="form-control" value="<?= $a['email']; ?>">
                                    </div>
                                </div>
                                <div style=" height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Website</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="text" required name="website" class="form-control" value="<?= $a['website']; ?>">
                                    </div>
                                </div>
                                <div style=" height:10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Sektor</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <textarea name="sektor" class="form-control"><?= $a['sektor'] ?></textarea>
                                    </div>
                                </div>
                                <div style=" height:15px;"></div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <div style="height: 10px"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="text-align: center">
                            Data Instansi
                        </h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table style="width: 100%; font-size:14px; ">
                            <tr style="height: 10%;">
                                <td><b>Pemerintah</b></td>

                                <td style="height: 10px"><?= $a['pemerintah']; ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td style="width:45%"><b>Nama Instansi</b></td>
                                <td style="height: 10px"> <?= $a['nama_instansi']; ?></td>

                            </tr>
                            <tr style="height: 10px">
                                <td><b>Nama Pimpinan</b></td>
                                <td style="height: 10px"><?= kosong($a['nama']) ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>NIP Pimpinan</b></td>
                                <td style="height: 10px"><?= kosong($a['nip_kepala_instansi']) ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Alamat Instansi</b></td>
                                <td style="height: 10px"><?= kosong($a['alamat'])  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>No Instansi</b></td>
                                <td style="height: 10px"><?= kosong($a['no_instansi'])  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Kode Pos Instansi</b></td>
                                <td style="height: 10px"><?= kosong($a['kd_pos'])  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Kecamatan Instansi</b></td>
                                <td style="height: 10px"><?= kosong($a['kecamatan'])  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Kota/Kabupaten Instansi</b></td>
                                <td style="height: 10px"><?= $a['nama_status']  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Status</b></td>
                                <td style="height: 10px"><?= $a['status']  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Provinsi Instansi</b></td>
                                <td style="height: 10px"><?= $a['provinsi']  ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Telephone Instansi</b></td>
                                <td style="height: 10px"><?= $a['telepon']; ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Fax Instansi</b></td>
                                <td style="height: 10px"><?= $a['fax']; ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>E-Mail Instansi</b></td>
                                <td style="height: 10px"><?= $a['email']; ?></td>
                            </tr>
                            <tr style="height: 10px">
                                <td><b>Website Instansi</b></td>
                                <td style="height: 10px"><?= $a['website']; ?></td>
                            </tr>
                            <?php if ($a['sektor'] != "") {
                                echo " <tr style='height: 10px'>
                               <td><b>Sektor/UPT</b></td>
                               <td style='height: 10px;'>" . $a['sektor'] . "</td>
                           </tr>";
                            } ?>


                            <tr></tr>

                        </table>
                    <?php } ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>