<?php
include '../config/connection.php';
if ($_GET['gol']) {
    $golongan = $_GET['gol'];
    $result = [];

    $query = mysqli_query($con, "SELECT DISTINCT mkg FROM gaji_pokok WHERE id_golongan LIKE '$golongan.%' ORDER BY mkg ASC");
    $index = 0;
    while ($d = mysqli_fetch_array($query)) {
        array_push(
            $result,
            [
                'id_gaji' => $d['id_gaji'],
                'id_golongan' => $golongan
            ]
        );
        // $index++;
    }
    echo json_encode($result);
} elseif ($_GET['mkg']) {
    $mkg = $_GET['mkg'];
    $result = [];

    $query = mysqli_query($con, "SELECT DISTINCT id_gaji,id_golongan,gaji,id_peraturan FROM gaji_pokok WHERE mkg LIKE '$mkg.%'");
    $index = 0;
    while ($d = mysqli_fetch_array($query)) {
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
        // $index++;
    }
    echo json_encode($result);
}
