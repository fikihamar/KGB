<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Promosi Pangkat Reguler </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Promosi Pangkat Reguler</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <!-- <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-3">
            <form action="?module=naik-pangkat/index&act=tampil" method="post">
                <select name="waktu" class="form-control" id="">
                    <option value="'Y-m-31'z">Bulan Ini</option>
                    <option value="'Y-12-31'">Tahun Ini</option>
                </select>
                <input type="submit" value="Pilih">
            </form>
        </div>
        <div class="col-md-1"><button class="btn btn-primary">Pilih</button></div>
        <div class="col-md-4"></div>
    </div>
    <?php
    if ($_GET['act'] == 'tampil') {
        include '../config/connection.php';
        $q = $_POST['waktu'];
        $data = naikPangkat($con, $q);
        echo "<table>
        <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Tanggal Kenaikan Pangkat</th>
        <th>Jatuh Dalam Tempo</th>
        </tr>";
        $no = 1;
        while ($row = mysqli_fetch_array($data)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['nip'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['tgl_pangkat_terakhir'] . "</td>";
            echo "<td>" . kenaikanSelanjutnya($row['tgl_pangkat_terakhir'], $row['periode_kenaikan'], $row['percepatan_kenaikan'], $row['penundaan_kenaikan']) . "</td>";
            echo "<td>" . tempo($row['tgl_pangkat_terakhir'], $row['periode_kenaikan'], $row['percepatan_kenaikan'], $row['penundaan_kenaikan']) . "</td>";
            // echo "<td><a href=cetak_gaji.php".<?=?nip=<?php echo $row1['nip']. " target='_blank' class='btn btn-xs btn-success'><i class='fa fa-print btn-xs'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?> -->
    <div style="height:20px"></div>
    <div class="box">
        <div class="box-body">
            <table id="table-data" class="table table-striped datatab">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal Promosi Pangkat</th>
                        <th>Jatuh Dalam Tempo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connection.php';
                    $data1 = naikPangkat($con, 'Y-12-31');
                    $nip = [];
                    while ($row2 = mysqli_fetch_array($data1)) {
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
                                array_push($nip, $row2['nip']);
                            }
                        }
                    }
                    $angka = count($nip);
                    if ($angka == 0) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <p>Tidak Ada Pegawai Yang Harus Di Promosikan Pangkatnya Silahkan <a href="?module">kembali</a></p>
                        </div>
                    <?php } else { ?>
                        <div class="row" style="text-align: center">
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissable">
                                    <p>Apabila Ada Pegawai Yang Mengalami <b>Penundaan</b> Promosi Pangkat Reguler Silahkan Klik <a href="?module=naik-pangkat/percepatan">Disini</a></p>
                                </div>
                            </div>
                        </div>
                        <p>Berikut ini adalah daftar pegawai yang harus di update pangkatnya sampai dengan tahun ini</p>
                        <?php
                        $a = implode("','", $nip);
                        $data4 = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip WHERE pangkat_terakhir.nip IN('$a')");
                        $no = 1;
                        while ($row1 = mysqli_fetch_array($data4)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row1['nip']; ?></td>
                                <td><?php echo $row1['nama']; ?></td>
                                <td><?php echo kenaikanSelanjutnya($row1['tgl_pangkat_terakhir'], $row1['periode_kenaikan'], $row1['percepatan_kenaikan'], $row1['penundaan_kenaikan']) ?></td>
                                <td><?php tempo($row1['tgl_pangkat_terakhir'], $row1['periode_kenaikan'], $row1['percepatan_kenaikan'], $row1['penundaan_kenaikan']) ?></td>
                                <td><a href="#" class="btn btn-info btn-sm" data-target="#alert-upload<?php echo $row1['nip']; ?>" data-toggle="modal">Update</i></a>
                                    <div class="modal fade" id="alert-upload<?php echo $row1['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Perhatian!!</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="col-md-12">
                                                            <p>Sebelum anda melakukan update pangkat pegawai harap di cek kembali hal-hal berikut;</p>
                                                            <ol>
                                                                <li>tidak menduduki jabatan struktural atau jabatan fungsional tertentu;</li>
                                                                <li>melaksanakan tugas belajar dan sebelumnya tidak menduduki jabatan struktural atau jabatan fungsional tertentu;</li>
                                                                <li>dipekerjakan atau diperbantukan secara penuh di luar instansi induk dan tidak menduduki jabatan struktural atau jabatan fungsional tertentu.</li>
                                                                <li>Kenaikan pangkat sebagaimana dimaksud dalam ayat <b>(1)</b> diberikan sepanjang tidak melampaui pangkat atasan langsungnya.</li>
                                                                <li>sekurang-kurangnya telah 4 (empat) tahun dalam pangkat terakhir;</li>
                                                                <li>setiap unsur penilaian prestasi kerja sekurang-kurangnya bernilai baik dalam 2 (dua) tahun terakhir.</li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="submit" target="_blank" href="?module=naik-pangkat/naik_pangkat&nip=<?php echo $row1['nip']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>

    </div>
</section>