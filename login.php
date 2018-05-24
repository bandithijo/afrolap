
<div class="container-fluid">
<div class="row content">

<div class="col-sm-3"></div>

<div class="col-sm-6 text-left">

<div style="margin-top:120px"></div>
<?php
// input
$username = isset($_POST['username']) ? ($_POST['username']) : "";
$password = isset($_POST['password']) ? ($_POST['password']) : "";
$login = isset($_POST['submit']) ? ($_POST['submit']) : "";

// proses dilakukan jika tombol login ditekan
if($login == "Login") {
   // proses pengecekan username dan password
   if($username == "arti" && $password == "arti") {
      echo '<div class="alert alert-success"><strong>Berhasil!</strong> Anda berhasil melakukan login.</div>';

      // mendaftarkan session
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header("Location: index.php?page=analysis");
   } else {
      header("Location: index.php?page=login");
      echo '<div class="alert alert-danger"><strong>Gagal!</strong> Anda gagal melakukan login.</div>';
   }
      // echo "<meta http-equiv='refresh' content='0;url=index.php?page=login'>";
}
?>

<div class="well col-sm-10"><br>
<center><span style="font-size:100pt"><i class="glyphicon glyphicon-log-in"></i></span></center>
<form action="login.php" method="POST" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-4">Nama Pengguna</label>
        <div class="col-sm-7">
            <input type="text" name="username" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Kata sandi</label>
        <div class="col-sm-7">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-7">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </div>
    </div>
</form>
</div><!-- well -->


<div style="margin-bottom:100px"></div>

</div><!-- col-sm-6 -->

<div class="col-sm-3"></div>

</div><!-- row content -->
</div><!-- container -->































<!-- code yang lama -->
<!-- <form action="login.php" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td><input class="nama" type="text" name="username" size="44" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input class="email" type="password" name="password" size="44" /></td>
        </tr>
        <tr>
            <td></td>
            <td align="right">
                <input type="reset" name="reset" value="Reset" />
                <input type="submit" name="submit" value="Login" />
            </td>
        </tr>
    </table>
</form> -->
