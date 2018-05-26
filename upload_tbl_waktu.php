<?php

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import_6'])){ // Jika user mengklik tombol Import
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$inputFileType = 'CSV';
	$inputFileName = 'tmp/data.csv';

	$reader = PHPExcel_IOFactory::createReader($inputFileType);
	$excel = $reader->load($inputFileName);

	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO waktu VALUES(:idwaktu,:bulan,:tahun)");

	$numrow = 1;
	$worksheet = $excel->getActiveSheet();
	foreach ($worksheet->getRowIterator() as $row) {
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// START -->
			// Skrip untuk mengambil value nya
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set

			$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
			foreach ($cellIterator as $cell) {
				array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
			}
			// <-- END

			// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
            $idwaktu = $get[0];
            $bulan = $get[1];
            $tahun = $get[2];

			// Cek jika semua data tidak diisi
            if(empty($idwaktu) && empty($bulan) && empty($tahun))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

			// Proses simpan ke Database
			$sql->bindParam(':idwaktu', $idwaktu);
			$sql->bindParam(':bulan', $bulan);
			$sql->bindParam(':tahun', $tahun);
			$sql->execute(); // Eksekusi query insert
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('Location: index.php?page=import'); // Redirect ke halaman awal
?>
