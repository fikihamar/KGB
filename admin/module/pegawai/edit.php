<div class="modal fade" id="editpegawai<?php echo $a['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include "../config/connection.php";
                $data = mysqli_query($con, "SELECT * FROM pegawai  LEFT JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
 INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip LEFT JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
                while ($b = mysqli_fetch_array($data)) {
                ?>
                    <div class="container-fluid">
                        <form method="POST" action="?module=pegawai/function-proses&act=update_pegawai&nip=<?php echo $a['nip']; ?>">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">NIP</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="hidden" name="nip_lama" value="<?=$b['nip']?>">
                                    <input type="text" name="nip" class="form-control" value="<?php echo $b['nip']; ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Nama</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $b['nama']; ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Pendidikan</label>
                                </div>
                                <div class="col-xl-8">
                                    <select name="pendidikan" class="form-control" id="">
                                        <option value="SMA/SMK" <?php if ($a['pendidikan'] == "SMA/SMK") echo 'selected="selected"'; ?>>SMA/SMK</option>
                                        <option value="D1" <?php if ($a['pendidikan'] == "D1") echo 'selected="selected"'; ?>>D1</option>
                                        <option value="D2" <?php if ($a['pendidikan'] == "D2") echo 'selected="selected"'; ?>>D2</option>
                                        <option value="D3" <?php if ($a['pendidikan'] == "D3") echo 'selected="selected"'; ?>>D3</option>
                                        <option value="S1" <?php if ($a['pendidikan'] == "S1") echo 'selected="selected"'; ?>>S1</option>
                                        <option value="S2" <?php if ($a['pendidikan'] == "S2") echo 'selected="selected"'; ?>>S2</option>
                                        <option value="S3" <?php if ($a['pendidikan'] == "S3") echo 'selected="selected"'; ?>>S3</option>
                                    </select>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Keterangan Pendidikan</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="ket_pendidikan" class="form-control" value="<?php echo $b['keterangan_pendidikan']; ?>" required>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Kantor</label>
                                </div>
                                <div class="col-xl-8">
                                    <?php if ($a['status'] == 'Kabupaten') {
                                        $status = substr($a['status'], 0, 3) . '.';
                                    } else {
                                        $status = ucfirst($a['status']);
                                    } ?>
                                    <input type="text" name="kantor" class="form-control" value="<?= $a['nama_instansi'] . '  ' . $status . ' ' . $a['nama_status'] ?>" readonly>
                                    <span style="color: red"><sup>*Jika ingin mengubah nama kantor silahkan ke halaman <b>Instansi</b></sup></span>
                                </div>
                            </div>
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">MKG saat Ini</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="text" name="pangkat" class="form-control" value="<?= mkg_now($tgl, $mkg_tahun, $mkg_bulan) ?>" readonly>
                                    <span style="color: red"><sup>*Jika Ingin Mengubah MKG Silahkan di <b>Edit Kepangkatan</br></sup></span>
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

<!-- penundaan promosi pangkat -->
<div class="modal fade" id="editpangkat<?php echo $a['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kepangkatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="?module=pegawai/function-proses&act=edit_pangkat&nip=<?php echo $a['nip']; ?>">
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Pangkat/Golongan</label>
                            </div>
                            <div class="col-xl-8">
                                <select name="id_golongan" class="form-control">
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                    while ($d = mysqli_fetch_array($sql)) { ?>
                                        <option <?php if ($a['id_golongan'] === $d['id_golongan']) {
                                                    echo 'selected';
                                                } ?> value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                    <?php } ?>
                                </select>
                                <span style="color: red"><sup>*Pangkat/Golongan berdasarkan pada SK pangkat terakhir</sup></span>
                            </div>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">NIP</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="nip" class="form-control" value="<?php echo $b['nip']; ?>" readonly>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Nama</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="nama" class="form-control" value="<?php echo $b['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Tanggal Promosi Pangkat Terakhir</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="date" required name="tgl_promosi" class="form-control" value="<?php echo strftime(
                                                                                                                '%Y-%m-%d',
                                                                                                                strtotime($b['tgl_pangkat_terakhir'])
                                                                                                            ); ?>">
                            </div>
                        </div>
                        <div style=" height:15px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Periode Kenaikan</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="number" required name="periode_promosi" id="periode_promosi" class="form-control" value="<?php echo $a['periode_kenaikan']; ?>" disabled>
                                <span style="color: red"><sup>*Periode Promosi Pangkat Secara Otomatis adalah 4 tahun sekali<br>*Apakah Anda Ingin mengubah periode promosi pangkat??</sup></span>
                                <br>
                                <input type="checkbox" class="fom-control" name="cek" id="cek" onclick="terms_changed_promosi(this)"><sup> Ya</sup>
                            </div>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Masa Kerja Golongan</label>
                            </div>
                            <div class="col-xl-2">
                                <input type="number" required name="mkg_tahun" class="form-control" value="<?= $b['mkg_tahun'] ?>">
                            </div>
                            <div class="col-xl-2">
                                <p style="position:relative; top:7px;">Tahun</p>
                            </div>
                            <div class="col-xl-2">
                                <input type="number" required name="mkg_bulan" class="form-control" value="<?= $b['mkg_bulan'] ?>">
                            </div>
                            <div class="col-xl-2">
                                <p style="position:relative; top:7px;">Bulan</p>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
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

<div class="modal fade bd-example-modal-lg" id="editkgb<?php echo $a['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kenaikan Gaji Berkala Terakhir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" action="?module=pegawai/function-proses&act=editkgb&nip=<?php echo $b['nip']; ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="position:relative; top:7px;">NIP</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" name="nip" class="form-control" value="<?php echo $b['nip']; ?>" readonly>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Nama</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="nama" class="form-control" value="<?php echo $b['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">No Surat KGB</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" required name="no_surat_kgb" class="form-control" value="<?= $a['no_kgb'] ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Tanggal Surat KGB</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="date" required name="tgl_surat_kgb" class="form-control" value="<?php echo strftime(
                                                                                                                    '%Y-%m-%d',
                                                                                                                    strtotime($a['tgl_surat_terakhir'])
                                                                                                                ); ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Gaji Pokok</label>
                            </div>
                            <div class="col-xl-4">
                                <input type="number" name="gapok_terakhir" class="form-control" value="<?php echo $a['gapok_terakhir']; ?>">
                            </div>
                            <div class="col-xl-4">
                                <input type="text" name="pp_lama" class="form-control" value="<?php echo $a['pp']; ?>">
                            </div>
                        </div>
                        <div style="height:15px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Berdasarkan Masa Kerja</label>
                            </div>
                            <div class="col-xl-2">
                                <input type="number" required name="mkg_tahun_kgb" class="form-control" value="<?= $a['mkg_tahun_kgb'] ?>">
                            </div>
                            <div class="col-xl-2">
                                <p style="position:relative; top:7px;">Tahun</p>
                            </div>
                            <div class="col-xl-2">
                                <input type="number" required name="mkg_bulan_kgb" class="form-control" value="<?= $a['mkg_bulan_kgb'] ?>">
                            </div>
                            <div class="col-xl-2">
                                <p style="position:relative; top:7px;">Bulan</p>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Dalam Golongan</label>
                            </div>
                            <div class="col-xl-8">
                                <select name="id_golongan_terakhir" class="form-control" required>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                    while ($d = mysqli_fetch_array($sql)) { ?>
                                        <option <?php if ($a['id_golongan_terakhir'] === $d['id_golongan']) {
                                                    echo 'selected';
                                                } ?> value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Terhitung Mulai Tanggal</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="date" required name="tgl_kgb" class="form-control" value="<?php echo strftime(
                                                                                                            '%Y-%m-%d',
                                                                                                            strtotime($a['tgl_kgb_terakhir'])
                                                                                                        ); ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Scan SK KGB Terakhir</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="hidden" name="file" value="<?= $a['sk_kgb_terakhir'] ?>">
                                <input type="file" class="form-control" name="sk_kgb">
                            </div>
                        </div>
                        <div style=" height:10px;"></div>
                        <div class="row">
                            <div class="col-xl-4">
                                <label style="position:relative; top:7px;">Periode KGB</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="number" required name="periode_kgb" id="periode_kgb" class="form-control" value="<?= $a['periode_kgb'] ?>" disabled>
                                <span style="color: red"><sup>*Periode KGB Secara Otomatis adalah 2 tahun sekali<br>*Apakah Anda Ingin mengubah periode KGB??</sup></span>
                                <br>
                                <input type="checkbox" class="fom-control" name="cek_kgb" id="cek_kgb" onclick="terms_changed_kgb(this)"><sup> Ya</sup>
                            </div>
                        </div>
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

<div class="example-modal">
    <div id="deletepercepatan<?php echo $p['nip']; ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Delete Percepatan Promosi Pangkat </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    $data1 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                ON pegawai.nip=pangkat_terakhir.nip WHERE pegawai.nip='" . $p['nip'] . "'");
                    while ($b = mysqli_fetch_array($data1)) {

                ?>
                    <div class="modal-body">
                        <p align="center">Apakah anda yakin ingin menghapus Percepatan Promosi Pangkat <b> <?php echo $b['nama']; ?></b><strong><span class="grt"></span></strong> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                        <a href="?module=naik-pangkat/function-proses&act=delete_percepatan&nip=<?php echo $b['nip']; ?>" class="btn btn-primary">Delete</a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div><!-- modal delete -->
<?php } ?>
<script>
    $('#percepatan_kp').blur(function() {
        var percepatan_kp = $(this).val();
        var len = password.length;
        if (len > 3) {
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("percepatan kenaikan pangkat maksimal adalah 3 tahun");
            return apply_feedback_error(this);
        }

    });
</script>