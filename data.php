
<div style="margin-top:50px;"></div>
<div class="container-fluid">
<div class="row content">

<?php
// koneksi ke database
$link = mysqli_connect('localhost', 'root', '', 'dw_tokos');
// $q = isset($_REQUEST['q']) ? ($_REQUEST['q']) : "";
?>

<div class="col-sm-12 text-left">

<h1><i class="glyphicon glyphicon-unchecked"></i>&nbsp;<strong>Tabel-tabel Data Warehouse :</strong></h1>
<div class="panel-group" id="accordion">

<!-- --------------------------------------------------------------------- -->
<!-- TABEL INDUSTRI -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration:none;"><span class="badge">1</span>&nbsp; Tabel <b>Industri</b></a>
    </div><!-- panel-heading -->

    <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL INDUSTRI -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Industri</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>ID Industri</th>
    <th>Nama Industri</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM industri";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['idindustri']; ?></td>
        <td><?php echo $row['namaindustri']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL INDUSTRI -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------- -->
<!-- TABEL LOKASI -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="text-decoration:none;"><span class="badge">2</span>&nbsp; Tabel <b>Lokasi</b></a>
    </div><!-- panel-heading -->

    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL LOKASI -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Lokasi</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>ID Lokasi</th>
    <th>Propinsi</th>
    <th>Negara</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM lokasi";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['idlokasi']; ?></td>
        <td><?php echo $row['propinsi']; ?></td>
        <td><?php echo $row['negara']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL LOKASI -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------- -->
<!-- TABEL PENJUALAN -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="text-decoration:none;"><span class="badge">3</span>&nbsp; Tabel <b>Penjualan</b></a>
    </div><!-- panel-heading -->

    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL PENJUALAN -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Penjualan</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>Laba Penjualan</th>
    <th>Penjualan</th>
    <th>ID Waktu</th>
    <th>ID Lokasi</th>
    <th>ID Industri</th>
    <th>ID Tipe Pelanggan</th>
    <th>ID Produk</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM penjualan";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['labapenjualan']; ?></td>
        <td><?php echo $row['penjualan']; ?></td>
        <td><?php echo $row['idwaktu']; ?></td>
        <td><?php echo $row['idlokasi']; ?></td>
        <td><?php echo $row['idindustri']; ?></td>
        <td><?php echo $row['idtipepelanggan']; ?></td>
        <td><?php echo $row['idproduk']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL PENJUALAN -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------- -->
<!-- TABEL PRODUK -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="text-decoration:none;"><span class="badge">4</span>&nbsp; Tabel <b>Produk</b></a>
    </div><!-- panel-heading -->

    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL PRODUK -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Produk</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>ID Produk</th>
    <th>Nama Produk</th>
    <th>Harga Bahan</th>
    <th>Ongkos Produksi</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM produk";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['idproduk']; ?></td>
        <td><?php echo $row['namaproduk']; ?></td>
        <td><?php echo $row['hargabahan']; ?></td>
        <td><?php echo $row['ongkosproduksi']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL PRODUK -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------- -->
<!-- TABEL TIPE PELANGGAN -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse5" style="text-decoration:none;"><span class="badge">5</span>&nbsp; Tabel <b>Tipe Pelanggan</b></a>
    </div><!-- panel-heading -->

    <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL TIPE PELANGGAN -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Tipe Pelanggan</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>ID Tipe Pelanggan</th>
    <th>Deskripsi Pelanggan</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM tipepelanggan";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['idtipepelanggan']; ?></td>
        <td><?php echo $row['deskripsipelanggan']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL TIPE PELANGGAN -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

<!-- --------------------------------------------------------------------- -->
<!-- TABEL WAKTU -->
<!-- --------------------------------------------------------------------- -->
<div class="panel panel-default">
    <div class="panel-heading">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse6" style="text-decoration:none;"><span class="badge">6</span>&nbsp; Tabel <b>Waktu</b></a>
    </div><!-- panel-heading -->

    <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">

<!-- FORM TABEL TIPE WAKTU -->
<h3 style="margin-top:5px;"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Data-data <b>Tabel Waktu</b></h3>
<hr>

<table class="table table-striped">
<tr class="success">
    <th>No.</th>
    <th>ID Waktu</th>
    <th>Bulan</th>
    <th>Tahun</th>
</tr>
<?php
// query tabel industri
$query = "SELECT * FROM waktu";
$result = mysqli_query($link, $query);
$no = 1;
while($row = mysqli_fetch_array($result)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['idwaktu']; ?></td>
        <td><?php echo $row['bulan']; ?></td>
        <td><?php echo $row['tahun']; ?></td>
    </tr>
<?php
} ?>
</table>

<!-- Akhir FORM TABEL WAKTU -->

        </div><!-- panel-body -->
    </div><!-- panel-collapse collapse -->

</div><!-- panel panel-default -->
<!-- --------------------------------------------------------------------- -->

</div><!-- panel-group -->

</div><!-- col-sm-12 -->

</div><!-- row content -->
</div><!-- container -->

<div style="margin-bottom:50px;"></div>

