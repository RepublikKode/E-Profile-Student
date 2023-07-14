<?php
session_start();
require '../functions/functions.php';

// Mengambil data kuesioner dengan JOIN ke tabel users
$query = "SELECT k.*, u.gayaBelajar, u.kepribadian, u.kecerdasan
          FROM kuesioner k
          INNER JOIN users u ON k.userId = u.id";
$getKuesioner = query($query);

// Mengatur nama file Excel yang akan diunduh
$filename = "data_kuesioner.xlsx";

// Menggunakan PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Membuat objek Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Mendefinisikan warna latar belakang dan warna teks yang diinginkan
$backgroundColor = 'FF0000'; // Misalnya, warna latar belakang merah
$textColor = 'FFFFFF'; // Misalnya, warna teks putih

// Menuliskan header kolom ke dalam file Excel dengan gaya heading
$columns = array(
    'Nama',
    'TKL',
    'TTL',
    'Gender',
    'Nama Orang Tua',
    'Alamat',
    'NISN',
    'NIS',
    'Nomor Telepon',
    'Mapel Tinggi',
    'Nilai Tinggi',
    'Mapel Rendah',
    'Nilai Rendah',
    'Lomba',
    'Lomba Non',
    'Uraian',
    'Tingkat',
    'Jurusan',
    'Alasan',
    'Minat',
    'Alasan Minat',
    'Gaya Belajar',
    'Kepribadian',
    'Kecerdasan'
);
$columnIndex = 1;
foreach ($columns as $column) {
    $cellCoordinate = $sheet->getCellByColumnAndRow($columnIndex, 1)->getCoordinate();

    // Mengatur latar belakang warna
    $sheet->getStyle($cellCoordinate)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($backgroundColor);

    // Mengatur warna teks
    $sheet->getStyle($cellCoordinate)->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color($textColor));

    // Mengatur penjajaran teks ke tengah secara horizontal dan vertikal
    $sheet->getStyle($cellCoordinate)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle($cellCoordinate)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    // Menuliskan nilai kolom pada sel
    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $column);

    $columnIndex++;
}

// Menuliskan data kuesioner beserta data dari tabel users ke dalam file Excel
$rowIndex = 2;
foreach ($getKuesioner as $gk) {
    $sheet->setCellValueByColumnAndRow(1, $rowIndex, $gk['nama']);
    $sheet->setCellValueByColumnAndRow(2, $rowIndex, $gk['tkl']);
    $sheet->setCellValueByColumnAndRow(3, $rowIndex, $gk['ttl']);
    $sheet->setCellValueByColumnAndRow(4, $rowIndex, $gk['gender']);
    $sheet->setCellValueByColumnAndRow(5, $rowIndex, $gk['namaOrtu']);
    $sheet->setCellValueByColumnAndRow(6, $rowIndex, $gk['alamat']);
    $sheet->setCellValueByColumnAndRow(7, $rowIndex, $gk['nisn']);
    $sheet->setCellValueByColumnAndRow(8, $rowIndex, $gk['nis']);
    $sheet->setCellValueByColumnAndRow(9, $rowIndex, $gk['nomorTelp']);
    $sheet->setCellValueByColumnAndRow(10, $rowIndex, $gk['mapelTinggi']);
    $sheet->setCellValueByColumnAndRow(11, $rowIndex, $gk['nilaiTinggi']);
    $sheet->setCellValueByColumnAndRow(12, $rowIndex, $gk['mapelRendah']);
    $sheet->setCellValueByColumnAndRow(13, $rowIndex, $gk['nilaiRendah']);
    $sheet->setCellValueByColumnAndRow(14, $rowIndex, $gk['lomba']);
    $sheet->setCellValueByColumnAndRow(15, $rowIndex, $gk['lombaNon']);
    $sheet->setCellValueByColumnAndRow(16, $rowIndex, $gk['uraian']);
    $sheet->setCellValueByColumnAndRow(17, $rowIndex, $gk['tingkat']);
    $sheet->setCellValueByColumnAndRow(18, $rowIndex, $gk['jurusan']);
    $sheet->setCellValueByColumnAndRow(19, $rowIndex, $gk['alasan']);
    $sheet->setCellValueByColumnAndRow(20, $rowIndex, $gk['minat']);
    $sheet->setCellValueByColumnAndRow(21, $rowIndex, $gk['alasanMinat']);
    $sheet->setCellValueByColumnAndRow(22, $rowIndex, $gk['gayaBelajar']);
    $sheet->setCellValueByColumnAndRow(23, $rowIndex, $gk['kepribadian']);
    $sheet->setCellValueByColumnAndRow(24, $rowIndex, $gk['kecerdasan']);

    $rowIndex++;
}

// Menyimpan file Excel
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Mengatur header untuk menghasilkan file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Membaca file Excel dan menulis ke output
readfile($filename);
