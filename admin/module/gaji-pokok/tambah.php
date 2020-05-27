    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Gaji Pokok PNS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?module=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Gaji Pokok PNS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $mkg = $_POST['mkg'];
        include '../config/connection.php';
        $sql = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$mkg'");

        ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <p>Gaji Pokok PNS dengan Masa Kerja Golongan <?= $mkg ?> tahun</h5>
                        </div>
                        <!-- /.card-header -->
                        <form action="?module=pegawai/function-proses&act=tambah" method="POST">
                            <div class="card-body">
                                <?php
                                // for ($i = 2; $i <= 32; $i++) {
                                switch ($mkg) {
                                    case 0:
                                ?>
                                        <input type="hidden" value="0" name="mkg">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan I.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="gaji[]" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.e</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.e" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                    <?php
                                        break;

                                    case 1:
                                    ?>
                                        <input type="hidden" value="1" name="mkg">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                    <?php
                                        break;

                                    case $mkg % 2 == 0:                                    ?>
                                        <input type="hidden" value="<?= $mkg ?>" name="mkg">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan I.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="I.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan III.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="III.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan IV.e</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="IV.e" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                    <?php
                                        break;
                                    default:
                                    ?>
                                        <input type="hidden" value="<?= $mkg ?>" name="mkg">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan I.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="I.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan I.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="I.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan I.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="I.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.a</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.a" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.b</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.b" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.c</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.c" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label style="position:relative; top:7px;">Golongan II.d</label>
                                            </div>
                                            <div class="col-xl-8">
                                                <input type="number" name="II.d" class="form-control">
                                            </div>
                                        </div>
                                        <div style="height:10px"></div>
                                <?php
                                }
                                ?>
                                <div class="row">
                                    <div style="width: 100%" class="col-md-12">
                                        <button style="width: 100%" type="submit" class="btn btn-warning">Submit</button>
                                    </div>
                                </div>
                        </form>
                        <!-- </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <table>
                                        <!-- <?php
                                                $result = [];
                                                while ($d = mysqli_fetch_array($sql)) {
                                                    array_push(
                                                        $result,
                                                        [
                                                            'id_gaji' => $d['id_gaji'],
                                                            'mkg' => $d['mkg'],
                                                            'id_golongan' => $d['id_golongan'],
                                                            'gaji' => $d['gaji'],
                                                            'id_peraturan' => $d['id_peraturan'],
                                                        ]
                                                    );
                                                } ?> -->
                        <!-- <tr>
                                            <td>Golongan I.a</td>
                                            <?php if ($d['id_golongan'] = 'I.a') {
                                                echo "<td><input type='number' class='form-control' value ='" . $d['gaji'] . "'></td>";
                                            }  ?> -->
                        <!-- </tr>

                                        <tr>
                                            <td>Golongan I.c</td>
                                        </tr>
                                        <tr>
                                            <td>Golongan I.d</td>
                                        </tr>
                                        <tr>
                                            <td>Golongan II.a</td>
                                        </tr>
                                        <tr>
                                            <td>Golongan II.b</td>
                                        </tr>
                                        <tr>
                                            <td>Golongan II.c</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-8">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <form action=""></form>
    </section>