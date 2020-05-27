<?php
include "../config/connection.php";
$nip = $_GET['nip'];
if ($_GET['act'] == 'percepatan_kgb') {
    $periode = $_POST['periode'];
    $percepatan = $_POST['percepatan_kgb'];
    if ($percepatan < 0) {
        echo "<script>alert('Add percepatan KGB, gagal tidak boleh dengan minus'); window.location.href='?module=kgb/percepatan'</script>";
    } else {
        if ($percepatan >= $periode) {
            $query_percepatan = mysqli_query($con, "UPDATE kgb_terakhir SET percepatan_kgb='',penundaan_kgb='' WHERE nip='$nip'");
            echo "<script>alert('Add percepatan KGB, gagal tidak boleh lebih dari atau sama dengan " . $periode . " tahun'); window.location.href='?module=kgb/percepatan'</script>";
        } else {
            $query_percepatan = mysqli_query($con, "UPDATE kgb_terakhir SET percepatan_kgb='$percepatan',penundaan_kgb='' WHERE nip='$nip'");
            if ($query_percepatan) {
                echo "<script>alert('Add Succes'); window.location.href='?module=kgb/percepatan'</script>";
            }
        }
    }
} else if ($_GET['act'] == 'penundaan_kgb') {
    $periode = $_POST['periode'];
    $penundaan = $_POST['penundaan_kgb'];
    if ($penundaan < 0) {
        echo "<script>alert('Add penundaan KGB, gagal tidak boleh dengan minus'); window.location.href='?module=kgb/percepatan'</script>";
    } else {
        if ($penundaan >= $periode) {
            $query_penundaan = mysqli_query($con, "UPDATE kgb_terakhir SET percepatan_kgb='',penundaan_kgb='' WHERE nip='$nip'");
            echo "<script>alert('Add penundaan KGB gagal, KGB tidak boleh lebih dari sama dengan " . $periode . "'); window.location.href='?module=kgb/penundaan'</script>";
        } else {
            $query_penundaan = mysqli_query($con, "UPDATE kgb_terakhir SET percepatan_kgb='',penundaan_kgb='$penundaan' WHERE nip='$nip'");
            if ($query_penundaan) {
                echo "<script>alert('Add Succes'); window.location.href='?module=kgb/penundaan'</script>";
            }
        }
    }
} else if ($_GET['act'] == 'delete_penundaan') {
    $data = mysqli_query($con, "SELECT * FROM kgb_terakhir WHERE nip='$nip'");
    $a = mysqli_fetch_array($data);
    if ($a['penundaan_kgb'] > 0) {
        $delete_penundaan = mysqli_query($con, "UPDATE kgb_terakhir SET penundaan_kgb='0'  WHERE nip='$nip'");
        if ($delete_penundaan) {
            echo "<script>alert('Delete Succes'); window.location.href='?module=kgb/penundaan'</script>";
        }
    } else {
        echo "<script>alert('Tidak Ada Yang Harus Di Hapus'); window.location.href='?module=kgb/penundaan'</script>";
    }
} else if ($_GET['act'] == 'delete_percepatan') {
    $data = mysqli_query($con, "SELECT * FROM kgb_terakhir WHERE nip='$nip'");
    $a = mysqli_fetch_array($data);
    if ($a['percepatan_kgb'] > 0) {
        $delete_penundaan = mysqli_query($con, "UPDATE kgb_terakhir SET percepatan_kgb='0'  WHERE nip='$nip'");
        if ($delete_penundaan) {
            echo "<script>alert('Delete Succes'); window.location.href='?module=kgb/percepatan'</script>";
        }
    } else {
        echo "<script>alert('Tidak Ada Yang Harus Di Hapus'); window.location.href='?module=kgb/percepatan'</script>";
    }
} elseif ($_GET['act'] == 'addno-surat') {
    $no = $_POST['no_kgb'];
    $nip = $_POST['nip'];
    if (($_POST['gapok_terakhir'] != "") && ($_POST['pp'] != "")) {
        $gapok = $_POST['gapok_terakhir'];
        $pp = $_POST['pp'];
        $update_no = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='$no',gapok_terakhir='$gapok',pp='$pp' WHERE nip='$nip'");
        if ($update_no) {
            echo "<script>alert('Add Succes cok'); window.location.href='?module=kgb/index'</script>";
        }
    } else {
        $update_no = mysqli_query($con, "UPDATE kgb_terakhir SET no_kgb='$no' WHERE nip='$nip'");
        if ($update_no) {
            echo "<script>alert('Add Succes cuy'); window.location.href='?module=kgb/index'</script>";
        }
    }
}
