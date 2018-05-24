<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<?php
   // input
   $page = isset($_GET['page']) ? ($_GET['page']) : "";

   // proses
   if ($page == 'analysis') {
      // output
      include_once 'analysis.php';
   }
   else if ($page == 'import') {
      // output
      include_once 'import.php';
   }
   else if ($page == 'export') {
      // output
      include_once 'export.php';
   }
   else if ($page == 'login') {
      // output
      include_once 'login.php';
   }
   else if ($page == 'logout') {
      // output
      include_once 'logout.php';
   }
   else {
      // output
      include_once 'home.php';
   }

   // output
//   echo $isi;
?>

<?php include 'footer.php'; ?>
