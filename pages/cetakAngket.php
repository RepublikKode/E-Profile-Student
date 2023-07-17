<?php
session_start();
require_once '../functions/functions.php';

$id = $_SESSION['loginId'];

// Memeriksa apakah $id tidak ada di kolom userId dari tabel kuesioner
$query = "SELECT userId FROM kuesioner WHERE userId = '$id'";
$result = $conn->query($query);

// Jika $id tidak ada di tabel kuesioner, redirect ke angketSiswa.php
if ($result->num_rows === 0) {
  header("Location: angketSiswa.php");
  exit;
}

// Memeriksa apakah gayaBelajar, kepribadian, atau kecerdasan masih NULL
$query = "SELECT gayaBelajar, kepribadian, kecerdasan FROM users WHERE id = '$id'";
$result = $conn->query($query);

// Jika nilai gayaBelajar, kepribadian, atau kecerdasan NULL, redirect ke halaman yang sesuai
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $gayaBelajar = $row['gayaBelajar'];
  $kepribadian = $row['kepribadian'];
  $kecerdasan = $row['kecerdasan'];

  if ($gayaBelajar === NULL) {
    header("Location: gayaBelajar.php");
    exit;
  } elseif ($kepribadian === NULL) {
    header("Location: kepribadian.php");
    exit;
  } elseif ($kecerdasan === NULL) {
    header("Location: minatBelajar.php");
    exit;
  }
}

$getAngket = query("SELECT * FROM kuesioner WHERE userId = $id")[0];
$getUser = query("SELECT * FROM users WHERE id = '$id'")[0];

// Membuat tampilan HTML
$html = '<html>';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<title>Cetak Angket</title>';
$html .= '<style>';
$html .= 'table { border-collapse: collapse; width: 100%; }';
$html .= 'th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }';
$html .= 'th { position: sticky; top: 0; background-color: #f2f2f2; }';
$html .= '</style>';
$html .= '</head>';
$html .= '<body>';
$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$html .= '<tr>';
$html .= '<th>Nama</th>';
$html .= '<td>' . $getAngket['nama'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tempat Lahir</th>';
$html .= '<td>' . $getAngket['tkl'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tanggal Lahir</th>';
$html .= '<td>' . $getAngket['ttl'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Jenis Kelamin</th>';
$html .= '<td>' . $getAngket['gender'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Nama Orang Tua</th>';
$html .= '<td>' . $getAngket['namaOrtu'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Alamat</th>';
$html .= '<td>' . $getAngket['alamat'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>NISN</th>';
$html .= '<td>' . $getAngket['nisn'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>NIS</th>';
$html .= '<td>' . $getAngket['nis'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Nomor Telepon</th>';
$html .= '<td>' . $getAngket['nomorTelp'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th colspan="2">Nilai Mata Pelajaran</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Mapel Dengan Nilai Tertinggi</th>';
$html .= '<td>' . $getAngket['mapelTinggi'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Nilai Mapel Tertinggi</th>';
$html .= '<td>' . $getAngket['nilaiTinggi'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Mapel Dengan Nilai Terendah</th>';
$html .= '<td>' . $getAngket['mapelRendah'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Nilai Mapel Terendah</th>';
$html .= '<td>' . $getAngket['nilaiRendah'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th colspan="2">Lomba</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Lomba</th>';
$html .= '<td>' . $getAngket['lomba'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Lomba non Akademik</th>';
$html .= '<td>' . $getAngket['lombaNon'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Uraian</th>';
$html .= '<td>' . $getAngket['uraian'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tingkat</th>';
$html .= '<td>' . $getAngket['tingkat'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Jurusan</th>';
$html .= '<td>' . $getAngket['jurusan'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Alasan</th>';
$html .= '<td>' . $getAngket['alasan'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Minat</th>';
$html .= '<td>' . $getAngket['minat'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Alasan Minat</th>';
$html .= '<td>' . $getAngket['alasanMinat'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th colspan="2">Hasil Tes</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tes Gaya Belajar</th>';
$html .= '<td>' . $getUser['gayaBelajar'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tes Kepribadian</th>';
$html .= '<td>' . $getUser['kepribadian'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th>Tes Kecerdasan</th>';
$html .= '<td>' . $getUser['kecerdasan'] . '</td>';
$html .= '</tr>';
$html .= '</tbody>';
$html .= '</table>';
$html .= '</body>';
$html .= '</html>';

// Menyimpan tampilan HTML ke file Word
$filename = 'angket_' . $_SESSION['fullname'] . '.doc';
file_put_contents($filename, $html);

// Mengatur header agar tampilan dikirim sebagai file Word
header("Content-Disposition: attachment; filename=$filename");
header('Content-Type: application/msword');
header('Content-Length: ' . filesize($filename));
header('Pragma: no-cache');
header('Expires: 0');

// Mengirimkan tampilan dokumen sebagai file Word
readfile($filename);

// Menghapus file setelah dikirim
unlink($filename);
?>
