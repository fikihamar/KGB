<?php
include '../config/connection.php';
$id = $_GET['id'];
if ($_GET['act'] == 'edit-instansi') {

    $pemerintah = $_POST['pemerintah'];
    $nama = $_POST['instansi'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no_instansi'];
    $nama_status = $_POST['nama_status'];
    $status = $_POST['status'];
    $provinsi = $_POST['provinsi'];
    $kd_pos = $_POST['kd_pos'];
    $kecamatan = $_POST['kecamatan'];
    $telepon = $_POST['telepon'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];
    $web = $_POST['website'];
    $sektor = $_POST['sektor'];
    $nip = $_POST['pimpinan'];
    $update = mysqli_query($con, "UPDATE instansi SET pemerintah='$pemerintah',kd_pos='$kd_pos',kecamatan='$kecamatan',nama_instansi='$nama',alamat='$alamat',
    no_instansi='$no',status='$status',nama_status='$nama_status',provinsi='$provinsi',telepon='$telepon',fax='$fax',email='$email',website='$web',sektor='$sektor',
    nip_kepala_instansi='$nip' WHERE id_instansi='$id'");
    if ($update) {
        echo "<script>alert('Update Succes'); window.location.href='?module=instansi/index'</script>";
    } else {
        echo "<script>alert('Update gagal '); window.location.href='?module=instansi/index'</script>";
    }
}
