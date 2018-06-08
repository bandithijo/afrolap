<?php
$filename = 'csv_soal_no_4.csv';
$export_data = unserialize($_POST['export_4']);

$header = ['no', 'produk', 'harga', 'jumlah', 'penjualan', 'laba'];

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
