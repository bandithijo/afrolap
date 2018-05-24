<?php include 'header.php'; ?>

<div style="margin-top:50px;"></div>
<div class="container-fluid">
<div class="row content">

<?php
// koneksi ke database
$link = mysqli_connect('localhost', 'root', '', 'dw_tokos');
// $q = isset($_REQUEST['q']) ? ($_REQUEST['q']) : "";
?>

<div class="col-sm-12 text-left">
<h1><i class="glyphicon glyphicon-list-alt"></i>&nbsp;<strong>Pertanyaan Analisis :</strong></h1>
<div class="panel-group" id="accordion">

<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 1 -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration:none;"><span class="badge">1</span>&nbsp; Tunjukkan hasil penjualan setiap tahun ?</a>
    </div><!-- panel-heading -->

    <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

<!-- No. 1 -->
<div style="margin-top:10px;"></div>
<div class="row">
<div class="col-sm-4">
<span class="alert alert-success" style="font-size:20pt;"><i class="glyphicon glyphicon-ok"></i>&nbsp;<strong>Jawaban No. 1&nbsp;</strong></span>
</div>
</div><!-- row -->
<br>

<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Tabel Total Penjualan Beserta Laba per Tahun</strong></h4>
<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Tahun</th>
    <th>Total Penjualan</th>
    <th>Total Laba</th>
</tr>
<?php
// query no. 1
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
} ?>
</table>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Penjualan per Tahun</strong></h4>
    <canvas id="chart_1_totalpenjualan" ></canvas>
    <script src="assets/charts/chart_1_totalpenjualan.js"></script>
</div>

<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Laba per Tahun</strong></h4>
    <canvas id="chart_1_totallaba" ></canvas>
    <script src="assets/charts/chart_1_totallaba.js"></script>
</div>
</div><!-- row -->
<!-- Akhir No. 1 -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->


<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 2 -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="text-decoration:none;"><span class="badge">2</span>&nbsp; Pada tahun 2002, bulan apa penjualan tertinggi ?</a>
    </div><!-- panel-heading -->

    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

<!-- No. 2 -->
<div style="margin-top:10px;"></div>
<div class="row">
<div class="col-sm-4">
<span class="alert alert-success" style="font-size:20pt;"><i class="glyphicon glyphicon-ok"></i>&nbsp;<strong>Jawaban No. 2&nbsp;</strong></span>
</div>
</div><!-- row -->
<br>

<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Tabel Total Penjualan Tertinggi pada Tahun 2002</strong></h4>
<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Tahun</th>
    <th>Bulan</th>
    <th>Total Penjualan</th>
    <th>Total Laba</th>
</tr>
<?php
// query no. 2
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
} ?>
</table>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Penjualan per Bulan di Tahun 2002</strong></h4>
    <canvas id="chart_2_totalpenjualan" ></canvas>
    <script src="assets/charts/chart_2_totalpenjualan.js"></script>
</div>

<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Laba per Bulan di Tahun 2002</strong></h4>
    <canvas id="chart_2_totallaba" ></canvas>
    <script src="assets/charts/chart_2_totallaba.js"></script>
</div>
</div><!-- row -->
<!-- Akhir No. 2 -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->


<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 3 -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="text-decoration:none;"><span class="badge">3</span>&nbsp; Dimana lokasi penjualan tertinggi ?</a>
    </div><!-- panel-heading -->

    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

<!-- No. 3 -->
<div style="margin-top:10px;"></div>
<div class="row">
<div class="col-sm-4">
<span class="alert alert-success" style="font-size:20pt;"><i class="glyphicon glyphicon-ok"></i>&nbsp;<strong>Jawaban No. 3&nbsp;</strong></span>
</div>
</div><!-- row -->
<br>

<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Tabel Lokasi Penjualan Tertinggi</strong></h4>
<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Propinsi</th>
    <th>Kota</th>
    <th>Penjualan Tertinggi</th>
</tr>
<?php
// query no. 3
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
} ?>
</table>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Lokasi Penjualan Tertinggi</strong></h4>
    <canvas id="chart_3_lokasitotalpenjualan" ></canvas>
    <script src="assets/charts/chart_3_lokasitotalpenjualan.js"></script>
</div>
</div><!-- row -->
<!-- Akhir No. 3 -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->


<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 4 -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="text-decoration:none;"><span class="badge">4</span>&nbsp; Produk apa yang paling banyak terjual pada penjualan tertinggi ?</a>
    </div><!-- panel-heading -->

    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">

<!-- No. 4 -->
<div style="margin-top:10px;"></div>
<div class="row">
<div class="col-sm-4">
<span class="alert alert-success" style="font-size:20pt;"><i class="glyphicon glyphicon-ok"></i>&nbsp;<strong>Jawaban No. 4&nbsp;</strong></span>
</div>
</div><!-- row -->
<br>

<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Tabel Produk Paling Banyak Terjual</strong></h4>
<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Penjualan</th>
    <th>Laba</th>
</tr>
<?php
// query no. 4
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
} ?>
</table>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Produk Paling Banyak Terjual</strong></h4>
    <canvas id="chart_4_produkbanyakterjual" ></canvas>
    <script src="assets/charts/chart_4_produkbanyakterjual.js"></script>
</div>
</div><!-- row -->
<!-- Akhir No. 4 -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->


<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 5 -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse5" style="text-decoration:none;"><span class="badge">5</span>&nbsp; Tipe pelanggan seperti apa (siapa) yang mendapat penjualan tertinggi?</a>
    </div><!-- panel-heading -->

    <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">

<!-- No. 5 -->
<div style="margin-top:10px;"></div>
<div class="row">
<div class="col-sm-4">
<span class="alert alert-success" style="font-size:20pt;"><i class="glyphicon glyphicon-ok"></i>&nbsp;<strong>Jawaban No. 5&nbsp;</strong></span>
</div>
</div><!-- row -->
<br>

<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;<strong>Tabel Pembeli Tertinggi</strong></h4>
<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Pelanggan</th>
    <th>Total Penjualan</th>
</tr>
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
} ?>
</table>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Pembeli Tertinggi</strong></h4>
    <canvas id="chart_5_pembelitertinggi" ></canvas>
    <script src="assets/charts/chart_5_pembelitertinggi.js"></script>
</div>
</div><!-- row -->
<!-- Akhir No. 5 -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

</div><!-- panel-group -->


</div><!-- col-sm-12 -->

</div><!-- row content -->
</div><!-- container -->

<div style="margin-bottom:50px;"></div>

<?php include 'footer.php'; ?>
