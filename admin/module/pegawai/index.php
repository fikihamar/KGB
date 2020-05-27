<?php
include '../config/connection.php';
//cek kenaikan pangkat
$data1 = mysqli_query($con, "SELECT * FROM pegawai Left Join  golongan ON pegawai.id_golongan=golongan.id_golongan
 INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi ORDER BY pegawai.id_golongan DESC");
?>
<html>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data PNS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?=module/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">PNS</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="box">
        <div class="box-header">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
            <div class="modal fade bd-example " id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Penambahan Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form method="POST" enctype="multipart/form-data" action="?module=pegawai/function-proses&act=delete-all&nip=<?= $row1['nip'] ?>">
                                    <div>
                                        <span>Sebelum anda menginput pegawai baru harap mempersiapkan dokumen-dokumen di bawah ini.</span><br><br>
                                        <span>&ensp;<b>1.</b>&ensp;Scan Surat Keputusan terakhir tentang Kenaikan Gaji Berkala dalam bentuk PDF dan berukuran kurang dari 1 MB</span><br>
                                        <span>&ensp;<b>2.</b>&ensp;Surat Keputusan terakhir tentang Promosi Pangkat Terakhir/kenaikan pangkat terakhir </span>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <a href="?module=pegawai/tambah" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Oke</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 20px"></div>
        <div class="box-body">
            <table id="table-data" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Pangkat / Golongan</th>
                        <th>Kantor</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row1 = mysqli_fetch_array($data1)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row1['nip']; ?></td>
                            <td><?php echo $row1['nama']; ?></td>
                            <td><?php if (($row1['nama_golongan'] != "" && ($row1['id_golongan'] != ""))) {
                                    echo $row1['nama_golongan']; ?>/<?= $row1['id_golongan'];
                                                                } else {
                                                                    echo "<span class='badge badge-pill badge-warning'>Belum di isi</span>";
                                                                }
                                                                    ?></td>
                            <td><?= $row1['nama_instansi'] . ' ' . $row1['status'] . ' ' . $row1['nama_status'] ?></td>
                            <td>
                                <div id="thanks"><a class="btn btn-info" data-placement="bottom" data-toggle="tooltip" title="Lihat Info Pegawai" href="?module=pegawai/profile&nip=<?php echo $row1['nip']; ?>">
                                        <i class="fa fa-folder-open"></i>
                                    </a>
                                    <a class="btn btn-danger" data-toggle="modal" title="Delete Pegawai" href="#delete-all<?= $row1['nip']; ?>">
                                        <i class="fa fa-trash"></i></a>
                                    <div class="modal fade bd-example" id="delete-all<?= $row1['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <?php $data4 = mysqli_query($con, "SELECT * FROM pegawai  WHERE nip='" . $row1['nip'] . "'");
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
                                                            <form method="POST" enctype="multipart/form-data" action="?module=pegawai/function-proses&act=delete-all&nip=<?= $row1['nip'] ?>">
                                                                <div style="text-align: center">
                                                                    <span>Apakah Anda Yakin Ingin Menghapus Data <b><?= $j['nama'] ?></b> ??</span>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <b>
                                                                        <h4 style="color: red">Peringatan!!!</h4><br><span> Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan
                                                                    </b></span>
                                                                </div>
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
                                </div>
                            </td>
                        </tr>
        </div>
        </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>

    </div>
    </div>
</section>