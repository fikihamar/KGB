    <?php
    include '../config/connection.php.';
    $cek = naikPangkat($con, 'Y-12-31');
    $nip = [];
    while ($row1 = mysqli_fetch_array($cek)) {
        $date = kenaikanSelanjutnya($row1['tgl_pangkat_terakhir'], $row1['periode_kenaikan'], $row1['percepatan_kenaikan'], $row1['penundaan_kenaikan']);
        if (strtotime($date) <= time()) {
            $pendidikan = $row1['pendidikan'];
            $id_gol = $row1['id_golongan'];
            $result = '';
            $angka = 1;
            if (($pendidikan == "SMA/SMK") || ($pendidikan == "D1") || ($pendidikan == "D2") && $id_gol == ("III.b")) {
            } elseif (($pendidikan == "D3") && $id_gol == ("III.c")) {
            } elseif (($pendidikan == "S1") && $id_gol == ("III.d")) {
            } elseif (($pendidikan == "S2") && $id_gol == ("IV.a")) {
            } elseif (($pendidikan == "S3") && $id_gol == ("IV.b")) {
            } else {
                array_push($nip, $row1['nip']);
            }
        }
    }
    $angka1 = count($nip);
    if ($angka1 > 0) {
        $peringatan = $_SESSION = "Perhatian!!! ada <span style='color:red'><b>" . $angka1 . "</b></span> pegawai yang harus di update pangkatnya terlebih dahulu, Sebelum anda melakukan KGB pangkat pegawai harus sesuai.
silahkan update pangkatnya 
<a href='?module=naik-pangkat/index'>Disini</a>";
    }

    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($peringatan)) {
        ?><div class="alert alert-warning alert-dismissable">
                <?php echo $peringatan; ?>
            </div>
        <?php
        }
        ?>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php

                            $gol = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan ");
                            $gl = mysqli_num_rows($gol);
                            ?>
                            <h3><?= $gl; ?></h3>

                            <p>Golongan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <a href="?module=golongan/index" class=" small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            include '../config/connection.php.';
                            $peg = mysqli_query($con, "SELECT * FROM pegawai ORDER BY nip DESC");
                            $pg = mysqli_num_rows($peg);
                            ?>
                            <h3><?= $pg; ?></h3>

                            <p>PNS</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="?module=pegawai/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $angka1 ?></h3>

                            <p>Promosi Pangkat</p>
                        </div>
                        <div class=" icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="?module=naik-pangkat/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            ?><?php $kgb = (update_kgb($con, date('Y-12-31')));
                                $j_kgb = [];
                                while ($row2 = mysqli_fetch_array($kgb)) {
                                    $date1 = kenaikanSelanjutnya($row2['tgl_kgb_terakhir'], $row2['periode_kgb'], $row2['percepatan_kgb'], $row2['penundaan_kgb']);
                                    if (strtotime($date1) <= time()) {
                                        array_push($j_kgb, $row2['nip']);
                                    }
                                }
                                ?>
                            <h3><?= count($j_kgb) ?></h3>

                            <p>Kenaikan Gaji Berkala</p>
                        </div>
                        <div class=" icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="?module=kgb/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
    </section>