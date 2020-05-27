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
function tempo($tanggal, $periode, $percepatan)
{
    if ($periode > 0) {
        $kenaikan = $periode - $percepatan;
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
    }
}
function kenaikanSelanjutnya($periode, $percepatan, $penundaan, $tgl)
{
    if ($percepatan > 0) {
        echo date('d-m-Y', strtotime('+' . $periode - $percepatan  . 'years', strtotime($tgl)));
    } elseif ($penundaan > 0) {
        echo date('d-m-Y', strtotime('+' . $periode + $penundaan  . 'years', strtotime($tgl)));
    } else {
        echo date('d-m-Y', strtotime('+' . $periode  . 'years', strtotime($tgl)));
    }
}
