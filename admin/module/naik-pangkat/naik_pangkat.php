<?php
include '../config/connection.php.';
$nip = $_GET['nip'];
$data = mysqli_query($con, "SELECT * FROM pegawai WHERE nip='$nip'");
$d = mysqli_fetch_array($data);
$id = $d['id_golongan'];
$pendidikan = $d['pendidikan'];
$pengurangan = 0;
switch ($pendidikan) {
    case 'SMA/SMK':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            default:
                $gol = "II.b";
                break;
        }
        break;
    case 'D1':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            default:
                $gol = "II.b";
                break;
        }
        break;
    case 'D2':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            default:
                $gol = "II.b";
                break;
        }
        break;
    case 'D3':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            case "II.a":
                $gol = "II.b";
                break;
            default:
                $gol = "II.c";
                break;
        }
        break;
    case 'S1':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            case "II.a":
                $gol = "II.b";
                break;
            case "II.b":
                $gol = "II.c";
                break;
            case "II.c":
                $gol = "II.d";
                break;
            case "II.d":
                $gol = "III.a";
                $pengurangan = 6;
                break;
            case "III.a":
                $gol = "III.b";
                break;
            case "III.b":
                $gol = "III.c";
                break;
            default:
                $gol = "III.d";
                break;
        }
        break;
    case 'S2':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            case "II.a":
                $gol = "II.b";
                break;
            case "II.b":
                $gol = "II.c";
                break;
            case "II.c":
                $gol = "II.d";
                $pengurangan = 5;
                break;
            case "II.d":
                $gol = "III.a";
                break;
            case "III.a":
                $gol = "III.b";
                break;
            case "III.b":
                $gol = "III.c";
                break;
            case "III.c":
                $gol = "III.d";
                break;
            default:
                $gol = "IV.a";
                break;
        }
        break;
    case 'S3':
        switch ($id) {
            case "I.a":
                $gol = "I.b";
                break;
            case "I.b":
                $gol = "I.c";
                break;
            case "I.c":
                $gol = "I.d";
                break;
            case "I.d":
                $gol = "II.a";
                $pengurangan = 6;
                break;
            case "II.a":
                $gol = "II.b";
                break;
            case "II.b":
                $gol = "II.c";
                break;
            case "II.c":
                $gol = "II.d";
                $pengurangan = 5;
                break;
            case "II.d":
                $gol = "III.a";
                break;
            case "III.a":
                $gol = "III.b";
                break;
            case "III.b":
                $gol = "III.c";
                break;
            case "III.c":
                $gol = "III.d";
                break;
            case "III.d":
                $gol = "IV.a";
                break;
            default:
                $gol = "IV.b";
                break;
        }
        break;
}
$update = mysqli_query($con, "UPDATE pegawai SET id_golongan='$gol' WHERE nip='$nip'");
$data1 = mysqli_query($con, "SELECT * FROM pangkat_terakhir WHERE nip='$nip'");
$b = mysqli_fetch_array($data1);
$tanggal = $b['tgl_pangkat_terakhir'];
$periode = $b['periode_kenaikan'];
$penundaan = $b['penundaan_kenaikan'];
$percepatan = $b['percepatan_kenaikan'];
$mkg = $periode + $b['mkg_tahun'] - $pengurangan;
$tgl2 = date('Y-m-d', strtotime('+' . $periode + $penundaan - $percepatan . 'years ', strtotime($tanggal)));
$update1 = mysqli_query($con, "UPDATE pangkat_terakhir SET tgl_pangkat_terakhir='$tgl2',mkg_tahun='$mkg',percepatan_kenaikan='',penundaan_kenaikan='' WHERE nip='$nip'");
if ($update && $update1) {
    echo "<script>alert('Update Succes'); window.location.href='?module=naik-pangkat/index'</script>";
}
