<?php
ob_start();
include 'fpdf/fpdf.php';
include '../config/connection.php';
include 'function-cetak.php';
$nip = $_GET['nip'];
$data = mysqli_query($con, "SELECT * FROM pegawai LEFT JOIN golongan ON pegawai.id_golongan=golongan.id_golongan
LEFT JOIN pangkat_terakhir ON pegawai.nip=pangkat_terakhir.nip LEFT JOIN kgb_terakhir ON pegawai.nip=kgb_terakhir.nip
LEFT JOIN instansi ON pegawai.kd_instansi=instansi.id_instansi WHERE pegawai.nip='$nip'");
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}
function hari_ini($hari)
{

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return  $hari_ini;
}
function bulan($mkg_bulan)
{
    if ($mkg_bulan == 0) {
        $mkg = '00';
    } else if ($mkg_bulan > 9) {
        $mkg = $mkg_bulan;
    } else {
        $mkg = '0' . $mkg_bulan . '';
    }
    return $mkg;
}

class pdf extends FPDF
{
    function letak($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 36, 14, 22, 27);
        //menggeser posisi sekarang
    }
    function letak1($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 40, 10, 22, 27);
        //menggeser posisi sekarang
    }
    function judul($teks1, $teks2, $teks3, $teks4, $teks5, $teks6, $teks7, $teks8)
    {
        $this->Cell(35);
        $this->SetFont('Times', '', '14');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', 'B', '20');
        $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '11');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks5, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks6, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '9');
        $this->Cell(0, 4, $teks7, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '12');
        $this->Cell(0, 7, $teks8, 0, 1, 'C');
        $this->Cell(17);
    }
    function judul1($teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $this->Cell(35);
        $this->SetFont('Times', '', '14');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', 'B', '20');
        $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '11');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '9');
        $this->Cell(0, 4, $teks4, 0, 1, 'C');
        $this->Cell(35);
        $this->SetFont('Times', '', '12');
        $this->Cell(0, 7, $teks5, 0, 1, 'C');
        $this->Cell(17);
    }
    function isi($isi2, $isi3, $isi4, $isi5)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(4);
        $this->Cell(27);
        $this->Cell(5, 5, $isi2, 0, 0, 'L');
        $this->Cell(65, 5, $isi3, 0, 0, 'L');
        $this->Cell(5, 5, $isi4, 0, 0, 'L');
        $this->Cell(60, 5, $isi5, 0, 0, 'L');
        $this->Ln(2);
    }
    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 55, 208, 55);
        $this->SetLineWidth(0);
        $this->Line(10, 56, 208, 56);
    }
    function garis1()
    {
        $this->SetLineWidth(1);
        $this->Line(20, 40, 200, 40);
        $this->SetLineWidth(0);
        $this->Line(20, 41, 200, 41);
    }
    function tanggalatas($tgl)
    {
        $this->setFont('Times', '', '11');
        $this->Ln(3);
        $this->Cell(95);
        $this->Cell(0, 10, $tgl, 0, 10, 'C');
    }
    function atas($atas1, $atas2, $atas3, $atas4)
    {
        $this->setFont('Times', '', '12');
        $this->Ln(3);
        $this->Cell(15);
        $this->Cell(20, 5, $atas1, 0, 0, 'L');
        $this->Cell(5, 5, $atas2, 0, 0, 'L');
        $this->Cell(89, 5, $atas3, 0, 0, 'L');
        $this->Cell(50, 5, $atas4, 0, 0, 'L');
    }
    function tengah($tengah1, $tengah2, $tengah3, $tengah4)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(4);
        $this->Cell(37);
        $this->Cell(5, 5, $tengah1, 0, 0, 'L');
        $this->Cell(55, 5, $tengah2, 0, 0, 'L');
        $this->Cell(5, 5, $tengah3, 0, 0, 'L');
        $this->Cell(60, 5, $tengah4, 0, 0, 'L');
        $this->Ln(2);
    }
    function bawah($bawah1, $bawah2)
    {
        $this->SetFont('Times', '', '11');
        $this->Ln(1);
        $this->Cell(30);
        $this->Cell(8, 5, $bawah1, 0, 0, 'L');
        $this->MultiCell(0, 5, $bawah2);
    }
    function kadis($kadis1, $kadis2, $kadis3, $kadis4)
    {
        $this->SetFont('Times', '', '12');
        $this->Ln(4);
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis1, 0, 0, 'C');
        $this->Ln(25);
        $this->SetFont('Times', 'BU', '12');
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis2, 0, 1, 'C');
        $this->Cell(130, 10);
        $this->SetFont('Times', '', '12');
        $this->Cell(0, 5, $kadis3, 0, 1, 'C');
        $this->Cell(130, 10);
        $this->Cell(0, 5, $kadis4, 0, 1, 'C');
        $this->Ln(2);
    }
    function tembusan($tembusan1, $tembusan2)
    {
        $this->Cell(13);
        $this->SetFont('Times', '', '11');
        $this->Cell(5, 5, $tembusan1, 0, 0, 'L');
        $this->SetFont('Times', '', '11');
        $this->Cell(5, 5, $tembusan2, 0, 1, 'L');
    }
}
//instantisasi objek
$pdf = new pdf();

//Mulai dokumen
$pdf->AddPage('P', 'Legal');
//meletakkan gambar

//meletakkan judul disamping logo diatas
while ($d = mysqli_fetch_array($data)) {
    if (($d['no_instansi'] != "") && ($d['sektor'] != "")) {
        $pdf->letak('../assets/images/logo_pemerintah.png');
        $pdf->judul(
            strtoupper($d['pemerintah']),
            strtoupper($d['nama_instansi']),
            $d['alamat'] . ' No. ' . $d['no_instansi'] . ' Telp. ' . $d['telepon'] . ', Fax ' . $d['fax'],
            substr($d['sektor'], 0, 59),
            substr($d['sektor'], 60, 80),
            substr($d['sektor'], 140, 100),
            'E-mail : ' . $d['email'] . ', Website : ' . $d['website'],
            strtoupper($d['kecamatan']) . '-' . $d['kd_pos']
        );
        $pdf->garis();
    } else if (($d['no_instansi'] == "") && ($d['sektor'] != "")) {
        $pdf->letak('../assets/images/logo_pemerintah.png');
        $pdf->judul(
            strtoupper($d['pemerintah']),
            strtoupper($d['nama_instansi']),
            $d['alamat'] . ' Telp. ' . $d['telepon'] . ', Fax ' . $d['fax'],
            substr($d['sektor'], 0, 59),
            substr($d['sektor'], 60, 80),
            substr($d['sektor'], 140, 100),
            'E-mail : ' . $d['email'] . ', Website : ' . $d['website'],
            strtoupper($d['kecamatan']) . '-' . $d['kd_pos']
        );
        $pdf->garis();
    } else if (($d['no_instansi'] == "") && ($d['sektor'] == "")) {
        $pdf->letak1('../assets/images/logo_pemerintah.png');
        $pdf->judul1(
            strtoupper($d['pemerintah']),
            strtoupper($d['nama_instansi']),
            $d['alamat'] . ' Telp. ' . $d['telepon'] . ', Fax ' . $d['fax'],
            'E-mail : ' . $d['email'] . ', Website : ' . $d['website'],
            strtoupper($d['kecamatan']) . '-' . $d['kd_pos']
        );
        $pdf->garis1();
    } else if (($d['no_instansi'] != "") && ($d['sektor'] == "")) {
        $pdf->letak1('../assets/images/logo_pemerintah.png');
        $pdf->judul1(
            strtoupper($d['pemerintah']),
            strtoupper($d['nama_instansi']),
            $d['alamat'] . ' No. ' . $d['no_instansi'] . ' Telp. ' . $d['telepon'] . ', Fax ' . $d['fax'],
            'E-mail : ' . $d['email'] . ', Website : ' . $d['website'],
            strtoupper($d['kecamatan']) . '-' . $d['kd_pos']
        );
        $pdf->garis1();
    }

    //membuat garis ganda tebal dan tipis

    $pdf->tanggalatas('Cibinong,     '  . tgl_indo(date('Y-m'))) . '';
    $pdf->atas('Nomor', ':', '', 'Kepada Yth,');
    $pdf->Ln(1);
    $pdf->atas('Sifat', ':', 'Penting', 'Kepala Badan Pengelolaan');
    $pdf->Ln(1);
    $pdf->atas('Lampiran', ':', '-', 'Keuangan Dan Aset Daerah');
    $pdf->Ln(1);
    $pdf->atas('Perihal', ':', 'Pemberitahuan Kenaikan Gaji Berkala', 'Kabupaten Bogor');
    $pdf->Ln(1);
    $pdf->atas('', '', '', 'Di');
    $pdf->Ln(1);
    $pdf->atas('', '', '', '        Cibinong');
    $pdf->Ln(8);
    $pdf->Cell(20);
    $pdf->Cell(0, 5, 'Diberitahukan bahwa berhubung telah di penuhinya masa kerja dan syarat-syarat lainnya kepada :', 0, 1, 'L');

    $percepatan = $d['percepatan_kgb'];
    $periode = $d['periode_kgb'];
    $penundaan = $d['penundaan_kgb'];
    $tgl = $d['tgl_kgb_terakhir'];
    if ($percepatan > 0) {
        $selanjutnya = date('d-m-Y', strtotime('+' . $periode - $percepatan  . 'years', strtotime($tgl)));
        $selanjutnya1 = date('Y-m-d', strtotime('+' . $periode  . 'years', strtotime($tgl)));
    } elseif ($penundaan > 0) {
        $selanjutnya = date('d-m-Y', strtotime('+' . $periode + $penundaan . 'years', strtotime($tgl)));
        $selanjutnya1 = date('Y-m-d', strtotime('+' . $periode  . 'years', strtotime($tgl)));
    } else {
        $selanjutnya = date('d-m-Y', strtotime('+' . $periode . 'years', strtotime($tgl)));
        $selanjutnya1 = date('Y-m-d', strtotime('+' . $periode . 'years', strtotime($tgl)));
    }
    $pdf->isi(
        '1.',
        'Nama',
        ':',
        strtoupper($d['nama'])
    );

    $pdf->isi(
        '2.',
        'NIP',
        ':',
        $d['nip']
    );
    $data1 = mysqli_query($con, "SELECT * FROM kgb_terakhir INNER JOIN golongan ON kgb_terakhir.id_golongan_terakhir=golongan.id_golongan  WHERE nip='$nip'");
    $b = mysqli_fetch_array($data1);
    $pdf->isi(
        '3.',
        'Pangkat/Golongan',
        ':',
        '' . $b['nama_golongan'] . '/' . $b['id_golongan_terakhir'] . ''
    );
    $pdf->isi(
        '4.',
        'Kantor/Tempat',
        ':',
        '' . $d['nama_instansi'] . ' ' . $d['status'] . ' ' . $d['nama_status'] . ''
    );
    if ($d['gapok_terakhir']) {
        $gapok_terakhir = number_format($d['gapok_terakhir'], 0, ",", ".") . '-(' . $d['pp'] . ')';
    } else {
        $gapok_terakhir = '-';
    }
    $pdf->isi(
        '5.',
        'Gaji Pokok Lama',
        ':',
        'Rp.' . $gapok_terakhir . ''
    );
    $pdf->Ln(3);
    $pdf->Cell(32);
    $pdf->SetFont('Times', '', '11');
    $pdf->Cell(0, 5, '(Atas dasar Kenaikan Gaji Berkala yang ditetapkan)', 0, 0, 'L');
    $pdf->Ln(3);
    $pdf->tengah('a.', 'Oleh Pejabat', ':', 'Bupati Bogor');
    $pdf->tengah('b.', 'Tanggal', ':', date('d-m-Y', strtotime($d['tgl_surat_terakhir'])));
    $pdf->tengah('c.', 'Nomor', ':', $d['no_kgb']);
    $pdf->tengah('d.', 'Tanggal Mulai Berlaku', ':', date('d-m-Y', strtotime($d['tgl_kgb_terakhir'])));
    $tahun_kgb = $d['mkg_tahun_kgb'];
    $pdf->tengah('e.', 'Masa Kerja Golongan', ':', '' . $tahun_kgb . ' Tahun ' . bulan($d['mkg_bulan_kgb'])
        . ' Bulan');
    $pdf->tengah('f.', 'Diberikan Kenaikan Gaji Berkala hingga memperoleh', '', '');
    $tahun = $d['mkg_tahun_kgb'] + $d['periode_kgb'] - $d['percepatan_kgb'] + $d['penundaan_kgb'];
    $id_gol = $d['id_golongan'];
    $gaji = mysqli_query($con, "SELECT * FROM gaji_pokok INNER JOIN peraturan ON gaji_pokok.id_peraturan=peraturan.id_peraturan WHERE gaji_pokok.mkg='$tahun' AND gaji_pokok.id_golongan='$id_gol'");
    $a = mysqli_fetch_array($gaji);
    $pdf->isi(
        '6.',
        'Gaji Pokok Baru',
        ':',
        'Rp.' . number_format($a['gaji'], 0, ",", ".") . '-(' . $a['nama_pp'] . ')'
    );
    $pdf->isi(
        '7.',
        'Berdasarkan Masa Kerja',
        ':',
        '' . $tahun . ' Tahun ' . bulan($d['mkg_bulan_kgb'])
            . ' Bulan'
    );
    $pdf->isi(
        '8.',
        'Dalam Golongan',
        ':',
        '' . $d['nama_golongan'] . '/' . $id_gol . ''
    );
    $pdf->isi(
        '9.',
        'Mulai Tanggal',
        ':',
        $selanjutnya

    );
    $pdf->Ln(5);
    $pdf->cell(12);
    $pdf->setFont('Times', 'B', '11');
    $ket = "KETERANGAN";
    $pdf->Cell(0, 5, $ket, 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->bawah('a.', 'Yang bersangkutan adalah Pegawai Negeri Sipil');
    $pdf->bawah('b.', "Kenaikan Gaji yang akan datang pada Tanggal " . TanggalIndo($selanjutnya1) . ", Jika memenuhi syarat yang di perlukan.");
    $pdf->bawah('', "Diharapkan agar sesuai dengan " . $a['keterangan'] . " kepada pegawai tersebut dapat dibayarkan penghasilannya berdasarkan gaji pokok yang baru. ");
    $pdf->setFont('Times', '', '12');
    $instansi = mysqli_query($con, "SELECT * FROM instansi INNER JOIN pegawai ON instansi.nip_kepala_instansi=pegawai.nip");
    $f = mysqli_fetch_array($instansi);
    $nip_kepala = $f['nip_kepala_instansi'];
    $gol_kepala = mysqli_query($con, "SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan=golongan.id_golongan WHERE pegawai.nip='$nip_kepala'");
    $c = mysqli_fetch_array($gol_kepala);
    $pdf->kadis("Kepala Dinas", $f['nama'], $c['nama_golongan'], "NIP.  " . $nip_kepala . "");
    $pdf->Ln(5);
    $pdf->cell(13);
    $pdf->setFont('Times', 'U', '11');
    $pdf->Cell(0, 5, "Tembusan Disampaikan Kepada Yth :", 0, 1, 'L');
    $pdf->tembusan('1.', 'Menteri Dalam Negeri di Jakarta');
    $pdf->tembusan('2.', 'Gubernur Jawa Barat di Bandung');
    $pdf->tembusan('3.', 'Kepala Kantor BKN Regional III di Bandung');
    $pdf->tembusan('4.', 'Inspektur Kabupaten Bogor');
    $pdf->tembusan('5.', 'Kepala BKPP Kabupaten Bogor');
    $pdf->Ln(1);
    $pdf->Cell(13);
    $pdf->SetFont('Times', '', '11');
    $pdf->Cell(5, 5, '6.', 0, 0, 'L');
    $pdf->Cell(8, 5, 'Sdr.', 0, 0, 'L');
    $pdf->SetFont('Times', 'B', '11');
    $pdf->Cell(5, 5, $d['nama'], 0, 0, 'L');
    $pdf->Output('KGB_' . date('Y', strtotime($selanjutnya)) . '_' . $d['nip'] . ".pdf", "I");
}
