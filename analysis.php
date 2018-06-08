
<div style="margin-top:50px;"></div>
<div class="container-fluid">
<div class="row content">

<?php
// koneksi ke database
$link = mysqli_connect('localhost', 'root', '', 'dw_tokos');
// $q = isset($_REQUEST['q']) ? ($_REQUEST['q']) : "";
?>

<div class="col-sm-12 text-left">
<h1><i class="glyphicon glyphicon-check"></i>&nbsp;<strong>Pertanyaan Analisis :</strong></h1>
<div class="panel-group" id="accordion">

<!-- --------------------------------------------------------------------- -->
<!-- SOAL NOMOR 1 -->
<!-- --------------------------------------------------------------------- -->
<div class"col-sm-6">
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

<form method='post' action='download_soal_no_1.php'>

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
$tabel_arr = array();
$no = 1;
while($row = mysqli_fetch_array($result)){
    $no;
    $tahun = $row['tahun'];
    $total_penjualan = $row['total_penjualan'];
    $total_laba = $row['total_laba'];
    $tabel_arr[] = array($no,$tahun,$total_penjualan,$total_laba);
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tahun; ?></td>
        <td><?php echo $total_penjualan; ?></td>
        <td><?php echo $total_laba; ?></td>
    </tr>
<?php
} ?>
</table>

<?php
$serialize_tabel_arr = serialize($tabel_arr);
?>
<textarea name='export_1' style='display: none;'><?php echo $serialize_tabel_arr; ?></textarea>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Penjualan per Tahun</strong></h4>
    <canvas id="chart_1_totalpenjualan" ></canvas>
    <script src="aset/charts/chart_1_totalpenjualan.js"></script>
</div>

<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Laba per Tahun</strong></h4>
    <canvas id="chart_1_totallaba" ></canvas>
    <script src="aset/charts/chart_1_totallaba.js"></script>
</div>
</div><!-- row -->

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<br>
<button type="submit" name="Export" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Export</button>
</form>
<?php
}
?>
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

<form method='post' action='download_soal_no_2.php'>

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
$tabel_arr = array();
$no = 1;
while($row = mysqli_fetch_array($result)){
    $no;
    $tahun = $row['tahun'];
    $bulan = $row['bulan'];
    $total_penjualan = $row['total_penjualan'];
    $total_laba = $row['total_laba'];
    $tabel_arr[] = array($no,$tahun,$bulan,$total_penjualan,$total_laba);
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $tahun; ?></td>
        <td><?php echo $bulan; ?></td>
        <td><?php echo $total_penjualan; ?></td>
        <td><?php echo $total_laba; ?></td>
    </tr>
<?php
} ?>
</table>

<?php
$serialize_tabel_arr = serialize($tabel_arr);
?>
<textarea name='export_2' style='display: none;'><?php echo $serialize_tabel_arr; ?></textarea>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Penjualan per Bulan di Tahun 2002</strong></h4>
    <canvas id="chart_2_totalpenjualan" ></canvas>
    <script src="aset/charts/chart_2_totalpenjualan.js"></script>
</div>

<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Laba per Bulan di Tahun 2002</strong></h4>
    <canvas id="chart_2_totallaba" ></canvas>
    <script src="aset/charts/chart_2_totallaba.js"></script>
</div>
</div><!-- row -->

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<br>
<button type="submit" name="Export" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Export</button>
</form>
<?php
}
?>
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

<form method='post' action='download_soal_no_3.php'>

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
$tabel_arr = array();
$no = 1;
while($row = mysqli_fetch_array($result)){
    $no;
    $propinsi = $row['propinsi'];
    $negara = $row['negara'];
    $penjualan_tertinggi = $row['penjualan_tertinggi'];
    $tabel_arr[] = array($no,$negara,$propinsi,$penjualan_tertinggi);
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $propinsi; ?></td>
        <td><?php echo $negara; ?></td>
        <td><?php echo $penjualan_tertinggi; ?></td>

    </tr>
<?php
} ?>
</table>

<?php
$serialize_tabel_arr = serialize($tabel_arr);
?>
<textarea name='export_3' style='display: none;'><?php echo $serialize_tabel_arr; ?></textarea>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Total Lokasi Penjualan Tertinggi</strong></h4>
    <canvas id="chart_3_lokasitotalpenjualan" ></canvas>
    <script src="aset/charts/chart_3_lokasitotalpenjualan.js"></script>
</div>
</div><!-- row -->

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<br>
<button type="submit" name="Export" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Export</button>
</form>
<?php
}
?>
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

<form method="post" action="download_soal_no_4.php">

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
$tabel_arr = array();
$no = 1;
while($row = mysqli_fetch_array($result)){
    $no;
    $produk = $row['produk'];
    $harga = $row['harga'];
    $jumlah = $row['jumlah'];
    $penjualan = $row['penjualan'];
    $laba = $row['laba'];
    $tabel_arr[] = array($no,$produk,$harga,$jumlah,$penjualan,$laba);
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $produk; ?></td>
        <td><?php echo $harga; ?></td>
        <td><?php echo $jumlah; ?></td>
        <td><?php echo $penjualan; ?></td>
        <td><?php echo $laba; ?></td>

    </tr>
<?php
} ?>
</table>

<?php
$serialize_tabel_arr = serialize($tabel_arr);
?>

<textarea name="export_4" style="display:none;"><?php echo $serialize_tabel_arr; ?></textarea>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Produk Paling Banyak Terjual</strong></h4>
    <canvas id="chart_4_produkbanyakterjual" ></canvas>
    <script src="aset/charts/chart_4_produkbanyakterjual.js"></script>
</div>
</div><!-- row -->

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<br>
<button type="submit" name"Export" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Export</button>
</form>
<?php
}
?>
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

<form method="post" action="download_soal_no_5.php">

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
$tabel_arr = array();
$no = 1;
while($row = mysqli_fetch_array($result)){
    $no;
    $pelanggan = $row['pelanggan'];
    $total_penjualan = $row['total_penjualan'];
    $tabel_arr[] = array($no,$pelanggan,$total_penjualan);
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $pelanggan; ?></td>
        <td><?php echo $total_penjualan; ?></td>

    </tr>
<?php
} ?>
</table>

<?php
$serialize_tabel_arr = serialize($tabel_arr);
?>
    <textarea name="export_5" style="display:none;"><?php echo $serialize_tabel_arr; ?></textarea>

<div class="row">
<div class="col-md-6">
    <h4><i class="glyphicon glyphicon-stats"></i>&nbsp;<strong>Grafik Pembeli Tertinggi</strong></h4>
    <canvas id="chart_5_pembelitertinggi" ></canvas>
    <script src="aset/charts/chart_5_pembelitertinggi.js"></script>
</div>
</div><!-- row -->

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<br>
<button type="submit" name="Export" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Export</button>
</form>
<?php
}
?>
<!-- Akhir No. 5 -->

<div style="margin-bottom:50px;"></div>
        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

</div><!-- panel-group -->


</div><!-- col-sm-12 -->

</div><!-- row content -->
</div><!-- container -->

<div style="margin-bottom:50px;"></div>
