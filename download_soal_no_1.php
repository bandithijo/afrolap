<?php
$filename = 'csv_soal_no_1.csv';
$export_data = unserialize($_POST['export_1']);

$header = ['no', 'tahun', 'total_penjualan', 'total_laba'];

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
