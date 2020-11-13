    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?module=pegawai/index">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div style="text-align: center">
                            <h3 class="card-title center">Biodata Pegawai</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="?module=pegawai/function-proses&act=tambah">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label>NIP Pegawai</label>
                                <input type="number" class="form-control" name="nip" placeholder="NIP Pegawai ">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan" id="">
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Pendidikan</label>
                                <input type="text" class="form-control" name="ket_pendidikan" placeholder="Misal : S1 Pendidikan Agama Islam ">
                            </div>
                        </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title center">Promosi Pangkat Terakhir <sup style="color:red"> (Lihat SK Promosi Pangkat Terakhir)</sup></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Masa Kerja Golongan</label>
                            <div class="row">
                                <div class="col-md-6"> <input required type="number" name="mkg_pangkat_tahun" class="form-control" placeholder="Tahun"></div>
                                <div class="col-md-6"><input required type="number" name="mkg_pangkat_bulan" class="form-control" placeholder="Bulan"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dalam Golongan</label>
                            <select required class="form-control" name="golongan_pangkat">
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                while ($d = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Terhitung Mulai Tanggal</label>
                            <input required type="date" name="tmt_pangkat" class="form-control" placeholder="Terhitung Mulai Tanggal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title-center">Kenaikan Gaji Berkala Terakhir <sup style="color:red">(Lihat SK Kenaikan Gaji Berkala Terakhir)</sup></h8>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>No Surat</label>
                            <input required type="text" name="no_surat" class="form-control" placeholder="No Surat">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input required type="date" class="form-control" name="tgl_surat">
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <div class="row">
                                <div class="col-md-6"> <input required type="number" name="gapok" class="form-control" placeholder="Gaji Pokok"></div>
                                <div class="col-md-6"><input required type="text" name="pp" class="form-control" placeholder="Berdasarkan PP"></div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Berdasarkan Masa Kerja Golongan</label>
                            <div class="row">
                                <div class="col-md-6"> <input required type="number" name="mkg_kgb_tahun" class="form-control" placeholder="Tahun"></div>
                                <div class="col-md-6"><input required type="number" name="mkg_kgb_bulan" class="form-control" placeholder="Bulan"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dalam Golongan</label>
                            <select required class="form-control" name="golongan_kgb">
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                while ($d = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Terhitung Mulai Tanggal</label>
                            <input required type="date" name="tmt_kgb" class="form-control" placeholder="Terhitung Mulai Tanggal">
                        </div>
                        <div class="form-group">
                            <label>Scan SK Kenaikan Gaji Berkala Terakhir</label>
                            <input required type="file" name="file_sk" class="form-control" placeholder="Terhitung Mulai Tanggal">
                            <sup style="color:red"><b>*File harus berformat PDF</b></sup><br>
                            <sup style="color:red"><b>*File harus berukuran kurang dari 1 MB</b></sup>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h6 class="card-title-center">Periode</h6>
                    </div>
                    <div class="card-body">
                        <div style="display:flex; ">
                            <label style="width:70px" for="">Note :</label>
                            <div style="display:flex; flex-direction: column;">
                                <ol>
                                    <li><span>Periode <b>Promosi Pangkat</b> secara otomatis adalah <b style="color:red">4</b> tahun sekali, Apabila anda ingin mengubahnya silahkan ubah pada form berikut.</span></li>
                                    <li><span>Periode <b>Kenaikan Gaji Berkala</b> secara otomatis adalah <b style="color:red">2</b> tahun sekali, Apabila anda ingin mengubahnya silahkan ubah pada form berikut.</span></li>
                                </ol>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Periode Promosi Pangkat</label>
                            <input type="number" name="periode_pangkat" placeholder="Periode Promosi Pangkat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Periode Kenaikan Gaji Berkala</label>
                            <input type="number" name="periode_kgb" placeholder="Periode Kenaikan Gaji Berkala" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" style="width:100%" type='button' class="btn btn-success">Submit All</button>
                </form>
            </div>
        </div>
        <div style="height:15px"></div>

    </section>