<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h6>Penundaan KGB (Kenaikan Gaji Berkala) Pegawai PNS</h6>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?module=kgb/index">Home</a></li>
                    <li class="breadcrumb-item active">Penundaan KGB</li>
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
                                    <th>Tanggal KGB Terakhir</th>
                                    <th>Tanggal KGB Selanjutnya</th>
                                    <th>Penundaan KGB</th>
                                    <th>Periode KGB</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../config/connection.php');
                                $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN kgb_terakhir
                                    ON pegawai.nip=kgb_terakhir.nip");
                                $no = 1;
                                while ($p = mysqli_fetch_array($data)) {
                                    $percepatan = $p['percepatan_kgb'];
                                    if ($percepatan > 0) {
                                    } else {
                                ?>
                                        <tr>

                                            <td><?= $no++; ?></td>
                                            <td><?= $p['nip']; ?></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= date('d-m-Y', strtotime($p['tgl_kgb_terakhir'])); ?></td>
                                            <td><?= kenaikanSelanjutnya($p['tgl_kgb_terakhir'], $p['periode_kgb'], $p['percepatan_kgb'], $p['penundaan_kgb']) ?>
                                            </td>
                                            <td><?= $p['penundaan_kgb']; ?> tahun</td>
                                            <td><?= $p['periode_kgb']; ?> tahun</td>
                                            <td>
                                                <div id="thanks">
                                                    <a type="button" href="#addpenundaan<?php echo $p['nip']; ?>" class="btn btn-info btn-sm" data-toggle="modal"> <i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="#deletepenundaan<?php echo $p['nip']; ?>" data-toggle="modal">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                                <?php include('edit.php'); ?>
                                            </td>

                                        </tr>
                                <?php
                                    }
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Ketentuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info alert-dismissable">
                        <p>Penundaan hanya berlaku satu kali penggunaaan,
                            Apabila pegawai sudah di <b>Update</b> KGB nya maka KGB yang akan datang tidak mengalami penundaan</p>
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                        <silahkan>Pegawai yang sedang dalam masa penundaan KGB maka tidak dapat di lakukan penundaan KGB
                            .Jika anda ingin melakukan penundaan KGB, silahkan hapus penundaan KGB terlebih dahulu <a href="?module=naik-pangkat/penundaan">Disini</a>
                            </>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>