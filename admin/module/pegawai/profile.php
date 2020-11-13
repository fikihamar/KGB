<?php
include "../config/connection.php";
$nip = $_GET['nip'];
$data = mysqli_query($con, "SELECT * FROM pegawai left JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
left JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip LEFT JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip 
LEFT JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Biodata Pegawai </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/pegawai/index">Home</a></li>
                    <li class="breadcrumb-item active">Data Pegawai</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <a class="btn btn-info " href="?module=pegawai/index">Kembali</a>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align: center;">
                        Data Pegawai
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php while ($a = mysqli_fetch_array($data)) {
                    ?>
                        <table style="width: 100%; font-size:14px; ">
                            <tr>
                                <td style="width:45%"><b>Nama Pegawai</b></td>
                                <td> <?= $a['nama']; ?></td>
                                <td> <a class="btn btn-outline-info btn-xs" href="#editpegawai<?php echo $a['nip']; ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit Pegawai</a></td>
                            </tr>
                            <tr>
                                <td><b>NIP Pegawai</b></td>
                                <td><?= $a['nip']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Pendidikan Terakhir</b></td>
                                <td><?= $a['pendidikan']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Keterangan Pendidikan</b></td>
                                <td><?= kosong($a['keterangan_pendidikan']) ?></td>
                            </tr>
                            <tr>
                                <td><b>Kantor</b></td>
                                <td><?= ucfirst($a['nama_instansi']) . ' ' . ucfirst($a['status']) . ' ' . ucfirst($a['nama_status']) ?></td>
                            </tr>
                            <tr>
                                <td><b>Masa Kerja Golongan Saat Ini</b></td>
                                <td><?php
                                    $tgl = $a['tgl_pangkat_terakhir'];
                                    $mkg_tahun = $a['mkg_tahun'];
                                    $mkg_bulan = $a['mkg_bulan'];
                                    mkg_now($tgl, $mkg_tahun, $mkg_bulan);

                                    ?></td>
                            </tr>

                            <tr></tr>

                        </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- ./col -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align: center;">
                        Data Kepangkatan Terakhir
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table style="width: 100%; font-size:14px;  ">
                        <tr>
                            <td><b>Pangkat/Golongan</b></td>
                            <td><?php if (($a['nama_golongan'] != "" && ($a['id_golongan'] != ""))) {
                                    echo $a['nama_golongan']; ?>/<?= $a['id_golongan'];
                                                                } else {
                                                                    echo "<h6><span class='badge badge-pill badge-warning'>Belum di isi</span></h6>";
                                                                } ?></td>
                        </tr>
                        <tr>
                            <td style="width: 45%"><b>Tanggal Promosi Pangkat Terakhir</b></td>
                            <td><?= $tanggal = date('d-m-Y', strtotime($a['tgl_pangkat_terakhir'])) ?></td>
                            <td style="width: 15%"> <a class="btn btn-outline-success btn-xs" href="#editpangkat<?php echo $a['nip']; ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit Kepangkatan</a></td>
                        </tr>
                        <tr>
                            <td><b>Periode Promosi Pangkat</b></td>
                            <td><?= $periode = $a['periode_kenaikan']; ?> tahun</td>
                        </tr>
                        <tr>
                            <td><b>Masa Kerja Golongan</b></td>
                            <td><?= $periode = $a['mkg_tahun']; ?> tahun <?= $a['mkg_bulan']; ?> bulan</td>
                        </tr>
                        <?php
                        $percepatan = $a['percepatan_kenaikan'];
                        $penundaan = $a['penundaan_kenaikan'];
                        if ($percepatan > 0) { ?>
                            <tr>
                                <td><b>Percepatan Kenaikan Pangkat</b></td>
                                <td><?= $percepatan; ?> tahun</td>
                            </tr> <?php
                                }
                                if ($penundaan > 0) {
                                    ?> <tr>
                                <td><b>Penundaan Kenaikan Pangkat</b></td>
                                <td><?= $penundaan; ?> tahun</td>
                            </tr>
                        <?php  } ?>
                        <tr>
                            <td><b>Status</b></td>
                            <td><?php
                                $status = kenaikanSelanjutnya($a['tgl_pangkat_terakhir'], $a['periode_kenaikan'], $a['percepatan_kenaikan'], $a['penundaan_kenaikan']);
                                $pendidikan = $a['pendidikan'];
                                $id_gol = $a['id_golongan'];
                                if (($pendidikan == "SMA/SMK") && $id_gol == ("III.b")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "D1") && $id_gol == ("III.b")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "D2") && $id_gol == ("III.b")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "D3") && $id_gol == ("III.c")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "S1") && $id_gol == ("III.d")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "S2") && $id_gol == ("IV.a")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } elseif (($pendidikan == "S3") && $id_gol == ("IV.b")) {
                                    echo "<h6><span class='badge badge-pill badge-warning'>Telah Mencapai Maksimum Promosi Pangkat Berdasarkan Pendidikan Terakhir</span></h6>";
                                } else {
                                    if (strtotime($status) <= time()) {
                                        echo "<h6><span class='badge badge-pill badge-warning'>Belum Update Pangkat Reguler</span></h6>";
                                    } else {
                                        echo "<h6><span class='badge badge-pill badge-success'>Sudah Update Pangkat Reguler</span></h6>";
                                    }
                                }

                                ?></td>
                        </tr>

                    </table>
                    <tr></tr>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- ./col -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align: center;">
                        Data Kenaikan Gaji Berkala Terakhir
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table style="width: 100%; font-size:14px;  ">
                        <tr>
                            <td style="width: 45%"><b>No Surat</b></td>
                            <td><?= '<h6>' . kosong($a['no_kgb']) . '</h6>' ?></td>
                            <td style="width: 15%"> <a class="btn btn-info btn-xs" href="#editkgb<?php echo $a['nip']; ?>" data-toggle="modal"><i class="fa fa-edit"></i> Edit KGB terakhir</a></td>
                        </tr>
                        <tr>
                            <td style="width: 45%"><b>Tanggal SK KGB Terakhir</b></td>
                            <td><?= kosong(date('d-m-Y', strtotime($a['tgl_surat_terakhir']))) ?></td>
                        </tr>
                        <tr>
                            <td style="width: 45%"><b>Gaji Pokok</b></td>
                            <td>Rp.<?php if ($a['gapok_terakhir']) {
                                        echo number_format($a['gapok_terakhir'], 0, ",", ".") . "-(" . $a['pp'] . ")" ?><?php } else { ?>
                                -<?php } ?></td>
                        </tr>
                        <tr>
                            <td><b>Masa Kerja Kerja Golongan</b></td>
                            <td><?= $periode = $a['mkg_tahun_kgb']; ?> tahun <?= $a['mkg_bulan_kgb']; ?> bulan</td>
                        </tr>
                        <tr>
                            <td style="width: 45%"><b>Golongan</b></td>
                            <td><?php
                                $data1 = mysqli_query($con, "SELECT * FROM kgb_terakhir INNER JOIN golongan ON kgb_terakhir.id_golongan_terakhir=golongan.id_golongan WHERE nip='$nip'");
                                $b = mysqli_fetch_array($data1);
                                echo $b['nama_golongan']; ?>/<?= $b['id_golongan_terakhir']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 45%"><b>Terhitung Mulai Tanggal</b></td>
                            <td><?= $tanggal = $a['tgl_kgb_terakhir']; ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td><b>Periode Kenaikan KGB</b></td>
                            <td><?= $periode = $a['periode_kgb']; ?> tahun</td>
                        </tr>

                        <?php
                        $percepatan_kgb = $a['percepatan_kgb'];
                        $penundaan_kgb = $a['penundaan_kgb'];
                        if ($percepatan_kgb > 0) { ?>
                            <tr>
                                <td><b>Percepatan KGB</b></td>
                                <td><?= $percepatan_kgb; ?> tahun</td>
                            </tr> <?php
                                }
                                if ($penundaan_kgb > 0) {
                                    ?> <tr>
                                <td><b>Penundaan KGB</b></td>
                                <td><?= $penundaan_kgb; ?> tahun</td>
                            </tr>
                        <?php  }
                        ?>


                        <tr>
                            <td style="width: 45%"><b>Scan SK KGB Terakhir</b></td>
                            <?php if ($b['sk_kgb_terakhir'] == "") {
                            ?>
                                <td>
                                    <h6><span class="badge badge-pill badge-primary">Belum Di Input</span></h6>
                                </td>
                            <?php } else { ?>
                                <td><a href="download-sk.php?nip=<?= $b['nip'] ?>"><?= $b['sk_kgb_terakhir'] ?></a><span style="color:red"><sup>*click untuk melihat</sup></span></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <?php include 'edit.php'; ?>
                    <tr></tr>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</section>
<?php } ?>