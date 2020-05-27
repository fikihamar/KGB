<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penundaan KP (Kenaikan Pangkat)</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?module=dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Percepatan KP</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama Pegawai</th>
                                    <th>KP Terakhir</th>
                                    <th>KP Selanjutnya</th>
                                    <th>Penundaan KP</th>
                                    <th>Periode KP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../config/connection.php');
                                $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir
                                    ON pegawai.nip=pangkat_terakhir.nip");
                                $no = 1;
                                while ($p = mysqli_fetch_array($data)) {
                                    $percepatan = $p['percepatan_kenaikan'];
                                    if ($percepatan == 0) {
                                ?>
                                        <tr>

                                            <td><?= $no++; ?></td>
                                            <td><?= $p['nip']; ?></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= date('d-m-Y', strtotime($p['tgl_pangkat_terakhir'])); ?></td>
                                            <td><?= kenaikanSelanjutnya($p['tgl_pangkat_terakhir'], $p['periode_kenaikan'], $p['percepatan_kenaikan'], $p['penundaan_kenaikan']) ?>
                                            </td>
                                            <td><?= $p['penundaan_kenaikan']; ?> tahun</td>
                                            <td><?= $p['periode_kenaikan']; ?> tahun</td>
                                            <td>
                                                <?php $pendidikan = $p['pendidikan'];
                                                $id_gol = $p['id_golongan'];
                                                $result = '';
                                                $angka = 0;
                                                if (($pendidikan == "SMA/SMK") || ($pendidikan == "D1") || ($pendidikan == "D2") && $id_gol != ("III.b")) {
                                                    $result = 'false';
                                                } elseif (($pendidikan == "D3") && $id_gol != ("III.c")) {
                                                    $result = 'false';
                                                } elseif (($pendidikan == "S1") && $id_gol != ("III.d")) {
                                                    $result = 'false';
                                                } elseif (($pendidikan == "S2") && $id_gol != ("IV.a")) {
                                                    $result = 'false';
                                                } elseif (($pendidikan == "S3") && $id_gol != ("IV.b")) {
                                                    $result = 'false';
                                                }
                                                if ($result != "") {
                                                    $angka = count(array($p['nip']));
                                                }
                                                if ($angka != 0) { ?>
                                                    <div id="thanks">
                                                        <a type="button" href="#addpenundaan<?php echo $p['nip']; ?>" class="btn btn-info btn-sm" data-toggle="modal"> <i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm" href="#deletepenundaan<?php echo $p['nip']; ?>" data-toggle="modal">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <?php include('edit.php'); ?>
                                                <?php } else { ?>
                                                    <a class="btn btn-danger btn-xs" data-toggle="modal" title="Delete User" href="#delete-all">
                                                        <i class="fa fa-info"></i>Info</a>
                                                    <div class="modal fade bd-example" id="delete-all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog ">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><span style="color: red"><b>Info</b></span> </h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div>
                                                                            <span>Berdasarkan PP Nomor 99 Tahun 2000 tentang Kenaikan Pangkat Pegawai Negeri Sipil BAB II pasal 8.<p>Pegawai ini telah memasuki maksimum kenaikan pangkat reguler berdasarkan golongan dan pendidikan terakhir nya. Sehingga tidak dapat mengalami percepatan kenaikan</p>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span>Oke</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                    <?php
                                                }
                                            } ?>
                                        </tr>
                                    <?php

                                }
                                    ?>
                                    <td></td>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Lihat Ketentuan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info alert-dismissable">
                        <p>Percepatan hanya berlaku satu kali penggunaaan,
                            Apabila pegawai sudah di promosikan jabatannya sesuai dengan percepatan kenaikan pangkat maka secara otomatis nilai percepatan akan berubah menjadi 0 kembali</p>
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                        <p>Pegawai yang sedang dalam masa percepatan promosi pangkat maka tidak dapat di lakukan penundaan promosi pangkat
                            . Jika anda ingin menunda promosi pangkat pegawai </p>
                        <p> silahkan hapus percepatan promosi pangkat terlebih dahulu <a href="?module=naik-pangkat/percepatan">Disini</a>
                            </>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>