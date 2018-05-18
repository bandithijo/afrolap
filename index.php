<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLAP Penjualan PT XYZ Internasional</title>
    </head>
    <body>
        <div id="menu">
            Beranda | File (INPUT) | Proses (Analisis) | Report (Export)
        </div>
        Menu Dashboard:<br />
        Pertanyaan Analisis :
        <ol>
            <li><a href="index.php?q=1">Tunjukkan hasil penjualan setiap tahun?</a></li>
            <li><a href="index.php?q=2">Pada tahun 2002, bulan apa penjualan tertinggi?</a></li>
            <li><a href="index.php?q=3">Dimana lokasi penjualan tertinggi?</a></li>
            <li><a href="index.php?q=4">Produk apa yang paling banyak terjual pada penjualan tertinggi?</a></li>
            <li><a href="index.php?q=5">Tipe pelanggan seperti apa (siapa) yang mendapat penjualan tertinggi?</a></li>
        </ol>
        <br />
        <?php
        // koneksi ke database
        $link = mysqli_connect('localhost', 'root', '', 'dw_tokos');
        $q = isset($_REQUEST['q']) ? ($_REQUEST['q']) : "";
        ?>

        <!-- No. 1 -->
        <?php
        if($q && $q == 1) {
        ?>
        <table>
            <th>No.</th>
            <th>Tahun</th>
            <th>Total Penjualan</th>
            <th>Total Laba</th>
        <?php
        // query
        $query = "SELECT waktu.tahun as tahun,
                         SUM(penjualan.penjualan) as total_penjualan,
                         SUM(penjualan.labapenjualan) as total_laba
                  FROM waktu, penjualan
                  WHERE waktu.idwaktu = penjualan.idwaktu
                  GROUP BY waktu.tahun
                  ORDER BY waktu.idwaktu";
        $result = mysqli_query($link, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['total_penjualan']; ?></td>
                <td><?php echo $row['total_laba']; ?></td>
            </tr>
            <?php
        }
        }
            ?>
        </table>
        <!-- Akhir No. 1 -->

        <!-- No. 2 -->
        <?php
        if($q && $q == 2) {
        ?>
        <table>
            <th>No.</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Total Penjualan</th>
            <th>Total Laba</th>
        <?php
        // query
        $query = "SELECT waktu.tahun as tahun,
                         waktu.bulan as bulan,
                         SUM(penjualan.penjualan) as total_penjualan,
                         SUM(penjualan.labapenjualan) as total_laba
                  FROM waktu, penjualan
                  WHERE waktu.idwaktu = penjualan.idwaktu
                  GROUP BY bulan
                  ORDER BY waktu.bulan ASC";
        $result = mysqli_query($link, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['bulan']; ?></td>
                <td><?php echo $row['total_penjualan']; ?></td>
                <td><?php echo $row['total_laba']; ?></td>
            </tr>
            <?php
        }
        }
            ?>
        </table>
        <!-- Akhir No. 2 -->

        <!-- No. 3 -->
        <?php
        if($q && $q == 3) {
        ?>
        <table>
            <th>No.</th>
            <th>Propinsi</th>
            <th>Negara</th>
            <th>Penjualan Tertinggi</th>
        <?php
        // query
        $query = "SELECT lokasi.propinsi as propinsi,
                         lokasi.negara as negara,
                         penjualan.penjualan as penjualan_tertinggi
                  FROM lokasi, penjualan
                  WHERE lokasi.idlokasi = penjualan.idlokasi
                  ORDER BY penjualan_tertinggi DESC";
        $result = mysqli_query($link, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['negara']; ?></td>
                <td><?php echo $row['propinsi']; ?></td>
                <td><?php echo $row['penjualan_tertinggi']; ?></td>

            </tr>
            <?php
        }
        }
            ?>
        </table>
        <!-- Akhir No. 3 -->

        <!-- No. 4 -->
        <?php
        if($q && $q == 4) {
        ?>
        <table>
            <th>No.</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Penjualan</th>
            <th>Laba</th>
        <?php
        // query
        $query = "SELECT produk.namaproduk as produk,
                         produk.hargabahan as harga,
                         (penjualan.penjualan/produk.hargabahan) as jumlah,
                         penjualan.penjualan as penjualan,
                         penjualan.labapenjualan as laba
                  FROM produk, penjualan
                  WHERE produk.idproduk = penjualan.idproduk
                  ORDER BY jumlah DESC";
        $result = mysqli_query($link, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['produk']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['penjualan']; ?></td>
                <td><?php echo $row['laba']; ?></td>

            </tr>
            <?php
        }
        }
            ?>
        </table>
        <!-- Akhir No. 4 -->

        <!-- No. 5 -->
        <?php
        if($q && $q == 5) {
        ?>
        <table>
            <th>No.</th>
            <th>Pelanggan</th>
            <th>Total Penjualan</th>
        <?php
        // query
        $query = "SELECT tipepelanggan.deskripsipelanggan as pelanggan,
                         SUM(penjualan.penjualan) as total_penjualan
                  FROM tipepelanggan, penjualan
                  WHERE tipepelanggan.idtipepelanggan = penjualan.idtipepelanggan
                  GROUP BY pelanggan
                  ORDER BY tipepelanggan.deskripsipelanggan ASC";
        $result = mysqli_query($link, $query);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['pelanggan']; ?></td>
                <td><?php echo $row['total_penjualan']; ?></td>

            </tr>
            <?php
        }
        }
            ?>
        </table>
        <!-- Akhir No. 5 -->

    </body>
</html>
