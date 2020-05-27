<?php
include '../config/connection.php';

if ($_GET['act'] == 'tambah') {
    $mkg = $_POST['mkg'];
    $gol = $_POST['golongan'];
    $id = substr($gol, 0, -2);
    $gapok = $_POST['gapok'];
    $data = mysqli_query($con, "SELECT * FROM gaji_pokok WHERE mkg='$mkg' AND id_golongan='$gol'");
    $cek = mysqli_num_rows($data);
    $a = mysqli_fetch_array($data);
    if ($cek == 0) {
        $update = mysqli_query($con, "INSERT INTO gaji_pokok VALUES ('','$mkg','$gol','$gapok','1')");
        if ($update) {
            echo "<script>alert('Tambah Gaji Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=$id'</script>";
        } else {
            echo "<script>alert('Tambah Gaji Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=$id'</script>";
        }
    } else {
        echo "<script>alert('Tambah Gaji Gagal Karena pada golongan $gol dengan MKG $mkg tahun sudah terdapat format gaji pokok sebesar Rp." . number_format($a['gaji'], 0, ", ", ".") .  ", Bila anda ingin mengubahnya silahkan klik tombol edit pada tabel gaji pokok');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=$id'</script>";
    }
} elseif ($_GET['act'] == 'edit-I') {
    $MKG = $_GET['mkg'];
    if ($MKG == 1) {
        $mkg = $MKG + 1;
    } else {
        $mkg = $MKG;
    }
    if ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update1 && $update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='I.a'");
        if ($update1) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['a'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['c'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['d'] == "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['d'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] == "") {
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['c'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['d'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['c'] == "" && $_POST['a'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['c'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['c'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['b'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        if ($update1 && $update2) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        if ($update1 && $update2 && $update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['d'] != "" && $_POST['c'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update1 && $update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['b'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.a'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update1 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['a'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='I.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='I.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='I.d'");
        if ($update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=I'</script>";
        }
    }
} elseif ($_GET['act'] == 'edit-II') {
    $mkg = $_GET['mkg'];
    if ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update1 && $update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        if ($update1) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['a'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        if ($update2) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['c'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['d'] == "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['d'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] == "") {
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['c'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['d'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['c'] == "" && $_POST['a'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['c'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['c'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['b'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        if ($update1 && $update2) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] == "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update1 && $update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['d'] == "" && $_POST['c'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='II.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        if ($update1 && $update2 && $update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['b'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='II.a'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='II.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='II.d'");
        if ($update1 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=II'</script>";
        }
    }
} elseif ($_GET['act'] == 'edit-III') {
    $MKG = $_GET['mkg'];
    if ($MKG >= 1) {
        $mkg = $MKG + 1;
    } else {
        $mkg = $MKG;
    }
    if ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 && $update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        if ($update1) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['a'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['c'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['d'] == "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['d'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] == "") {
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['c'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['d'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['c'] == "" && $_POST['a'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['c'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['c'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['b'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        if ($update1 && $update2) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update1 && $update2 && $update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['d'] != "" && $_POST['c'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 && $update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['b'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['a'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    }
} elseif ($_GET['act'] == 'edit-IV') {
    $MKG = $_GET['mkg'];
    if ($MKG >= 1) {
        $mkg = $MKG + 1;
    } else {
        $mkg = $MKG;
    }
    if ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['e'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='IV.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='IV.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='IV.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='IV.d'");
        $e = $_POST['e'];
        $update5 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='IV.e'");
        if ($update1 && $update2 && $update3 && $update4 && $update5) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] == "" && $_POST['c'] == "" && $_POST['d'] == "" && $_POST['e'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='IV.a'");
        if ($update1) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['a'] == "" && $_POST['c'] == "" && $_POST['d'] == "" && $_POST['e'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='IV.b'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        }
    } elseif ($_POST['c'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['d'] == ""  && $_POST['e'] == "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='IV.c'");
        if ($update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        }
    } elseif ($_POST['e'] != "" && $_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] == "" && $_POST['d'] == "") {
        $e = $_POST['e'];
        $update5 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='IV.e'");
        if ($update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=IV'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['b'] == "" && $_POST['c'] != "" && $_POST['d'] != "") {
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['c'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] == "" && $_POST['d'] == "" && $_POST['b'] != "" && $_POST['d'] != "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['c'] == "" && $_POST['a'] != "" && $_POST['d'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['c'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $c = $_POST['c'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update1 &&  $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['c'] == "" && $_POST['d'] == "" && $_POST['a'] != "" && $_POST['b'] != "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$a' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        if ($update1 && $update2) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        if ($update1 && $update2 && $update3) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['b'] != "" && $_POST['d'] != "" && $_POST['c'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 && $update2 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['a'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['b'] == "") {
        $a = $_POST['a'];
        $update1 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.a'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update1 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    } elseif ($_POST['b'] != "" && $_POST['c'] != "" && $_POST['d'] != "" && $_POST['a'] == "") {
        $b = $_POST['b'];
        $update2 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$b' WHERE mkg='$mkg' AND id_golongan='III.b'");
        $c = $_POST['c'];
        $update3 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$c' WHERE mkg='$mkg' AND id_golongan='III.c'");
        $d = $_POST['d'];
        $update4 = mysqli_query($con, "UPDATE gaji_pokok SET gaji='$d' WHERE mkg='$mkg' AND id_golongan='III.d'");
        if ($update2 && $update3 && $update4) {
            echo "<script>alert('Update Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        } else {
            echo "<script>alert('Update Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=III'</script>";
        }
    }
} elseif ($_GET['act'] == 'hapus') {
    $mkg = $_GET['mkg'];
    $gol = $_POST['golongan'];
    $gol1 = $_POST['gol'];
    $delete = mysqli_query($con, "DELETE FROM gaji_pokok WHERE mkg='$mkg' AND id_golongan IN($gol)");
    if ($delete) {
        echo "<script>alert('Delete Succes');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=$gol1'</script>";
    } else {
        echo "<script>alert('Delete Gagal');window.location.href = '?module=gaji-pokok/index&act=tampil&golongan=$gol1'</script>";
    }
}
