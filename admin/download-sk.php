<?php
if (isset($_GET['nip'])) {
    include '../config/connection.php';
    $nip = $_GET['nip'];
    $data = mysqli_query($con, "SELECT sk_kgb_terakhir FROM kgb_terakhir WHERE nip='$nip'");
    $a = mysqli_fetch_array($data);
    $filename    = $a['sk_kgb_terakhir'];

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
