<!-- Content Header (Page header) -->
<?php
include "../config/connection.php";
$data = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN golongan ON gaji_pokok.id_golongan=golongan.id_golongan 
INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan");
$c = mysqli_fetch_array($data);
$jum_gol = mysqli_query($con, "SELECT * FROM gaji_pokok");
$cek_gol = mysqli_num_rows($jum_gol);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Gaji Pokok PNS</h1>
                <span class='badge badge-pill badge-warning'><?= $c['nama_pp'] ?></span>
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
    <a href="#" class="btn btn-info" data-target="#ubah-pp" data-toggle="modal">Ubah PP</a>
    <div class="modal fade" id="ubah-pp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Peraturan Pemerintah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p>Berdasarkan </p>
                        <form method="POST" enctype="multipart/form-data" action="?module=gaji-pokok/function-proses&act=tambah">
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">MKG</label>
                                </div>
                                <div class="col-xl-8">
                                    <select name="mkg" class="form-control" required>
                                        <?php
                                        for ($i = 0; $i <= 33; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div style="height: 10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Golongan</label>
                                </div>
                                <div class="col-xl-8">
                                    <select required class="form-control" name="golongan">
                                        <?php
                                        $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                        while ($d = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div style="height: 10px;"></div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <label style="position:relative; top:7px;">Gaji Pokok</label>
                                </div>
                                <div class="col-xl-8">
                                    <input type="number" class="form-control" required name="gapok">
                                </div>
                            </div>
                            <div style="height: 10px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pp"><a href="#" class="btn btn-custom-blue" data-target="#add-gaji" data-toggle="modal">Tambah</a>
        <div class="modal fade" id="add-gaji" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Gaji</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="POST" enctype="multipart/form-data" action="?module=gaji-pokok/function-proses&act=tambah">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">MKG</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <select name="mkg" class="form-control" required>
                                            <?php
                                            for ($i = 0; $i <= 33; $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="height: 10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Golongan</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <select required class="form-control" name="golongan">
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM golongan ORDER BY id_golongan");
                                            while ($d = mysqli_fetch_array($sql)) { ?>
                                                <option value="<?= $d['id_golongan'] ?>"><?php echo $d['nama_golongan']; ?>/<?php echo $d['id_golongan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="height: 10px;"></div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label style="position:relative; top:7px;">Gaji Pokok</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <input type="number" class="form-control" required name="gapok">
                                    </div>
                                </div>
                                <div style="height: 10px;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span>Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 20px"></div>
    <form method="GET" action="?module=gaji-pokok/index">
        <input type="hidden" name="module" value="gaji-pokok/index"> <input type="hidden" name="act" value="tampil" id="">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
                <select name="golongan" class="form-control">
                    <option value="I">Golongan I</option>
                    <option value="II">Golongan II</option>
                    <option value="III">Golongan III</option>
                    <option value="IV">Golongan IV</option>
                </select>
            </div>
            <div class="col-1"><button type="submit" class="btn btn-info">Tampilkan</button></div>
    </form>
    </div>
    <div style="height: 20px"></div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (empty($_GET)) {
                        } elseif (isset($_GET)) {
                            if ($_GET['act'] == 'tampil') {
                                $golongan = $_GET['golongan'];
                                if ($golongan == "I") { ?>
                                    <table style="text-align: center;" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan=" 2">Masa Kerja Golongan</th>
                                                <th colspan="4">Golongan I</th>
                                                <th rowspan="2">Opsi</th>
                                            </tr>
                                            <tr>
                                                <th>I.a</th>
                                                <th>I.b</th>
                                                <th>I.c</th>
                                                <th>I.d</th>
                                            </tr>
                                        </thead>
                                        <tbody id="fill-data">
                                            <?php
                                            include '../config/connection.php';
                                            $query = mysqli_query($con, "SELECT DISTINCT mkg FROM gaji_pokok WHERE id_golongan IN ('I.a','I.b','I.c','I.d') ORDER BY mkg ASC");
                                            while ($d = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $d['mkg'] ?></td>
                                                    <?php
                                                    $gaji = mysqli_query($con, "SELECT DISTINCT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='I.a'");
                                                    $a = mysqli_fetch_array($gaji);
                                                    if ($a['gaji'] != "") {
                                                        echo "<td>{$a['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $b = mysqli_fetch_array(mysqli_query($con, "SELECT  DISTINCT  gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='I.b'"));
                                                    if ($b['gaji'] != "") {
                                                        echo "<td>{$b['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $c = mysqli_fetch_array(mysqli_query($con, "SELECT  DISTINCT  gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='I.c'"));
                                                    if ($c['gaji'] != "") {
                                                        echo "<td>{$c['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $f = mysqli_fetch_array(mysqli_query($con, "SELECT DISTINCT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='I.d'"));
                                                    if ($f['gaji'] != "") {
                                                        echo "<td>{$f['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    ?>
                                                    <td> <a href="#editfileI<?= $d['mkg'] ?>" class="btn btn-info btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Edit</a>
                                                        <div class="modal fade bd-example-modal-lg" id="editfileI<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('I.a','I.b','I.c','I.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=edit-I&mkg=<?= $d['mkg'] ?>">
                                                                                <input type="hidden" name="a">
                                                                                <input type="hidden" name="b">
                                                                                <input type="hidden" name="c">
                                                                                <input type="hidden" name="d">
                                                                                <?php if ($Ia > 0) {
                                                                                    echo " <label style='top:7px;'>Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun </span>tidak tersedia</label>";
                                                                                }
                                                                                while ($z = mysqli_fetch_array($data4)) {
                                                                                    if ($z['id_golongan'] == "I.a") { ?>
                                                                                        <input type="hidden" value="I">
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan I.a</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="a" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "I.b") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan I.b</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="b" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "I.c") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan I.c</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="c" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "I.d") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan I.d</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="d" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                <?php
                                                                                    }
                                                                                } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#hapusfileI<?= $d['mkg'] ?>" class="btn btn-danger btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Hapus</a>
                                                        <div class="modal fade bd-example-modal-lg" id="hapusfileI<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('I.a','I.b','I.c','I.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$d[mkg]'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=hapus&mkg=<?= $d['mkg'] ?>">
                                                                                <?php
                                                                                $gol = [];
                                                                                if ($Ia > 0) {
                                                                                    while ($z = mysqli_fetch_array($data4)) {
                                                                                        if ($z['id_golongan'] == 'I.a') {
                                                                                            array_push($gol, "'I.a'");
                                                                                        } elseif ($z['id_golongan'] == 'I.b') {
                                                                                            array_push($gol, "'I.b'");
                                                                                        } elseif ($z['id_golongan'] == 'I.c') {
                                                                                            array_push($gol, "'I.c'");
                                                                                        } elseif ($z['id_golongan'] == 'I.d') {
                                                                                            array_push($gol, "'I.d'");
                                                                                        }
                                                                                    }
                                                                                    $gol1 = implode(", ", $gol);
                                                                                    $sub = preg_replace("/[']/", '', $gol1);
                                                                                    echo " <label style='top:7px;'>Apakah anda yakin ingin menghapus gaji pokok Golongan <span style='color:red'>$sub</span> dengan masa kerja golongan <span style='color:red'>$d[mkg]</span> tahun??</span></label>
                                                                                    <br><br><h4 style='color:red'>Peringatan!!</h4> data yang sudah di hapus tidak dapat di kembalikan";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun </span>tidak tersedia</label>";
                                                                                } ?>
                                                                                <input type="hidden" name="golongan" value="<?= $gol1 ?>">
                                                                                <input type="hidden" name="gol" value="I">
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Delete</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } elseif ($golongan == "II") { ?>
                                    <table style="text-align: center;" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th rowspan=" 2">Masa Kerja Golongan</th>
                                                <th colspan="4">Golongan II</th>
                                                <th rowspan="2">Opsi</th>
                                            </tr>
                                            <tr>
                                                <th>II.a</th>
                                                <th>II.b</th>
                                                <th>II.c</th>
                                                <th>II.d</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include '../config/connection.php';
                                        $query = mysqli_query($con, "SELECT DISTINCT mkg FROM gaji_pokok WHERE id_golongan IN ('II.a','II.b','II.c','II.d') ORDER BY mkg");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $d['mkg'] ?></td>
                                                    <?php
                                                    $g = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='II.a'"));
                                                    if ($g['gaji'] != "") {
                                                        echo "<td>{$g['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $h = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='II.b'"));
                                                    if ($h['gaji'] != "") {
                                                        echo "<td>{$h['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $i = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='II.c'"));
                                                    if ($i['gaji'] != "") {
                                                        echo "<td>{$i['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $j = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='II.d'"));
                                                    if ($j['gaji'] != "") {
                                                        echo "<td>{$j['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    ?>
                                                    <td> <a href="#editfileII<?= $d['mkg'] ?>" class="btn btn-info btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Edit</a>
                                                        <div class="modal fade bd-example-modal-lg" id="editfileII<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('II.a','II.b','II.c','II.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' ORDER BY id_golongan ASC"); ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=edit-II&mkg=<?= $d['mkg'] ?>">
                                                                                <input type="hidden" name="a">
                                                                                <input type="hidden" name="b">
                                                                                <input type="hidden" name="c">
                                                                                <input type="hidden" name="d">
                                                                                <?php if ($Ia > 0) {
                                                                                    echo " <label style='top:7px;'>Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun </span>tidak tersedia</label>";
                                                                                }
                                                                                while ($z = mysqli_fetch_array($data4)) {
                                                                                    if ($z['id_golongan'] == "II.a") { ?>
                                                                                        <input type="hidden" value="II">
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan II.a</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="a" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "II.b") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan II.b</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="b" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "II.c") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan II.c</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="c" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "II.d") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan II.d</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="d" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                <?php
                                                                                    }
                                                                                } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#hapusfileII<?= $d['mkg'] ?>" class="btn btn-danger btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Hapus</a>
                                                        <div class="modal fade bd-example-modal-lg" id="hapusfileII<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('II.a','II.b','II.c','II.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$d[mkg]'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=hapus&mkg=<?= $d['mkg'] ?>">
                                                                                <?php
                                                                                $gol = [];
                                                                                if ($Ia > 0) {
                                                                                    while ($z = mysqli_fetch_array($data4)) {
                                                                                        if ($z['id_golongan'] == 'II.a') {
                                                                                            array_push($gol, "'II.a'");
                                                                                        } elseif ($z['id_golongan'] == 'II.b') {
                                                                                            array_push($gol, "'II.b'");
                                                                                        } elseif ($z['id_golongan'] == 'II.c') {
                                                                                            array_push($gol, "'II.c'");
                                                                                        } elseif ($z['id_golongan'] == 'II.d') {
                                                                                            array_push($gol, "'II.d'");
                                                                                        }
                                                                                    }
                                                                                    $gol1 = implode(", ", $gol);
                                                                                    $sub = preg_replace("/[']/", '', $gol1);
                                                                                    echo " <label style='top:7px;'>Apakah anda yakin ingin menghapus gaji pokok Golongan <span style='color:red'>$sub</span> dengan masa kerja golongan <span style='color:red'>$d[mkg]</span> tahun??</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> $d[mkg] tahun </span>tidak tersedia</label>";
                                                                                } ?>
                                                                                <input type="hidden" name="golongan" value="<?= $gol1 ?>">
                                                                                <input type="hidden" name="gol" value="II">
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Delete</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php }
                                        ?>
                                    </table>
                                <?php
                                } elseif ($golongan == "III") { ?>
                                    <table style="text-align: center;" class="table table-bordered  ">
                                        <thead>
                                            <tr>
                                                <th rowspan=" 2">Masa Kerja Golongan</th>
                                                <th colspan="4">Golongan III</th>
                                                <th rowspan="2">Opsi</th>
                                            </tr>
                                            <tr>
                                                <th>III.a</th>
                                                <th>III.b</th>
                                                <th>III.c</th>
                                                <th>III.d</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include '../config/connection.php';
                                        $query = mysqli_query($con, "SELECT DISTINCT mkg FROM gaji_pokok   WHERE id_golongan IN ('III.a','III.b','III.c','III.d') ORDER BY mkg ASC");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tbody id="fill-data">
                                                <tr>
                                                    <td><?= $d['mkg'] ?></td>
                                                    <?php
                                                    $g = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='III.a'"));
                                                    if ($g['gaji'] != "") {
                                                        echo "<td>{$g['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $h = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='III.b'"));
                                                    if ($h['gaji'] != "") {
                                                        echo "<td>{$h['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $i = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='III.c'"));
                                                    if ($i['gaji'] != "") {
                                                        echo "<td>{$i['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $j = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='III.d'"));
                                                    if ($j['gaji'] != "") {
                                                        echo "<td>{$j['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    ?>
                                                    <td> <a href="#editfileI<?= $d['mkg'] ?>" class="btn btn-info btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Edit</a>
                                                        <div class="modal fade bd-example-modal-lg" id="editfileI<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('III.a','III.b','III.c','III.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=edit-III&mkg=<?= $d['mkg'] ?>">
                                                                                <input type="hidden" name="a">
                                                                                <input type="hidden" name="b">
                                                                                <input type="hidden" name="c">
                                                                                <input type="hidden" name="d">
                                                                                <?php if ($Ia > 0) {
                                                                                    echo " <label style='top:7px;'>Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun </span>tidak tersedia</label>";
                                                                                }
                                                                                while ($z = mysqli_fetch_array($data4)) {
                                                                                    if ($z['id_golongan'] == "III.a") { ?>
                                                                                        <input type="hidden" value="I">
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan III.a</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="a" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "III.b") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan III.b</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="b" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "III.c") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan III.c</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="c" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "III.d") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan III.d</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="d" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                <?php
                                                                                    }
                                                                                } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#hapusfileIII<?= $d['mkg'] ?>" class="btn btn-danger btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Hapus</a>
                                                        <div class="modal fade bd-example-modal-lg" id="hapusfileIII<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('III.a','III.b','III.c','III.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$d[mkg]'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=hapus&mkg=<?= $d['mkg'] ?>">
                                                                                <?php
                                                                                $gol = [];
                                                                                if ($Ia > 0) {
                                                                                    while ($z = mysqli_fetch_array($data4)) {
                                                                                        if ($z['id_golongan'] == 'III.a') {
                                                                                            array_push($gol, "'III.a'");
                                                                                        } elseif ($z['id_golongan'] == 'III.b') {
                                                                                            array_push($gol, "'III.b'");
                                                                                        } elseif ($z['id_golongan'] == 'III.c') {
                                                                                            array_push($gol, "'III.c'");
                                                                                        } elseif ($z['id_golongan'] == 'III.d') {
                                                                                            array_push($gol, "'III.d'");
                                                                                        }
                                                                                    }
                                                                                    $gol1 = implode(", ", $gol);
                                                                                    $sub = preg_replace("/[']/", '', $gol1);
                                                                                    echo " <label style='top:7px;'>Apakah anda yakin ingin menghapus gaji pokok Golongan <span style='color:red'>$sub</span> dengan masa kerja golongan <span style='color:red'>$d[mkg]</span> tahun??</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> $d[mkg] tahun </span>tidak tersedia</label>";
                                                                                } ?>
                                                                                <input type="hidden" name="golongan" value="<?= $gol1 ?>">
                                                                                <input type="hidden" name="gol" value="III">
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Delete</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                <?php
                                } elseif ($golongan == "IV") { ?>
                                    <table style="text-align: center;" class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th rowspan=" 2">Masa Kerja Golongan</th>
                                                <th colspan="5">Golongan IV</th>
                                                <th rowspan="2">Opsi</th>
                                            </tr>
                                            <tr>
                                                <th>IV.a</th>
                                                <th>IV.b</th>
                                                <th>IV.c</th>
                                                <th>IV.d</th>
                                                <th>IV.e</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include '../config/connection.php';
                                        $query = mysqli_query($con, "SELECT DISTINCT mkg FROM gaji_pokok  WHERE id_golongan IN ('IV.a','IV.b','IV.c','IV.d','IV.e') ORDER BY mkg ASC");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tbody id="fill-data">
                                                <tr>
                                                    <td><?= $d['mkg'] ?></td>
                                                    <?php
                                                    $g = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='IV.a'"));
                                                    if ($g['gaji'] != "") {
                                                        echo "<td>{$g['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $h = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='IV.b'"));
                                                    if ($h['gaji'] != "") {
                                                        echo "<td>{$h['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $i = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='IV.c'"));
                                                    if ($i['gaji'] != "") {
                                                        echo "<td>{$i['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $j = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='IV.d'"));
                                                    if ($j['gaji'] != "") {
                                                        echo "<td>{$j['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    $k = mysqli_fetch_array(mysqli_query($con, "SELECT gaji FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan='IV.e'"));
                                                    if ($k['gaji'] != "") {
                                                        echo "<td>{$k['gaji']}</td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    ?>
                                                    <td> <a href="#editfileI<?= $d['mkg'] ?>" class="btn btn-info btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Edit</a>
                                                        <div class="modal fade bd-example-modal-lg" id="editfileI<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('IV.a','IV.b','IV.c','IV.d','IV.e')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=edit-IV&mkg=<?= $d['mkg'] ?>">
                                                                                <input type="hidden" name="a">
                                                                                <input type="hidden" name="b">
                                                                                <input type="hidden" name="c">
                                                                                <input type="hidden" name="d">
                                                                                <input type="hidden" name="e">
                                                                                <?php if ($Ia > 0) {
                                                                                    echo " <label style='top:7px;'>Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> {$d['mkg']} tahun </span>tidak tersedia</label>";
                                                                                }
                                                                                while ($z = mysqli_fetch_array($data4)) {
                                                                                    if ($z['id_golongan'] == "IV.a") { ?>
                                                                                        <input type="hidden" value="I">
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan IV.a</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="a" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "IV.b") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan IV.b</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="b" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "IV.c") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan IV.c</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="c" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php  }
                                                                                    if ($z['id_golongan'] == "IV.d") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan IV.d</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="d" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    if ($z['id_golongan'] == "IV.e") { ?>
                                                                                        <div style="height: 10px"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-xl-4">
                                                                                                <label style="position:relative; top:7px;">Golongan IV.e</label>
                                                                                            </div>
                                                                                            <div class="col-xl-8">
                                                                                                <input type="number" name="e" class="form-control" required value="<?= $z['gaji'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                <?php
                                                                                    }
                                                                                } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#hapusfileIII<?= $d['mkg'] ?>" class="btn btn-danger btn-xs" data-toggle="modal" class="btn btn-success btn-xs">Hapus</a>
                                                        <div class="modal fade bd-example-modal-lg" id="hapusfileIII<?php echo $d['mkg']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <?php $Ia = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='{$d['mkg']}' AND id_golongan IN ('IV.a','IV.b','IV.c','IV.d')"));
                                                                $data4 = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$d[mkg]'");
                                                                ?>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Hapus Gaji</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form method="POST" action="?module=gaji-pokok/function-proses&act=hapus&mkg=<?= $d['mkg'] ?>">
                                                                                <?php
                                                                                $gol = [];
                                                                                if ($Ia > 0) {
                                                                                    while ($z = mysqli_fetch_array($data4)) {
                                                                                        if ($z['id_golongan'] == 'IV.a') {
                                                                                            array_push($gol, "'IV.a'");
                                                                                        } elseif ($z['id_golongan'] == 'IV.b') {
                                                                                            array_push($gol, "'IV.b'");
                                                                                        } elseif ($z['id_golongan'] == 'IV.c') {
                                                                                            array_push($gol, "'IV.c'");
                                                                                        } elseif ($z['id_golongan'] == 'IV.d') {
                                                                                            array_push($gol, "'IV.d'");
                                                                                        } elseif ($z['id_golongan'] == 'IV.e') {
                                                                                            array_push($gol, "'IV.e'");
                                                                                        }
                                                                                    }
                                                                                    $gol1 = implode(", ", $gol);
                                                                                    $sub = preg_replace("/[']/", '', $gol1);
                                                                                    echo " <label style='top:7px;'>Apakah anda yakin ingin menghapus gaji pokok Golongan <span style='color:red'>$sub</span> dengan masa kerja golongan <span style='color:red'>$d[mkg]</span> tahun??</span></label>";
                                                                                } else {
                                                                                    echo " <label style='top:7px;'>Maaf Gaji Pokok PNS Dengan Masa Kerja Golongan (MKG) <span style='color: red'> $d[mkg] tahun </span>tidak tersedia</label>";
                                                                                } ?>
                                                                                <input type="hidden" name="golongan" value="<?= $gol1 ?>">
                                                                                <input type="hidden" name="gol" value="IV">
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($Ia > 0) { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Delete</button>
                                                                        </div>
                                                                        </form>
                                                                    <?php } else { ?>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Oke</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                <?php
                                } ?>


                        <?php }
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>