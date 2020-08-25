<?php
include "../config/connection.php";
$nip = $_GET['nip'];
if ($_GET['act'] == 'penundaan_kp') {
    $periode = $_POST['periode'];
    $penundaan = $_POST['penundaan_kp'];
    if ($percepatan < 0) {
        echo "<script>alert('Add percepatan KGB, gagal tidak boleh dengan minus'); window.location.href='?module=kgb/percepatan'</script>";
    } else {
        if ($penundaan >= $periode) {
            $query_penundaan = mysqli_query($con, "UPDATE pangkat_terakhir SET percepatan_kenaikan='',penundaan_kenaikan='' WHERE nip='$nip'");
            echo "<script>alert('Add penundaan gagal, promosi pangkat tidak boleh lebih dari sama dengan " . $periode . "'); window.location.href='?module=naik-pangkat/penundaan'</script>";
        } else {
            $query_penundaan = mysqli_query($con, "UPDATE pangkat_terakhir SET percepatan_kenaikan='',penundaan_kenaikan='$penundaan' WHERE nip='$nip'");
            if ($query_penundaan) {
                echo "<script>alert('Add Succes'); window.location.href='?module=naik-pangkat/penundaan'</script>";
            }
        }
    }
} else if ($_GET['act'] == 'delete_penundaan') {
    $data = mysqli_query($con, "SELECT * FROM pangkat_terakhir WHERE nip='$nip'");
    $a = mysqli_fetch_array($data);
    if ($a['penundaan_kenaikan'] > 0) {
        $delete_penundaan = mysqli_query($con, "UPDATE pangkat_terakhir SET penundaan_kenaikan='0'  WHERE nip='$nip'");
        if ($delete_penundaan) {
            echo "<script>alert('Delete Succes'); window.location.href='?module=naik-pangkat/penundaan'</script>";
        }
    } else {
        echo "<script>alert('Tidak Ada Yang Harus Di Hapus'); window.location.href='?module=naik-pangkat/penundaan'</script>";
    }
}
