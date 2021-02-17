<?php
include '../config/connection.php';
if ($_GET['act'] == 'upload') {
    $nip = $_POST['nip'];
    $peg = mysqli_query($con, "SELECT nama FROM pegawai WHERE nip='$nip'");
    $z = mysqli_fetch_array($peg);
    $nama = $z['nama'];
    $tahun_kgb = $_POST['tahun_kgb'];
    $tgl_arsip = date('Y-m-d');
    $ekstensi_diperbolehkan = 'pdf';
    $nama1 = $_FILES['file_upload']['name'];
    $tahun = $_POST['tahun_kgb'];
    $x = explode('.', $nama1);
    $awal = substr($nama1, 0, -4);
    $ekstensi = strtolower(end($x));
    $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    $ukuran    = $_FILES['file_upload']['size'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'");
    while ($a = mysqli_fetch_array($data)) {
        $tahun_db = $a['kgb_tahun'];
        if ($tahun === $tahun_db) {
            $message = "<script>alert('Upload Gagal Karena File Sudah Ada pada tahun tersebut Silahkan Cek Kembali');window.location.href = '?module=arsip-kgb/index'</script>";
        }
    }
    $data_cek = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip' AND kgb_tahun='$tahun'");
    $cek = mysqli_num_rows($data_cek);
    if ($cek > 0) {

        //update-kgb
        function bulan($mkg_bulan)
        {
            if ($mkg_bulan == 0) {
                $mkg = '00';
            } else if ($mkg_bulan > 9) {
                $mkg = $mkg_bulan;
            } else {
                $mkg = '0' . $mkg_bulan . '';
            }
            return $mkg;
        }

        $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
        INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip
        INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
        $d = mysqli_fetch_array($data);
        $tgl_surat = date('Y-m-d');
        $tahun = $d['mkg_tahun_kgb'] + $d['periode_kgb'] + $d['penundaan_kgb'] - $d['percepatan_kgb'];
        $bulan = bulan($d['mkg_bulan_kgb']);
        $id_gol = $d['id_golongan'];
        $gaji = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan WHERE gaji_pokok.mkg='$tahun' AND gaji_pokok.id_golongan='$id_gol'");
        $a = mysqli_fetch_array($gaji);
        $tgl_selanjutnya = date('Y-m-d', strtotime(kenaikanSelanjutnya($d['tgl_kgb_terakhir'], $d['periode_kgb'], $d['percepatan_kgb'], $d['penundaan_kgb'])));
        $update_db_kgb = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='',id_golongan_terakhir='$id_gol',
        tgl_kgb_terakhir='$tgl_selanjutnya',tgl_surat_terakhir='$tgl_surat',mkg_bulan_kgb='$bulan',mkg_tahun_kgb='$tahun',
        gapok_terakhir='" . $a['gaji'] . "',pp='" . $a['nama_pp'] . "',sk_kgb_terakhir='$nama1' WHERE nip='" . $d['nip'] . "'");
        echo "<script>alert('Sudah terdapat file KGB yang sudah di upload pada tahun $tahun_kgb');window.location.href = '?module=kgb/index&nip=$nip'</script>";
    } else {
        if ($ekstensi === $ekstensi_diperbolehkan) {
            if ($ukuran <= 1000000) {
                if (empty($message)) {
                    move_uploaded_file($file_tmp, '../assets/file-arsip/' . $nama1);
                    $tahun = $_POST['tahun_kgb'];
                    $kgb = mysqli_query($con, "INSERT INTO arsip_kgb (id_arsip,nip,nama,file_kgb,tgl_arsip,kgb_tahun) VALUES('','$nip','$nama','$nama1','$tgl_arsip','$tahun' )");
                    //update-kgb
                    function bulan($mkg_bulan)
                    {
                        if ($mkg_bulan == 0) {
                            $mkg = '00';
                        } else if ($mkg_bulan > 9) {
                            $mkg = $mkg_bulan;
                        } else {
                            $mkg = '0' . $mkg_bulan . '';
                        }
                        return $mkg;
                    }

                    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
                    INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip
                    INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
                    $d = mysqli_fetch_array($data);
                    $tgl_surat = date('Y-m-d');
                    $tahun = $d['mkg_tahun_kgb'] + $d['periode_kgb'] + $d['penundaan_kgb'] - $d['percepatan_kgb'];
                    $bulan = bulan($d['mkg_bulan_kgb']);
                    $id_gol = $d['id_golongan'];
                    $gaji = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan WHERE gaji_pokok.mkg='$tahun' AND gaji_pokok.id_golongan='$id_gol'");
                    $a = mysqli_fetch_array($gaji);
                    $tgl_selanjutnya = date('Y-m-d', strtotime(kenaikanSelanjutnya($d['tgl_kgb_terakhir'], $d['periode_kgb'], $d['percepatan_kgb'], $d['penundaan_kgb'])));
                    $update_db_kgb = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='',id_golongan_terakhir='$id_gol',
                    tgl_kgb_terakhir='$tgl_selanjutnya',tgl_surat_terakhir='$tgl_surat',mkg_bulan_kgb='$bulan',mkg_tahun_kgb='$tahun',
                    gapok_terakhir='" . $a['gaji'] . "',pp='" . $a['nama_pp'] . "',sk_kgb_terakhir='$nama1' WHERE nip='" . $d['nip'] . "'");
                    if ($kgb && $update_db_kgb) {
                        echo "<script>alert('Upload Succes');window.location.href = '?module=kgb/index'</script>";
                    } else {
                        echo "<script>alert('Upload gagal');window.location.href = '?module=kgb/upload'</script>";
                    }
                } else {
                    echo $message;
                }
            } else {
                echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=arsip-kgb/index'</script>";
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=arsip-kgb/index'</script>";
        }
    }
} elseif ($_GET['act'] == 'add-file') {
    $nip = $_POST['nip'];
    $peg = mysqli_query($con, "SELECT nama FROM pegawai WHERE nip='$nip'");
    $z = mysqli_fetch_array($peg);
    $nama = $z['nama'];
    $tahun = $_POST['tahun_kgb'];
    $tgl_arsip = date('Y-m-d');
    $ekstensi_diperbolehkan = 'pdf';
    $nama1 = $_FILES['file_upload']['name'];
    $x = explode('.', $nama1);
    $awal = substr($nama1, 0, -4);
    $ekstensi = strtolower(end($x));
    $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    $ukuran    = $_FILES['file_upload']['size'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'");
    while ($a = mysqli_fetch_array($data)) {
        $tahun_db = $a['kgb_tahun'];
        if ($tahun === $tahun_db) {
            $message = "<script>alert('Upload Gagal Karena File Sudah Ada pada tahun tersebut Silahkan Cek Kembali');window.location.href = '?module=arsip-kgb/index'</script>";
        }
    }
    if ($ekstensi === $ekstensi_diperbolehkan) {
        if ($ukuran <= 1000000) {
            if (empty($message)) {
                move_uploaded_file($file_tmp, '../assets/file-arsip/' . $file_upload);
                $kgb = mysqli_query($con, "INSERT INTO arsip_kgb (id_arsip,nip,nama,file_kgb,tgl_arsip,kgb_tahun) VALUES('','$nip','$nama','$file_upload','$tgl_arsip','$tahun' )");
                if ($kgb) {
                    echo "<script>alert('Upload Succes');window.location.href = '?module=arsip-kgb/index'</script>";
                } else {
                    echo "<script>alert('Upload gagal');window.location.href = '?module=arsip-kgb/index'</script>";
                }
            } else {
                echo $message;
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=arsip-kgb/index'</script>";
        }
    } else {
        echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=arsip-kgb/index'</script>";
    }
} elseif ($_GET['act'] == 'add-file-detail') {
    $nip = $_POST['nip'];
    $peg = mysqli_query($con, "SELECT nama FROM pegawai WHERE nip='$nip'");
    $z = mysqli_fetch_array($peg);
    $nama = $z['nama'];
    $tahun = $_POST['tahun_kgb'];
    $tgl_arsip = date('Y-m-d');
    $ekstensi_diperbolehkan = 'pdf';
    $nama1 = $_FILES['file_upload']['name'];
    $x = explode('.', $nama1);
    $awal = substr($nama1, 0, -4);
    $ekstensi = strtolower(end($x));
    $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    $ukuran    = $_FILES['file_upload']['size'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'");
    while ($a = mysqli_fetch_array($data)) {
        $tahun_db = $a['kgb_tahun'];
        if ($tahun === $tahun_db) {
            $message = "<script>alert('Upload Gagal Karena File Sudah Ada pada tahun tersebut Silahkan Cek Kembali');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
        }
    }
    if ($ekstensi === $ekstensi_diperbolehkan) {
        if ($ukuran <= 1000000) {
            if (empty($message)) {
                move_uploaded_file($file_tmp, '../assets/file-arsip/' . $file_upload);
                $kgb = mysqli_query($con, "INSERT INTO arsip_kgb (id_arsip,nip,nama,file_kgb,tgl_arsip,kgb_tahun) VALUES('','$nip','$nama','$file_upload','$tgl_arsip','$tahun' )");
                if ($kgb) {
                    echo "<script>alert('Upload Succes');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
                } else {
                    echo "<script>alert('Upload gagal');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
                }
            } else {
                echo $message;
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
        }
    } else {
        echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
    }
} elseif ($_GET['act'] == 'edit-file-detail') {
    $id = $_GET['id'];
    $nip = $_GET['nip'];
    $tahun = $_POST['tahun_kgb'];
    $tgl_arsip = date('Y-m-d');
    $ekstensi_diperbolehkan = 'pdf';
    $nama1 = $_FILES['file_upload']['name'];
    $x = explode('.', $nama1);
    $awal = substr($nama1, 0, -4);
    $ekstensi = strtolower(end($x));
    $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    $ukuran    = $_FILES['file_upload']['size'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'");
    while ($a = mysqli_fetch_array($data)) {
        $tahun_db = $a['kgb_tahun'];
        if ($tahun === $tahun_db) {

            $message = "<script>alert('Upload Gagal Karena File Sudah Ada pada tahun tersebut Silahkan Cek Kembali');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
        }
    }
    if ($ekstensi === $ekstensi_diperbolehkan) {
        if ($ukuran <= 1000000) {
            if (empty($message)) {
                move_uploaded_file($file_tmp, '../assets/file-arsip/' . $file_upload);
                $kgb = mysqli_query($con, "UPDATE arsip_kgb SET file_kgb='$nama1', tgl_arsip='$tgl_arsip' WHERE id_arsip='$id'");
                if ($kgb) {
                    echo "<script>alert('Update Succes');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
                } else {
                    echo "<script>alert('Update gagal');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
                }
            } else {
                echo $message;
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
        }
    } else {
        echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
    }
}  elseif ($_GET['act'] == "upload-data") {
    $nip = $_POST['nip'];
    $peg = mysqli_query($con, "SELECT nama FROM pegawai WHERE nip='$nip'");
    $z = mysqli_fetch_array($peg);
    $nama = $z['nama'];
    $tahun_kgb = $_POST['tahun_kgb'];
    $tgl_arsip = date('Y-m-d');
    $ekstensi_diperbolehkan = 'pdf';
    $nama1 = $_FILES['file_upload']['name'];
    $x = explode('.', $nama1);
    $awal = substr($nama1, 0, -4);
    $ekstensi = strtolower(end($x));
    $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    $ukuran    = $_FILES['file_upload']['size'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip'");
    $data_cek = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip' AND kgb_tahun='$tahun_kgb'");
    $cek = mysqli_num_rows($data_cek);
    if ($cek > 0) {
        if ($ekstensi === $ekstensi_diperbolehkan) {
            if ($ukuran <= 1000000) {
                if (empty($message)) {
                    move_uploaded_file($file_tmp, '../assets/file-arsip/' . $file_upload);
                    $tahun = $_POST['tahun_kgb'];
                    $kgb = mysqli_query($con, "UPDATE arsip_kgb SET file_kgb='$file_upload' WHERE nip='$nip' AND kgb_tahun='$tahun_kgb'");
                    //update-kgb
                    function bulan($mkg_bulan)
                    {
                        if ($mkg_bulan == 0) {
                            $mkg = '00';
                        } else if ($mkg_bulan > 9) {
                            $mkg = $mkg_bulan;
                        } else {
                            $mkg = '0' . $mkg_bulan . '';
                        }
                        return $mkg;
                    }
                    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
                    INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip
                    INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
                    $d = mysqli_fetch_array($data);
                    $tgl_surat = date('Y-m-d');
                    $tahun = $d['mkg_tahun_kgb'] + $d['periode_kgb'] - $d['percepatan_kgb'] + $d['penundaan_kgb'];
                    $bulan = bulan($d['mkg_bulan_kgb']);
                    $id_gol = $d['id_golongan'];
                    $gaji = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan WHERE gaji_pokok.mkg='$tahun' AND gaji_pokok.id_golongan='$id_gol'");
                    $a = mysqli_fetch_array($gaji);
                    $tgl_selanjutnya = date('Y-m-d', strtotime(kenaikanSelanjutnya($d['tgl_kgb_terakhir'], $d['periode_kgb'], $d['percepatan_kgb'], $d['penundaan_kgb'])));
                    $update_db_kgb = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='',id_golongan_terakhir='$id_gol'
                    ,percepatan_kgb='',penundaan_kgb='',tgl_kgb_terakhir='$tgl_selanjutnya',tgl_surat_terakhir='$tgl_surat',mkg_bulan_kgb='$bulan',mkg_tahun_kgb='$tahun',
                    gapok_terakhir='" . $a['gaji'] . "',pp='" . $a['nama_pp'] . "',sk_kgb_terakhir='$file_upload' WHERE nip='" . $d['nip'] . "'");
                    if ($kgb && $update_db_kgb) {
                        echo "<script>alert('Upload Succes dan data KGB berhasil di perbaharui');window.location.href = '?module=kgb/index'</script>";
                    } else {
                        echo "<script>alert('Upload gagal');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
                    }
                } else {
                    echo $message;
                }
            } else {
                echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
        }
    } else {
        if ($ekstensi === $ekstensi_diperbolehkan) {
            if ($ukuran <= 1000000) {
                if (empty($message)) {
                    move_uploaded_file($file_tmp, '../assets/file-arsip/' .  $file_upload);
                    $tahun = $_POST['tahun_kgb'];
                    $kgb = mysqli_query($con, "INSERT INTO arsip_kgb (id_arsip,nip,nama,file_kgb,tgl_arsip,kgb_tahun) VALUES('','$nip','$nama',' $file_upload','$tgl_arsip','$tahun' )");
                    //update-kgb
                    function bulan($mkg_bulan)
                    {
                        if ($mkg_bulan == 0) {
                            $mkg = '00';
                        } else if ($mkg_bulan > 9) {
                            $mkg = $mkg_bulan;
                        } else {
                            $mkg = '0' . $mkg_bulan . '';
                        }
                        return $mkg;
                    }

                    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
                    INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip
                    INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
                    $d = mysqli_fetch_array($data);
                    $tgl_surat = date('Y-m-d');
                    $tahun = $d['mkg_tahun_kgb'] + $d['periode_kgb'] - $d['percepatan_kgb'] - $d['penundaan_kgb'];
                    $bulan = bulan($d['mkg_bulan_kgb']);
                    $id_gol = $d['id_golongan'];
                    $gaji = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan WHERE gaji_pokok.mkg='$tahun' AND gaji_pokok.id_golongan='$id_gol'");
                    $a = mysqli_fetch_array($gaji);
                    $tgl_selanjutnya = date('Y-m-d', strtotime(kenaikanSelanjutnya($d['tgl_kgb_terakhir'], $d['periode_kgb'], $d['percepatan_kgb'], $d['penundaan_kgb'])));
                    $update_db_kgb = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='',id_golongan_terakhir='$id_gol',tgl_kgb_terakhir='$tgl_selanjutnya',
                    penundaan_kgb='',percepatan_kgb='',tgl_surat_terakhir='$tgl_surat',mkg_bulan_kgb='$bulan',mkg_tahun_kgb='$tahun',
                    gapok_terakhir='" . $a['gaji'] . "',pp='" . $a['nama_pp'] . "',sk_kgb_terakhir='$file_upload' WHERE nip='" . $d['nip'] . "'");
                    if ($kgb && $update_db_kgb) {
                        echo "<script>alert('Upload Succes');window.location.href = '?module=kgb/index'</script>";
                    } else {
                        echo "<script>alert('Upload gagal');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
                    }
                } else {
                    echo $message;
                }
            } else {
                echo "<script>alert('UPLOAD ARSIP KGB GAGAL UKURAN FILE TIDAK BOLEH LEBIH DARI 1 MB');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
            }
        } else {
            echo "<script>alert('UPLOAD ARSIP KGB GAGAL KARENA EKSTENSI FILE SK KGB YANG DI UPLOAD HARUS BERFORMAT PDF');window.location.href = '?module=kgb/upload&nip=$nip'</script>";
        }
    }
}


// $sql = "select * from arsip_kgb INNER JOIN pegawai ON arsip_kgb.nip=pegawai.nip where arsip_kgb.nip='" . $nip . "'";
// $result = mysqli_query($con, $sql);

// while ($row = mysqli_fetch_assoc($result)) {
//     $nama = $row['nama'];
// }
// 
?>
<!-- 
// <div class="modal-dialog">
    // <div class="modal-content">
        // <div class="modal-header">
            // <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            // <h4 class="modal-title">Detail Provinsi</h4>
            // </div>
        // <div class="modal-body">
            // <div class="row">
                // <div class="col-xs-12">
                    // <div class="form-group">
                        // <label class="control-label">Nama Provinsi</label>
                        // <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control" value="<?= $nama ?>">
                        // </div>
                    // </div>
                // </div>
            // </div>
        // <div class="modal-footer">
            // <button data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Ok</button>
            // </div>
        // </div>
    // </div> -->