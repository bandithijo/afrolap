<?php
$filename = 'csv_soal_no_2.csv';
$export_data = unserialize($_POST['export_2']);

$header = ['no', 'tahun', 'bulan', 'total_penjualan', 'total_laba'];

// file creation
$file = fopen($filename,"w");

fputcsv($file, $header);

foreach ($export_data as $line){
 fputcsv($file, $line);
}

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; ");

readfile($filename);

// deleting file
unlink($filename);
exit();
