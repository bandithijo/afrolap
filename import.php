
<div style="margin-top:50px;"></div>
<div class="container-fluid">
<div class="row content">

<?php
// koneksi ke database
$link = mysqli_connect('localhost', 'root', '', 'dw_tokos');
// $q = isset($_REQUEST['q']) ? ($_REQUEST['q']) : "";
?>

<div class="col-sm-12 text-left">

<h1><i class="glyphicon glyphicon-edit"></i>&nbsp;<strong>Pilih Tabel untuk Import Data :</strong></h1>
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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Industri</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_industri.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_1" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_industri.php'; ?>

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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Lokasi</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_lokasi.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_2" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_lokasi.php'; ?>

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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Penjualan</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_penjualan.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_3" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_penjualan.php'; ?>

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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Produk</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_produk.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_4" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_produk.php'; ?>

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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Tipe Pelanggan</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_tipepelanggan.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_5" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_tipepelanggan.php'; ?>

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
<h3 style="margin-top:5px;">Form Import Data ke dalam Tabel Waktu</h3>
<hr>

<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
<form method="post" action="" enctype="multipart/form-data">
    <a href="format/format_tbl_waktu.csv" class="btn btn-default">
        <span class="glyphicon glyphicon-download"></span>
        Download Format
    </a><br><br>

    <!-- Buat sebuah input type file -->
    <!-- class pull-left berfungsi agar file input berada di sebelah kiri -->
    <input type="file" name="file" class="pull-left">
    <br><br>
    <button type="submit" name="preview_6" class="btn btn-success btn-sm">
        <span class="glyphicon glyphicon-list-alt"></span> Preview
    </button>
    <br>
</form>

<?php include 'view_tbl_waktu.php'; ?>

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
