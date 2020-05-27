<?php
if (isset($_GET['nip'])) {
    include '../config/connection.php';
    $nip = $_GET['nip'];
    $tahun = $_GET['tahun'];
    $data = mysqli_query($con, "SELECT file_kgb FROM arsip_kgb WHERE nip='$nip' AND kgb_tahun='$tahun'");
    $a = mysqli_fetch_array($data);
    $filename    = $a['file_kgb'];

    $back_dir    = "../assets/file-arsip/";
    $file = $back_dir . $filename;

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    }
}
