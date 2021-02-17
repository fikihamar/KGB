<?php
include '../config/connection.php';
if ($_GET['act'] == 'delete-arsip-detail') {
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
}
elseif ($_GET['act'] == 'delete-all') {
    $nip = $_GET['nip'];
    $query=mysqli_query($con,"SELECT file_kgb FROM arsip_kgb WHERE nip='$nip'");
        while ($a = ($query)) {
            $unlink=unlink('../assets/file-arsip/'.$a["file_kgb"]);
        }
    if ($unlink) {
        $delete1 = mysqli_query($con, "DELETE FROM arsip_kgb WHERE nip='$nip'");
        if ($delete1) {
            echo "<script>alert('Delete file Succes');window.location.href = 'index.php?module=arsip-kgb/index'</script>";
        }else{
            echo "<script>alert('Delete file Gagal');window.location.href = 'index.php?module=arsip-kgb/index'</script>";
        }
    } else {
        echo "<script>alert('Delete query file Gagal');window.location.href = 'index.php?module=arsip-kgb/index'</script>";
    }
}
