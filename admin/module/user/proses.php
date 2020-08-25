<?php
include '../config/connection.php';
$username = $_SESSION['username'];
if ($_GET['act'] == 'edit-user') {
    $nama = $_POST['nama'];
    $y = $_POST['y'];
    $email = $_POST['email'];
    if ($_FILES['file_upload']['name']) {
        // Validasi ukuran file
        $ukuran_file = $_FILES['file_upload']['size'];
        if ($ukuran_file <= 1000000) {
            $nama_file = $_FILES['file_upload']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file

            // Validasi format
            if (($format == "jpg") or ($format == "png") or ($format == "jpeg")) {
                $x = explode('.', $nama_file);
                $awal = substr($nama_file, 0, -4);
                $ekstensi = strtolower(end($x));
                $file_upload = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
                $file_asal = $_FILES['file_upload']['tmp_name'];
                $file_tujuan = "../assets/file-gambar/" . $file_upload;
                if (empty($message)) {
                    $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil
                    // Validasi upload (hasil true jika upload berhasil)
                    // Cek apakah file foto sebelumnya ada di folder im ages   
                    if (is_file('../assets/file-gambar/' . $y)) {
                        $a = '../assets/file-gambar/' . $y;
                        $hapus_foto = unlink($a);
                    }
                    if ($upload == true) {
                        if ($_POST['password'] != "") {
                            $pass = md5($_POST['password']);
                            $kgb = mysqli_query($con, "UPDATE user SET password='$pass',email='$email',nama='$nama',images='$file_upload' WHERE username='$username'");
                            if ($kgb) {
                                echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
                            } else {
                                echo "<script>alert('Gagal');window.location.href = '?module=user/index'</script>";
                            }
                        } else {
                            $kgb = mysqli_query($con, "UPDATE user SET email='$email',nama='$nama',images='$file_upload' WHERE username='$username'");
                            if ($kgb) {
                                echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
                            } else {
                                echo "<script>alert('Upload gagal');window.location.href = '?module=user/index'</script>";
                            }
                        }
                    } else { // else upload gagal
                        echo "<script>alert('Upload Foto Gagal, ukuran foto tidak boleh lebih dari 1000000 (1MB) dan harus berformat jpg, png atau jpeg');window.location.href = '?module=user/index'</script>";
                    }
                } else {
                    echo $message;
                }
            } else { // else validasi format
                echo "<script>alert('Format foto harus jpg, png atau jpeg');window.location.href = '?module=user/index'</script>";
            }
        } else { // else validasi ukuran file
            echo "<script>alert('Ukuran foto kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=user/index'</script>";
        }
    } else {
        if (empty($message)) {
            $kgb = mysqli_query($con, "UPDATE user SET email='$email',nama='$nama' WHERE username='$username'");
            if ($kgb) {
                echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
            } else {
                echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
            }
            if ($_POST['password'] != "") {
                $pass = md5($_POST['password']);
                $kgb = mysqli_query($con, "UPDATE user SET password='$pass',email='$email',nama='$nama',images='$gambar' WHERE username='$username' ");
                if ($kgb) {
                    echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
                } else {
                    echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
                }
            }
        } else {
            echo $message;
        }
    }
}
if ($_GET['act'] == 'delete-pict') {
    $y = $_POST['a'];
    $a = '../assets/file-gambar/' . $y;
    $hapus_foto = unlink($a);
    $delete = mysqli_query($con, "UPDATE user SET images='' WHERE username='$username'");
    if ($delete) {
        echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
    } else {
        echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
    }
}
