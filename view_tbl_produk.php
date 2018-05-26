
<!-- Buat Preview Data -->
<?php
// Jika user telah mengklik tombol Preview
if(isset($_POST['preview_4'])){
    $nama_file_baru = 'data.csv';

    // Cek apakah terdapat file data.xlsx pada folder tmp
    if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
        unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

    $nama_file = $_FILES['file']['name']; // Ambil nama file y
    $tmp_file = $_FILES['file']['tmp_name'];
    $ext = pathinfo($nama_file, PATHINFO_EXTENSION); // Ambil ekstensi file yang akan diupload

    // Cek apakah file yang diupload adalah file CSV
    if($ext == "csv"){
        // Upload file yang dipilih ke folder tmp
        move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

        // Load librari PHPExcel nya
        require_once 'PHPExcel/PHPExcel.php';

        $inputFileType = 'CSV';
        $inputFileName = 'tmp/data.csv';

        $reader = PHPExcel_IOFactory::createReader($inputFileType);
        $excel = $reader->load($inputFileName);

        // Buat sebuah tag form untuk proses import data ke database
        echo "<br><form method='post' action='upload_tbl_produk.php'>";

        // Buat sebuah div untuk alert validasi kosong
        echo "<div class='alert alert-danger' id='kosong'>
        Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum lengkap diisi.
        </div>";

        echo "<table class='table table-bordered'>
        <tr>
            <th colspan='4' class='text-center'>Preview Data</th>
        </tr>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Harga Bahan</th>
            <th>Ongkos Produksi</th>
        </tr>";

        $numrow = 1;
        $kosong = 0;
        $worksheet = $excel->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) { // Lakukan perulangan dari data yang ada di csv
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
                $idproduk = $get[0];
                $namaproduk = $get[1];
                $hargabahan = $get[2];
                $ongkosproduksi = $get[3];

                // Cek jika semua data tidak diisi
                if(empty($idproduk) && empty($namaproduk) && empty($hargabahan) && empty($ongkosproduksi))
                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Validasi apakah semua data telah diisi
                $idproduk_td = ( ! empty($idproduk))? "" : " style='background: #E07171;'"; // Jika idindustri kosong, beri warna merah
                $namaproduk_td = ( ! empty($namaproduk))? "" : " style='background: #E07171;'"; // Jika namaindustri kosong, beri warna merah
                $hargabahan_td = ( ! empty($hargabahan))? "" : " style='background: #E07171;'"; // Jika namaindustri kosong, beri warna merah
                $ongkosproduksi_td = ( ! empty($ongkosproduksi))? "" : " style='background: #E07171;'"; // Jika namaindustri kosong, beri warna merah

                // Jika salah satu data ada yang kosong
                if(empty($idproduk) && empty($namaproduk) && empty($hargabahan) && empty($ongkosproduksi)){
                    $kosong++; // Tambah 1 variabel $kosong
                }

                echo "<tr>";
                echo "<td".$idproduk_td.">".$idproduk."</td>";
                echo "<td".$namaproduk_td.">".$namaproduk."</td>";
                echo "<td".$hargabahan_td.">".$hargabahan."</td>";
                echo "<td".$ongkosproduksi_td.">".$ongkosproduksi."</td>";
                echo "</tr>";
            }

            $numrow++; // Tambah 1 setiap kali looping
        }

        echo "</table>";

        // Cek apakah variabel kosong lebih dari 1
        // Jika lebih dari 1, berarti ada data yang masih kosong
        if($kosong > 1){
        ?>
            <script>
            $(document).ready(function(){
                // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                $("#kosong").show(); // Munculkan alert validasi kosong
            });
            </script>
        <?php
        }else{ // Jika semua data sudah diisi
            echo "<hr>";

            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import_4' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
        }

        echo "</form>";
    }else{ // Jika file yang diupload bukan File CSV
        // Munculkan pesan validasi
        echo "<div class='alert alert-danger'>
        Hanya File CSV (.csv) yang diperbolehkan
        </div>";
    }
}
?>
