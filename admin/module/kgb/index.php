<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kenaikan Gaji Berkala</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Kenaikan Gaji Berkala</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
include '../config/connection.php.';
$data2 = naikPangkat($con, 'Y-12-31');
                    $nip1 = [];
                    while ($row2 = mysqli_fetch_array($data2)) {
                        $date = kenaikanSelanjutnya($row2['tgl_pangkat_terakhir'], $row2['periode_kenaikan'], $row2['percepatan_kenaikan'], $row2['penundaan_kenaikan']);
                        if (strtotime($date) <= time()) {
                            $pendidikan = $row2['pendidikan'];
                            $id_gol = $row2['id_golongan'];
                            if (($pendidikan == "SMA/SMK") || ($pendidikan == "D1") || ($pendidikan == "D2") && $id_gol == ("III.b")) {
                            } elseif (($pendidikan == "D3") && $id_gol == ("III.c")) {
                            } elseif (($pendidikan == "S1") && $id_gol == ("III.d")) {
                            } elseif (($pendidikan == "S2") && $id_gol == ("IV.a")) {
                            } elseif (($pendidikan == "S3") && $id_gol == ("IV.b")) {
                            } else {
                                array_push($nip1, $row2['nip']);
                            }
                        }
                    }
                    $angka2 = count($nip1);
                    if ($angka2>0) {
                        echo "<h6><span class='badge badge-pill badge-warning'>Silahkan Update Pangkat Pegawai Terlebih Dahulu</span></h6>";
                    }else{
$data1= update_kgb($con, 'Y-12-31');
$nip = [];
while ($row2 = mysqli_fetch_array($data1)) {
    $date = kenaikanSelanjutnya($row2['tgl_kgb_terakhir'], $row2['periode_kgb'], $row2['percepatan_kgb'], $row2['penundaan_kgb']);
    if (strtotime($date) <= time()) {
        array_push($nip, $row2['nip']);
    }
}
$angka = count($nip);
?>
<section class="content">
    <div class="box">
        <div class="box-body">
            <table id="table-data" class="table table-striped datatab">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>KGB Sebelumnya</th>
                        <th>KGB Yang Akan Di Cetak</th>
                        <th>Jatuh Pada Tanggal</th>
                        <th>Jatuh Dalam Tempo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data1 = update_kgb($con);
                    if ($angka == 0) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <p>Tidak ada pegawai yang mengalami kenaikan gaji berkala pada tahun ini Silahkan <a href="?module">kembali</a></p>
                        </div>
                    <?php
                    } else { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissable">
                                    <span style="text-align:center">
                                        <p>Apabila Ada Pegawai Yang Mengalami <b>Penundaan</b> Kenaikan Gaji Berkala Silahkan Klik <a href="?module=kgb/percepatan">Disini</a></p>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p>Berikut ini adalah daftar pegawai yang harus di update kenaikan gaji berkala sampai dengan tahun ini</p>
                        <?php
                        $no = 1;
                        while ($row1 = mysqli_fetch_array($data1)) {
                            $date = kenaikanSelanjutnya($row1['tgl_kgb_terakhir'], $row1['periode_kgb'], $row1['percepatan_kgb'], $row1['penundaan_kgb']);
                            if (strtotime($date) <= time()) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row1['nip']; ?></td>
                                    <td><?php echo $row1['nama']; ?></td>
                                    <td><?= date('Y', strtotime($row1['tgl_kgb_terakhir'])); ?></td>
                                    <td><?= date('Y', strtotime(kenaikanSelanjutnya($row1['tgl_kgb_terakhir'], $row1['periode_kgb'], $row1['percepatan_kgb'], $row1['penundaan_kgb'])));
                                        ?></td>
                                    <td><?= kenaikanSelanjutnya($row1['tgl_kgb_terakhir'], $row1['periode_kgb'], $row1['percepatan_kgb'], $row1['penundaan_kgb']);
                                        ?></td>
                                    <td><?php
                                        tempo($row1['tgl_kgb_terakhir'], $row1['periode_kgb'], $row1['percepatan_kgb'], $row1['penundaan_kgb']);
                                        ?></td>

                                    <?php
                                    if ($row1['no_kgb'] == 0) { ?>
                                        <div id="thanks">
                                            <td> <a href="#" class="btn btn-info btn-sm" data-target="#addnokgb<?php echo $row1['nip']; ?>" data-toggle="modal"> <i class="fa fa-edit"></i></a></td>
                                        </div>

                                        <div class="modal fade" id="addnokgb<?php echo $row1['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Silahkan Isi Data Yang Belum Lengkap</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        include "../config/connection.php";

                                                        $data2 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN kgb_terakhir
                        ON pegawai.nip=kgb_terakhir.nip WHERE pegawai.nip='" . $row1['nip'] . "'");
                                                        while ($a = mysqli_fetch_array($data2)) {
                                                        ?>
                                                            <div class="container-fluid">
                                                                <form method="POST" action="?module=kgb/function-proses&act=addno-surat&nip=<?php echo $a['nip']; ?>">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">NIP</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" name="nip" class="form-control" value="<?php echo $a['nip']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">Nama</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" name="nama" class="form-control" value="<?php echo $a['nama']; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 15px;"></div>
                                                                    <div style="text-align:center" class="col-md-12">
                                                                        <hr><label style="font-size:16px; text-align:center">Data KGB Tahun <?= $tahun = date('Y', strtotime($a['tgl_kgb_terakhir'])) ?></label><br>
                                                                        <span style="font-size:12px;">Silahkan Lihat SK KGB tahun <?= $tahun ?></span>
                                                                        <hr>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label style="position:relative; top:7px;">No Surat</label>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <input type="text" name="no_kgb" class="form-control">
                                                                            <input type="hidden" name="gapok_terakhir" class="form-control">
                                                                            <input type="hidden" name="pp">
                                                                        </div>
                                                                    </div>
                                                                    <div style="height: 10px;"></div>
                                                                    <?php if ($a['gapok_terakhir'] === "" && $a['pp'] === "") { ?>
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label style="position:relative; top:7px;">Gaji Pokok</label>
                                                                            </div>
                                                                            <div class="col-xl-8">
                                                                                <input type="text" name="gapok_terakhir" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div style="height: 10px;"></div>
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label style="position:relative; top:7px;">Berdasarkan PP</label>
                                                                            </div>
                                                                            <div class="col-xl-8">
                                                                                <input type="text" name="pp" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                    </div>
                                                    </form>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } else { ?>
                                        <td><a href="#" class="btn btn-info btn-sm" data-target="#alert-upload<?php echo $row1['nip']; ?>" data-toggle="modal"> <i class="fa fa-edit"></i></a>


                                            <div class="modal fade" id="alert-upload<?php echo $row1['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Perhatian!!</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="col-md-12">
                                                                    <b>1.&ensp;</b><span>Pastikan Data KGB terakhir sesuai dengan SK KGB terakhir agar tidak terjadi kesalahan pencetakan<br>
                                                                        <b>2.&ensp;</b>Jika Terjadi Kesalahan Pencetakan File Silahkan Cek kembali data KGB terakhir <a href="?module=pegawai/profile&nip=<?= $row1['nip'] ?>">Disini</a><br>
                                                                        <b>3.&ensp;</b>Jika sudah dapat di pastikan benar maka silahkan <b>Download</b> file<br>
                                                                        <b>4.&ensp;</b>Kemudian <b>Upload</b> Hasil <b>Download</b> File KGB</span><br>
                                                                    <span><b>5.&ensp;</b>Jika Anda Tidak <b>Upload</b> File KGB maka untuk KGB berikutnya akan terjadi kesalahan</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="submit" href="?module=kgb/upload&nip=<?php echo $row1['nip']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Upload</a>
                                                            <a type="submit" target="_blank" href="cetak_gaji.php?nip=<?php echo $row1['nip']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Download</a>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                        <?php }
                                }
                            }
                        }
                        ?>
                        </td>
                                </tr>
                </tbody>
            </table>

        </div>
    </div>
</section>
                    <?php }?>