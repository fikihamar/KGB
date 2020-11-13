<?php
include "../config/connection.php";

if ($_GET['act'] == 'update_pegawai') {
    $nip = $_POST['nip_lama'];
    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip 
INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
    $nip1 = $_POST['nip'];
    $nama = $_POST['nama'];
    $pendidikan = $_POST['pendidikan'];
    $ket_pendidikan = $_POST['ket_pendidikan'];
    $pegawai1 = mysqli_query($con, "UPDATE pegawai SET nip='$nip1',nama='$nama',pendidikan='$pendidikan',keterangan_pendidikan='$ket_pendidikan' WHERE nip='$nip'");
    $pegawai2 = mysqli_query($con, "UPDATE pangkat_terakhir SET nip='$nip1' WHERE nip='$nip'");
    $pegawai3 = mysqli_query($con, "UPDATE kgb_terakhir SET nip='$nip1' WHERE nip='$nip'");
    if ($pegawai1 && $pegawai2 && $pegawai3) {
        echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
    } else {
        echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
    }
} elseif ($_GET['act'] == 'edit_pangkat') {
    $nip = $_GET['nip'];
    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip 
INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
    $nip1 = $_POST['nip'];
    $tgl_pangkat = $_POST['tgl_promosi'];
    $id_gol = $_POST['id_golongan'];
    $mkg_tahun = $_POST['mkg_tahun'];
    $mkg_bulan = $_POST['mkg_bulan'];
    $pangkat = mysqli_query($con, "UPDATE pangkat_terakhir SET tgl_pangkat_terakhir='$tgl_pangkat',mkg_tahun='$mkg_tahun',mkg_bulan='$mkg_bulan' WHERE nip='$nip'");
    $pegawai = mysqli_query($con, "UPDATE pegawai SET id_golongan='$id_gol' WHERE nip='$nip'");
    if ($pangkat || $pegawai) {
        echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
    } else {
        echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
    }
    if ($_POST['periode_promosi']) {
        $pangkat = mysqli_query($con, "UPDATE pangkat_terakhir SET tgl_pangkat_terakhir='$tgl_pangkat',periode_kenaikan='" . $_POST['periode_promosi'] . "',mkg_tahun='$mkg_tahun',mkg_bulan='$mkg_bulan' WHERE nip='$nip'");
        if ($pangkat) {
            echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
        } else {
            echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip1'</script>";
        }
    }
} elseif ($_GET['act'] == 'editkgb') {
    $nip = $_GET['nip'];
    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip 
INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
    $d = mysqli_fetch_array($data);
    $tgl_kgb = $_POST['tgl_kgb'];
    $tgl_surat = $_POST['tgl_surat_kgb'];
    $no_surat = $_POST['no_surat_kgb'];
    $gapok_terakhir = $_POST['gapok_terakhir'];
    $id_gol_terakhir = $_POST['id_golongan_terakhir'];
    $mkg_tahun_kgb = $_POST['mkg_tahun_kgb'];
    $mkg_bulan_kgb = $_POST['mkg_bulan_kgb'];
    $pp = $_POST['pp_lama'];
    $y = $_POST['file'];
    $kgb = mysqli_query($con, "UPDATE kgb_terakhir SET pp='$pp',no_kgb='$no_surat',tgl_surat_terakhir='$tgl_surat',tgl_kgb_terakhir='$tgl_kgb',
            id_golongan_terakhir='$id_gol_terakhir',gapok_terakhir='$gapok_terakhir',mkg_tahun_kgb='$mkg_tahun_kgb',mkg_bulan_kgb='$mkg_bulan_kgb' WHERE nip='$nip'");
    if ($kgb) {
        echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
    } else {
        echo "<script>alert('Update Gagal');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
    }
    if ($_FILES['sk_kgb']['name']) {
        $ukuran_file = $_FILES['sk_kgb']['size'];
        if ($ukuran_file <= 1000000) {
            $nama_file = $_FILES['sk_kgb']['name'];
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
            // Validasi format
            if ($format == "pdf") {
                $x = explode('.', $nama_file);
                $awal = substr($nama_file, 0, -4);
                $ekstensi = strtolower(end($x));
                $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
                $file_asal = $_FILES['sk_kgb']['tmp_name'];
                $file_tujuan = "../assets/file-arsip/" . $file_upload;
                $upload = move_uploaded_file($file_asal, $file_tujuan);
                if (is_file('../assets/file-arsip/' . $y)) {
                    $a = '../assets/file-arsip/' . $y;
                    $hapus_file = unlink($a);
                }
                if ($upload == true) {
                    $kgb = mysqli_query($con, "UPDATE kgb_terakhir SET pp='$pp',no_kgb='$no_surat',tgl_surat_terakhir='$tgl_surat',tgl_kgb_terakhir='$tgl_kgb',
                        id_golongan_terakhir='$id_gol_terakhir',gapok_terakhir='$gapok_terakhir',mkg_tahun_kgb='$mkg_tahun_kgb',mkg_bulan_kgb='$mkg_bulan_kgb',
                        sk_kgb_terakhir='$file_upload' WHERE nip='$nip'");
                    if ($kgb) {
                        echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                    } else {
                        echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                    }
                } else {
                    echo "<script>alert('Upload File Gagal file tidak boleh lebih dari 1000000 (1MB) dan harus berformat pdf');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                }
            } else { // else validasi format
                echo "<script>alert('Format file harus pdf');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
            }
        } else { // else validasi ukuran file
            echo "<script>alert('Ukuran file kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
        }
    }
    if (($_POST['periode_kgb']) and ($_FILES['sk_kgb']['name'])) {
        $ukuran_file = $_FILES['sk_kgb']['size'];
        if ($ukuran_file <= 1000000) {
            $nama_file = $_FILES['sk_kgb']['name'];
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
            // Validasi format
            if ($format == "pdf") {
                $x = explode('.', $nama_file);
                $awal = substr($nama_file, 0, -4);
                $ekstensi = strtolower(end($x));
                $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
                $file_asal = $_FILES['sk_kgb']['tmp_name'];
                $file_tujuan = "../assets/file-arsip/" . $file_upload;
                $upload = move_uploaded_file($file_asal, $file_tujuan);
                if (is_file('../assets/file-arsip/' . $y)) {
                    $a = '../assets/file-arsip/' . $y;
                    $hapus_file = unlink($a);
                }
                if ($upload == true) {
                    $kgb = mysqli_query($con, "UPDATE kgb_terakhir SET pp='$pp',periode_kgb='$periode',no_kgb='$no_surat',tgl_surat_terakhir='$tgl_surat',tgl_kgb_terakhir='$tgl_kgb',
                    id_golongan_terakhir='$id_gol_terakhir',gapok_terakhir='$gapok_terakhir',mkg_tahun_kgb='$mkg_tahun_kgb',mkg_bulan_kgb='$mkg_bulan_kgb',
                    sk_kgb_terakhir='$file_upload' WHERE nip='$nip'");
                    if ($kgb) {
                        echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                    } else {
                        echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                    }
                } else {
                    echo "<script>alert('Upload File Gagal file tidak boleh lebih dari 1000000 (1MB) dan harus berformat pdf');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
                }
            } else { // else validasi format
                echo "<script>alert('Format file harus pdf');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
            }
        } else { // else validasi ukuran file
            echo "<script>alert('Ukuran file kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
        }
    }

    if ($_POST['periode_kgb']) {
        $periode = $_POST['periode_kgb'];
        $kgb = mysqli_query($con, "UPDATE kgb_terakhir SET pp='$pp',periode_kgb='$periode',no_kgb='$no_surat',tgl_surat_terakhir='$tgl_surat',tgl_kgb_terakhir='$tgl_kgb',
            id_golongan_terakhir='$id_gol_terakhir',gapok_terakhir='$gapok_terakhir',mkg_tahun_kgb='$mkg_tahun_kgb',mkg_bulan_kgb='$mkg_bulan_kgb' WHERE nip='$nip'");
        if ($kgb) {
            echo "<script>alert('Update Succes');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
        } else {
            echo "<script>alert('Update gagal');window.location.href = '?module=pegawai/profile&nip=$nip'</script>";
        }
    }
} elseif ($_GET['act'] == 'delete-all') {
    $nip = $_GET['nip'];
    $data = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip INNER JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip 
INNER JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
    $delete1 = mysqli_query($con, "DELETE FROM pegawai WHERE nip='$nip'");
    $delete2 = mysqli_query($con, "DELETE FROM pangkat_terakhir WHERE nip='$nip'");
    $delete3 = mysqli_query($con, "DELETE FROM kgb_terakhir WHERE nip='$nip'");
    if ($delete1 && $delete2 && $delete3) {
        echo "<script>alert('Delete Success');window.location.href = '?module=pegawai/index'</script>";
    } else {
        echo "<script>alert('Delete Gagal');window.location.href = '?module=pegawai/index'</script>";
    }
} elseif ($_GET['act'] == 'tambah') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $pendidikan = $_POST['pendidikan'];
    $ket_pendidikan = $_POST['ket_pendidikan'];
    $instansi = mysqli_query($con, "SELECT id_instansi FROM instansi");
    $a = mysqli_fetch_array($instansi);
    $kd_instansi = $a['id_instansi'];

    //pangkat
    $mkg_pangkat_tahun = $_POST['mkg_pangkat_tahun'];
    $mkg_pangkat_bulan = $_POST['mkg_pangkat_bulan'];
    $golongan_pangkat = $_POST['golongan_pangkat'];
    $tmt_pangkat = $_POST['tmt_pangkat'];
    //kgb
    $no_surat = $_POST['no_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $mkg_kgb_tahun = $_POST['mkg_kgb_tahun'];
    $mkg_kgb_bulan = $_POST['mkg_kgb_bulan'];
    $golongan_kgb = $_POST['golongan_kgb'];
    $tmt_kgb = $_POST['tmt_kgb'];
    $gapok = $_POST['gapok'];
    $pp = $_POST['pp'];
    $nama_file = $_FILES['file_sk']['name'];
    //periode
    if ($_POST['periode_pangkat'] == 0) {
        $periode_pangkat = 4;
    } else {
        $periode_pangkat = $_POST['periode_pangkat'];
    }
    if ($_POST['periode_kgb'] == 0) {
        $periode_kgb = 2;
    } else {
        $periode_kgb = $_POST['periode_kgb'];
    }
    $ukuran_file = $_FILES['file_sk']['size'];
    if ($ukuran_file <= 1000000) {
        $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
        // Validasi format
        if ($format == "pdf") {
            $x = explode('.', $nama_file);
            $awal = substr($nama_file, 0, -4);
            $ekstensi = strtolower(end($x));
            $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
            $file_asal = $_FILES['file_sk']['tmp_name'];
            $file_tujuan = "../assets/file-arsip/" . $file_upload;
            $upload = move_uploaded_file($file_asal, $file_tujuan);
            if ($upload == true) {
                $query_pegawai = mysqli_query($con, "INSERT INTO pegawai VALUES ('$nip','$nama','$golongan_pangkat','$kd_instansi','$pendidikan','$ket_pendidikan')");
                if ($query_pegawai) {
                    $query_pangkat = mysqli_query($con, "INSERT INTO pangkat_terakhir VALUES ('','$nip','$tmt_pangkat','','$periode_pangkat','','$mkg_pangkat_tahun','$mkg_pangkat_bulan')");
                    if ($query_pangkat) {
                        $query_kgb = mysqli_query($con, "INSERT INTO kgb_terakhir
                         VALUES ('','$no_surat','$nip','$golongan_kgb','$tmt_kgb','$tgl_surat','','$periode_kgb','','$mkg_kgb_tahun',
                '$mkg_kgb_bulan','$gapok','$pp','$file_upload')");  
                        if ($query_kgb) {
                            echo "<script>alert('Sukses Menambahkan Pegawai');window.location.href = '?module=pegawai/index'</script>";
                        }else{
                            echo "<script>alert('Gagal Menambahkan Pegawai kgb');window.location.href = '?module=pegawai/index'</script>";
                        }
                    }else{
                        echo "<script>alert('Gagal Menambahkan Pegawai pangkat');window.location.href = '?module=pegawai/index'</script>";
                    }
                    
                }  else {
                    echo "<script>alert('Gagal Menambahkan Pegawai');window.location.href = '?module=pegawai/index'</script>";
                }
            } else {
                echo "<script>alert('Upload File Gagal file tidak boleh lebih dari 1000000 (1MB) dan harus berformat pdf');window.location.href = '?module=pegawai/tambah</script>";
            }
        } else {
            echo "<script>alert('Format file harus pdf');window.location.href = '?module=pegawai/tambah'</script>";
        }
    } else {
        echo "<script>alert('Ukuran file kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=pegawai/tambah'</script>";
    }
}
