<?php

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import_3'])){ // Jika user mengklik tombol Import
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$inputFileType = 'CSV';
	$inputFileName = 'tmp/data.csv';

	$reader = PHPExcel_IOFactory::createReader($inputFileType);
	$excel = $reader->load($inputFileName);

	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO penjualan VALUES(:labapenjualan,:penjualan,:idwaktu,:idlokasi,;idindustri,:idtipepelanggan,:idproduk)");

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
            $labapenjualan = $get[0];
            $penjualan = $get[1];
            $idwaktu = $get[2];
            $idlokasi = $get[3];
            $idindustri = $get[4];
            $idtipepelanggan = $get[5];
            $idproduk = $get[6];

			// Cek jika semua data tidak diisi
            if(empty($labapenjualan) && empty($penjualan) && empty($idwaktu) && empty($idlokasi) && empty($idindustri) && empty($idtipepelanggan) && empty($idproduk))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

			// Proses simpan ke Database
			$sql->bindParam(':labapenjualan', $labapenjualan);
			$sql->bindParam(':penjualan', $penjualan);
			$sql->bindParam(':idwaktu', $idwaktu);
			$sql->bindParam(':idlokasi', $idlokasi);
			$sql->bindParam(':idindustri', $idindustri);
			$sql->bindParam(':idtipepelanggan', $idtipepelanggan);
			$sql->bindParam(':idproduk', $idproduk);
			$sql->execute(); // Eksekusi query insert
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('Location: index.php?page=import'); // Redirect ke halaman awal
?>
