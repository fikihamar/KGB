<?php
include '../config/connection.php';
if ($_GET['act'] == 'edit-user') {
    $id = $_GET['id'];
    $id_session = $_SESSION['username'];
    $nama = $_POST['nama'];
    $y = $_POST['y'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = "admin";
    $data = mysqli_query($con, "SELECT * FROM user WHERE id_user!='$id'");
    while ($g = mysqli_fetch_array($data)) {
        $user = $g['username'];
        if ($username === $user) {
            $message = "<script>alert('Tambah Admin Gagal Username Tidak Tersedia');window.location.href = '?module=user/index'</script>";
        }
    }
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
                            $kgb = mysqli_query($con, "UPDATE user SET username='$username',password='$pass',email='$email',nama='$nama',level='$level',images='$file_upload' WHERE id_user='$id'");
                            if ($kgb) {
                                echo "<script>alert('Update Success Silahkan Login Kembali ');window.location.href = '../logout.php'</script>";
                            } else {
                                echo "<script>alert('Gagal');window.location.href = '?module=user/index'</script>";
                            }
                        } else {
                            $kgb = mysqli_query($con, "UPDATE user SET username='$username',email='$email',nama='$nama',level='$level',images='$file_upload' WHERE id_user='$id'");
                            if ($kgb) {
                                echo "<script>alert('Update Success Silahkan Login Kembali ');window.location.href = '../logout.php'</script>";
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
            $kgb = mysqli_query($con, "UPDATE user SET username='$username',email='$email',nama='$nama',level='$level' WHERE id_user='$id'");
            if ($kgb) {
                echo "<script>alert('Update Success Silahkan Login Kembali');window.location.href = '../logout.php'</script>";
            } else {
                echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
            }
            if ($_POST['password'] != "") {
                $pass = md5($_POST['password']);
                $kgb = mysqli_query($con, "UPDATE user SET username='$username',password='$pass',email='$email',nama='$nama',level='$level',images='$gambar' WHERE id_user='$id'");
                if ($kgb) {
                    echo "<script>alert('Update Success Silahkan Login Kembali');window.location.href = '../logout.php'</script>";
                } else {
                    echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
                }
            }
        } else {
            echo $message;
        }
    }
} elseif ($_GET['act'] == 'edit-user-1') {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $y = $_POST['y'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = "admin";
    $data = mysqli_query($con, "SELECT * FROM user WHERE id_user!='$id'");
    while ($g = mysqli_fetch_array($data)) {
        $user = $g['username'];
        if ($username === $user) {
            $message = "<script>alert('Tambah Admin Gagal Username Tidak Tersedia');window.location.href = '?module=user/index'</script>";
        }
    }
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
                            $kgb = mysqli_query($con, "UPDATE user SET username='$username',password='$pass',email='$email',nama='$nama',level='$level',images='$file_upload' WHERE id_user='$id'");
                            if ($kgb) {
                                echo "<script>alert('Update Success');window.location.href = '?module=user/index'</script>";
                            } else {
                                echo "<script>alert('Gagal');window.location.href = '?module=user/index'</script>";
                            }
                        } else {
                            $kgb = mysqli_query($con, "UPDATE user SET username='$username',email='$email',nama='$nama',level='$level',images='$file_upload' WHERE id_user='$id'");
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
                echo "<script>alert('Format Foto harus jpg, png atau jpeg');window.location.href = '?module=user/index'</script>";
            }
        } else { // else validasi ukuran file
            echo "<script>alert('Ukuran foto kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=user/index'</script>";
        }
    } else {
        if (empty($message)) {
            $kgb = mysqli_query($con, "UPDATE user SET username='$username',email='$email',nama='$nama',level='$level' WHERE id_user='$id'");
            if ($kgb) {
                echo "<script>alert('Update Success ');window.location.href = '?module=user/index'</script>";
            } else {
                echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
            }
            if ($_POST['password']) {
                $pass = md5($_POST['password']);
                $kgb = mysqli_query($con, "UPDATE user SET username='$username',password='$pass',email='$email',nama='$nama',level='$level',images='$gambar' WHERE id_user='$id'");
                if ($kgb) {
                    echo "<script>alert('Update Success ');window.location.href = '?module=user/index'</script>";
                } else {
                    echo "<script>alert('Update gagal');window.location.href = '?module=user/index'</script>";
                }
            }
        } else {
            echo $message;
        }
    }
} elseif ($_GET['act'] == 'add-user') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = "admin";
    $password = md5($_POST['password']);
    $ukuran_file = $_FILES['file_upload']['size'];
    $data = mysqli_query($con, "SELECT * FROM user  id_user!='$id'");
    while ($g = mysqli_fetch_array($data)) {
        $user = $g['username'];
        if ($username === $user) {
            $message = "<script>alert('Tambah Admin Gagal Username Tidak Tersedia');window.location.href = '?module=user/index'</script>";
        }
    }
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
                if ($upload == true) {
                    $kgb = mysqli_query($con, "INSERT INTO user  VALUES('','$nama','$username','$email','$password',level='$level',images='$file_upload')");
                    if ($kgb) {
                        echo "<script>alert('Tambah Admin Success');window.location.href = '?module=user/index'</script>";
                    } else {
                        echo "<script>alert('Tambah Admin gagal');window.location.href = '?module=user/index'</script>";
                    }
                } else { // else upload gagal
                    echo "<script>alert('Upload Foto Profil Gagal file tidak boleh lebih dari 1000000 (1MB) dan harus berformat jpg, png atau jpeg');window.location.href = '?module=user/index'</script>";
                }
            } else {
                echo $message;
            }
        } else { // else validasi format
            echo "<script>alert('Format Foto Profil harus jpg, png atau jpeg');window.location.href = '?module=user/index'</script>";
        }
    } else { // else validasi ukuran file
        echo "<script>alert('Ukuran Foto Profil kamu " . $ukuran_file . ", file tidak boleh lebih dari 1000000 (1MB)');window.location.href = '?module=user/index'</script>";
    }
} elseif ($_GET['act'] == 'delete-user') {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM user WHERE id_user='$id'");
    if ($query) {
        echo "<script>alert('Delete Success');window.location.href = '?module=user/index'</script>";
    } else {
        echo "<script>alert('Delete gagal');window.location.href = '?module=user/index'</script>";
    }
}
