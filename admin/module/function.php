<?php
function mkg_now($tgl, $tahun_mkg, $bulan_mkg)
{
    $awal  = date_create($tgl);
    $akhir = new DateTime(); // Waktu sekarang
    $diff  = date_diff($awal, $akhir);

    $tahun_selisih = $diff->y;
    $bulan_selisih = $diff->m;

    $bulan = ($bulan_selisih + $bulan_mkg);
    if ($bulan > 13) {
        $hasil1 = ($tahun_selisih + $tahun_mkg) + 1;
        $hasil2 = $bulan - 12;
    } elseif ($bulan < 13) {
        $hasil1 = $tahun_mkg + $tahun_selisih;
        $hasil2 = $bulan;
    } else {
        $hasil1 = ($tahun_selisih + $tahun_mkg) + 1;
        $hasil2 = 0;
    }
    echo '' . $hasil1 . ' tahun ' . $hasil2 . ' bulan';
}
function tempo($tanggal, $periode, $percepatan, $penundaan)
{
    if ($percepatan > 0) {
        $kenaikan = $periode - $percepatan;
    } elseif ($penundaan) {
        $kenaikan = $periode + $penundaan;
    } else {
        $kenaikan = $periode;
    }
    $tgl1 = date('Y-m-d', strtotime('+' . $kenaikan . ' years ', strtotime($tanggal)));
    $b = new DateTime();
    $date = date('Y-m-d');
    if ($tgl1 < $date) {
        echo "<span style='color:red;'>Sudah Lewat</span>";
    } elseif ($tgl1 > $date) {
        $jatuh = date_create($tgl1);
        $kurang = date_diff($b, $jatuh);
        $tahun = $kurang->y;
        $bulan = $kurang->m;
        $hr = $kurang->d;
        echo "<span style='color:red;'>" . $tahun . " tahun " . $bulan . " bulan " . $hr . " hari </span>";
    } else {
        echo "<span style='color:red;'>Hari Ini</span>";
    }
}
function kenaikanSelanjutnya($tgl, $periode, $percepatan, $penundaan)
{
    if ($percepatan > 0) {
        return date('d-m-Y', strtotime('+' . $periode - $percepatan  . 'years', strtotime($tgl)));
    } elseif ($penundaan > 0) {
        return date('d-m-Y', strtotime('+' . $periode + $penundaan  . 'years', strtotime($tgl)));
    } else {
        return date('d-m-Y', strtotime('+' . $periode  . 'years', strtotime($tgl)));
    }
}
function naikPangkat($con, $after_date)
{
    $data = mysqli_query($con, "SELECT * FROM pangkat_terakhir");
    while ($d = mysqli_fetch_array($data)) {
        $now = date('Y-m-d');
        $i = date('Y-m-d', strtotime('-30 years -12 months -30 days', strtotime($now)));
        $j = date($after_date);
    }
    return  mysqli_query($con, "SELECT * FROM pegawai INNER JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip WHERE
    pangkat_terakhir.tgl_pangkat_terakhir >= CAST('$i' AS DATE) AND pangkat_terakhir.tgl_pangkat_terakhir <= CAST('$j' AS DATE) ");
}
function update_kgb($con)
{
    $data = mysqli_query($con, "SELECT * FROM kgb_terakhir");
    while ($d = mysqli_fetch_array($data)) {
        $now = date('Y-m-d');
        $h = date('Y-m-d', strtotime('-30 years ', strtotime($now)));
        $j = date('Y-12-31');
    }
    return  mysqli_query($con, "SELECT * FROM pegawai JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip WHERE 
    kgb_terakhir.tgl_kgb_terakhir >= CAST('$h' AS DATE) AND kgb_terakhir.tgl_kgb_terakhir <= CAST('$j' AS DATE) ");
}
function kosong($var1)
{
    if ($var1 == "") {
        return "<span class='badge badge-pill badge-warning'>Belum Di Isi</span>";
    } else {
        return $var1;
    }
}
