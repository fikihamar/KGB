<?php
include '../config/connection.php';
$nip = $_GET['nip'];
$tahun = $_GET['tahun'];
$data = mysqli_query($con, "SELECT * FROM arsip_kgb WHERE nip='$nip' AND kgb_tahun='$tahun'");
$d = mysqli_fetch_array($data);
$file = $d['file_kgb'];
$delete_file = unlink('../assets/file-arsip/' . $file);
$delete = mysqli_query($con, "DELETE FROM arsip_kgb WHERE nip='$nip' AND kgb_tahun='$tahun'");
if ($delete && $delete_file) {
    echo "<script>alert('Berhasil Menghapus');window.location.href = 'index.php?module=arsip-kgb/detail-arsip&nip=$nip'</script>";
}
